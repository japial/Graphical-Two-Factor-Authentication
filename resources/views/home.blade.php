@extends('layouts.app')
@section('content')
@include('layouts.nav')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('home')}}">Two Factor Authentication System</a>
        </li>
        <li class="breadcrumb-item active">User Dashboard</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>User Dashboard</h1>
          <p>Email of {{Auth::user()->name}} : <strong>{{Auth::user()->email}}</strong></p>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Institute of Science and Technology</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    
  </div>
@endsection
