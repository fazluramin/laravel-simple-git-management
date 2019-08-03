@extends('layouts.app')

@section('title')
    Recover Password
@endsection


@section('content')

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url({{asset("asset/assets/images/background/login-register.jpg")}}">        
            <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" method="POST" action="">
                  
                  {{ csrf_field() }}
                    
                    <h3 class="box-title m-b-20">Recover Password</h3>
    
                    <div class="form-group">
                      <div class="col-xs-12">

                        @include ('layouts.flash_message')
                        
                        <input  class="form-control" type="text" name="email" 
                                value="{{ old('email') }}" required="" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                      <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                      </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <div><a href="{{route('login')}}" class="text-info m-l-5"><b><< Bring Me Back!</b></a></div>
                        </div>
                    </div>
                  </form>
            </div>
          </div>
        </div>
        
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
@endsection
