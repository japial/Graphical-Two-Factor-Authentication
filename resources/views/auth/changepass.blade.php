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
    var oldp = [];
    $.each($("input[name='opw']:checked"), function(){            
        oldp.push($(this).val());
    });
    var value = oldp.join();
    $("#passwordold").val(value);
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
@include('layouts.nav')
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="card card-register mx-auto" >
        <div class="card-header text-center">
          <h3>Change Password</h3>
        </div>
        <div class="card-body text-center">
          <form action="{{route('password.changed') }}" method="POST">
            {{csrf_field()}}
            <div id="first-show">
              <div class="col-md-12">
                <h2>Old Password</h2>
                <table>      
                  @for($i = 0; $i<=3; $i++)
                  <tr>
                   @for($j = 0; $j<=3; $j++)
                   <td class="td_check"><input type="checkbox" id="{{$j}}{{$i}}o" name="opw" value="{{$j}}{{$i}}" >
                     <label for="{{$j}}{{$i}}o"></label>
                   </td>
                   @endfor
                 </tr>
                 @endfor 
               </table>
             <input id="passwordold" name="passwordold" type="hidden" />
               <a class="btn btn-primary btn-block" id="first-next">Next</a>
             </div>
           </div>
           <div id="second-show" style="display: none;">
             <div class="col-md-12">
              <h2>New Password</h2>
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
              <input id="password" name="password" type="hidden" />
             <a class="btn btn-primary btn-block" id="second-next">Next</a>
           </div> 
         </div>
         <div id="third-show" style="display: none;">
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
           <button class="btn btn-primary btn-block" type="submit">Change Password</button>
         </div>
       </div>
    </form>
  </div>
</div>
</div>
</div>
@endsection