<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\GoogleAuthenticator;
use Auth;
use Hash;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','twofactor']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function twoFactor()
    {
       $ga = new GoogleAuthenticator();
       $secret = $ga->createSecret();
       $qrCodeUrl = $ga->getQRCodeGoogleUrl(Auth::user()->email, $secret);

       $prevcode = Auth::user()->secret;
       $prevqr = $ga->getQRCodeGoogleUrl(Auth::user()->email, $prevcode);

       return view('twofactor.create', compact('secret','qrCodeUrl','prevcode','prevqr'));
    }

    public function createTwofactor(Request $request)
    {
        $user = User::find(Auth::id());
        
        $this->validate($request,
                [
                    'code' => 'required',
                    'key' => 'required'
                ]);

        $ga = new GoogleAuthenticator();

        $userCode = $request->code;
        $key = $request->key;
        $oneCode = $ga->getCode($key); 

        if ($oneCode == $userCode) 
        { 

            $user['secret'] = $request->key;
            $user['google'] = 1;
            $user['tauth'] = 1;
            $user->save();
            return back()->with('success', 'Google Authenticator Enabeled Successfully');
        } 
        else
        {
            return back()->with('alert', 'Wrong Verification Code');
        }
    }

    public function disableTwofactor(Request $request)
    {
        $user = User::find(Auth::id());

            $this->validate($request,
                [
                    'code' => 'required',
                ]);
            $ga = new GoogleAuthenticator();

            $secret = $user->secret;
            $oneCode = $ga->getCode($secret); 
            $userCode = $request->code;

            if ($oneCode == $userCode) 
            { 
                $user = User::find(Auth::id());
                $user['google'] = 0;
                $user['tauth'] = 1;
                $user['secret'] = '0';
                $user->save();
                return back()->with('success', 'Two Factor Authenticator Disable Successfully');
            } 
            else
            {
                return back()->with('alert', 'Wrong Verification Code');
            }
        
    }

    public function changePassword()
    {
        $user = User::find(Auth::id());

        return view('auth.changepass', compact('user'));
    } 

    public function passwordChanged(Request $request)
    {
        $user = User::find(Auth::id());

         if(Hash::check($request->passwordold, $user['password']) && $request->password == $request->password_confirmation)
         {
           $user->password = bcrypt($request->password);
           $user->save();

           return back()->with('success', 'Password Changed Successfully');
         }
         else 
         {
             return back()->with('alert', 'Password Changing Faild');
         }
    }

}
