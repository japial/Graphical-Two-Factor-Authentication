<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\GoogleAuthenticator;
use Auth;
use App\User;

class BeforeController extends Controller
{
    public function authorization()
    {
        if(Auth::user()->tauth == 1)
        {
            return redirect()->route('home');
        }
        else
        {
          return view('two');
        }
    }

    public function verifyTwofactor(Request $request)
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
                $user['tauth'] = 1;
                $user->save();
                return redirect('home');
            } 
            else
            {
                return back()->with('alert', 'Wrong Verification Code');
            }

        }
}
