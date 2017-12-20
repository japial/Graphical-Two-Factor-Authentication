@extends('layouts.app')
@section('content')
<script type="text/javascript">
    $(document).ready(function() {

        $("#first-next").click(function(){
            $("#first-show").hide();
            $("#second-show").show();
        });
        $("#second-next").click(function(){
            $("#second-show").hide();
            $("#first-show").hide();
            $("#third-show").show();
        });

  $('input[type=checkbox]').change(function(){
    var favorite = [];
    $.each($("input[name='pw']:checked"), function(){            
        favorite.push($(this).val());
    });
    var value = favorite.join();
    $("#password").val(value);

});

  $('input[type=checkbox]').change(function(){
    var passd = [];
    $.each($("input[name='cpw']:checked"), function(){            
        passd.push($(this).val());
    });
    var value = passd.join();
    $("#password-confirm").val(value);

});        
});
</script>
 <div class="container">
<div class="card card-register mx-auto mt-1">
  <div class="card-header text-center"><h3>Register an Account</h3></div>
  <div class="card-body">
  @include('layouts.error')
    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div id="first-show">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" id="name" value="{{ old('name') }}" name="name" type="text" aria-describedby="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input class="form-control" id="email" value="{{ old('email') }}" name="email" type="email" aria-describedby="email" placeholder="Enter email">
            </div>
            <a class="btn btn-primary btn-block" id="first-next">Next</a>
        </div>

        <div id="second-show" class="text-center" style="display: none;">
            <div class="col-md-12">
                <h2>Create Password</h2>
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
             <input id="password" name="password" type="hidden" >
             <a class="btn btn-primary btn-block" id="second-next">Next</a>
         </div>
     </div>

     <div id="third-show" class="text-center" style="display: none;">
        <div class="col-md-12">
            <h2>Confirm Password</h2>
             <table>      
                @for($i = 0; $i<=3; $i++)
                <tr>
                   @for($j = 0; $j<=3; $j++)
                   <td class="td_check"><input type="checkbox" id="c{{$i}}{{$j}}" name="cpw" value="{{$j}}{{$i}}" >
                     <label for="c{{$i}}{{$j}}"></label>
                 </td>
                 @endfor
                 </tr>
                 @endfor 
             </table>
          <input name="password_confirmation" id="password-confirm" type="hidden">
          <button class="btn btn-primary btn-block" type="submit">Register</button>
      </div>
  </div>          
</form>
<div class="text-center">
  <a class="d-block small mt-3" href="{{route('login')}}">Login Page</a>
  <a class="d-block small" href="{{ route('password.request') }}">Forgot Password?</a>
</div>
</div>
</div>
</div>
@endsection