@extends('layouts.app')

@section('title')
    New Admin Account
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
                <form class="form-horizontal form-material" id="loginform" method="POST" action="{{route('post.register')}}">
                  
                  {{ csrf_field() }}
                    
                    <h3 class="box-title m-b-20">New Account</h3>
    
                    <div class="form-group">
                      <div class="col-xs-12">
                        <input type="hidden" name='code' value="{{$token}}">
                        <input class="form-control" type='text' name="name" required="" placeholder="Full Name">
                      </div>

                      <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required="" placeholder="Password">
                        </div>

                            <div class="col-xs-12">
                              <input class="form-control" type="password" name="password_confirmation" required="" placeholder="Confirm Password">
                            </div>
                          </div>
                    <div class="form-group text-center m-t-20">
                      <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Create Account</button>
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
