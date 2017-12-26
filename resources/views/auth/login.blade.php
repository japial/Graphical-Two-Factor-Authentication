@extends('layouts.app')
@section('content')
<script type="text/javascript">
    $(document).ready(function() {
        $('input[type=checkbox]').change(function(){
            var favorite = [];
            $.each($("input[name='pw']:checked"), function(){            
                favorite.push($(this).val());
            });
            var value = favorite.join();
            $("#password").val(value);         
        });
    });
</script>
 <div class="container">
<div class="card card-register mx-auto" style="margin-top: -3rem;">
      <div class="card-header text-center">
        <h3>Log in</h3></div>
      <div class="card-body">
        @include('layouts.error')
       <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
          <div class="form-group">
            <label for="email">Email address</label>
            <input class="form-control" id="email" value="{{ old('email') }}" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
             <table>      
                @for($i = 0; $i<=3; $i++)
                    <tr>
                        @for($j = 0; $j<=3; $j++)
                        <td class="td_check"><input type="checkbox" id="{{$j}}{{$i}}" name="pw" value="{{$j}}{{$i}}" >
                          <label for="{{$j}}{{$i}}"></label>
                        </td>
                        @endfor
                     </tr>
                @endfor 
              </table>
            <input id="password" type="hidden" name="password">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{route('register')}}">Register an Account</a>
          <a class="d-block small" href="{{ route('password.request') }}">Forgot Password?</a>
          <a class="d-block small" href="{{ url('/') }}">Home</a>
        </div>
      </div>
    </div>
    </div>
@endsection