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
                   <td class="td_check"><input type="checkbox" id="{{$j}}{{$i}}" name="pw" value="{{$j}}{{$i}}" >
                     <label for="{{$j}}{{$i}}"></label>
                   </td>
                   @endfor
                 </tr>
                 @endfor 
               </table>
               <input id="password" name="password" type="hidden" />
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
             <a class="btn btn-primary btn-block" id="second-next">Next2</a>
           </div> 
         </div>
         <div id="third-show" style="display: none;">
           <div class="col-md-12">
            <h2>Confirm Password</h2>
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
           <button class="btn btn-primary btn-block" type="submit">Change Password</button>
         </div>
       </div>
    </form>
  </div>
</div>
</div>
</div>
@endsection