@extends('layouts.app')
@section('content')
@include('layouts.nav')
<div class="content-wrapper">
    <div class="container-fluid">
    	<div class="card card-register mx-auto" >
      <div class="card-header text-center">
        <h3>Two Factor Authenticator</h3>
      </div>
    @if(Auth::user()->google == 1)
      <div class="card-body text-center">
    			<div class="form-group">
    				<label style="text-transform: capitalize;">Use google authenticator to scan the QR code below or use the below code</label>
    	<a class="btn btn-success btn-md" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en" target="_blank">DOWNLOAD APP</a>
        <hr/>

    				<div class="input-group">
    				<input type="text" value="{{$prevcode}}" class="form-control input-lg" id="code" readonly>
    					<span class="input-group-addon btn btn-success" id="copybtn">Copy</span>
    				</div>	
    			</div>
    			<div class="form-group">
    	             <img src="{{$prevqr}}">
    	        </div>
    			<button type="button" class="btn btn-block btn-lg btn-danger" data-toggle="modal" data-target="#disableModal">Disable Two Factor Authenticator</button>	
    	  </div>
    	@else
    	<div class="card-body text-center">
    			<div class="form-group">
    				<label style="text-transform: capitalize;">use google authenticator to scan the QR code below or use the below code</label><br/>
    	<a class="btn btn-success btn-md" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en" target="_blank">DOWNLOAD APP</a>
    	<hr/>
    				<div class="input-group">
    				<input type="text" name="key" value="{{$secret}}" class="form-control input-lg" id="code" readonly>
    					<span class="input-group-addon btn btn-success" id="copybtn">Copy</span>
    				</div>	
    			</div>
    			<div class="form-group">
    	             <img src="{{$qrCodeUrl}}">
    	        </div>
    			<button type="button" class="btn btn-block btn-lg btn-primary" data-toggle="modal" data-target="#enableModal">Enable Two Factor Authenticator</button>	
    			</form>	
    	</div>
    	</div>
    	@endif
    	</div>
    	</div>

    	<!--Copy Data -->
    	<script type="text/javascript">
    	  document.getElementById("copybtn").onclick = function() 
    	  {
    	    document.getElementById('code').select();
    	    document.execCommand('copy');
    	  }
    	</script>
    </div>
</div>

<!--Enable Modal -->
<div class="modal fade" id="enableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verify Authenticator Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{{route('security.create')}}">
                {{ csrf_field() }}
            <input type="hidden" name="key" value="{{$secret}}">
        <div class="form-group">
            <input type="text" name="code" class="form-control" placeholder="Enter Google Authenticator Code"> 
          </div>
           <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success btn-block">Verify</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--Disable Modal -->
<div class="modal fade" id="disableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verify Authenticator Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-register mx-auto mt-3">
          <div class="card-body">
            <form action="{{route('disable.2fa')}}" method="POST">
              {{csrf_field()}}
              <div class="form-group">
                <input type="text" name="code" class="form-control" placeholder="Enter Google Authenticator Code"> 
              </div>
               <div class="form-group">
                <button type="submit" class="btn btn-lg btn-success btn-block">Verify</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@endsection