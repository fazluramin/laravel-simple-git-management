@extends('layouts.app')

@section('title')
    Login Page
@endsection

@section('content')

<div class="login-register" style="background-image:url({{asset("asset/assets/images/background/login-register.jpg")}}">
    <div class="login-box card">
        <div class="card-body">
            <form class="form-horizontal form-material" action="{{ route('login') }}" method="POST">
                
                @csrf

                <h3 class="box-title m-b-20">Sign In</h3>
                
                @include ('layouts.flash_message')

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input  class="form-control @error('email') is-invalid @enderror" 
                                type="text" 
                                required="" 
                                name='email' 
                                placeholder="Email"
                                value="{{ old('email') }}" 
                                required autocomplete="email" 
                                autofocus> 
                    </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input  class="form-control  @error('password') is-invalid @enderror" 
                                type="password" 
                                required="" 
                                placeholder="Password" 
                                name="password" 
                                required autocomplete="current-password"
                                autofocus>
                    </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group row">
                    <div class="col-md-12 font-14">
                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            
                        
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <div>Forgot Password? Recover <a href="{{route('forgot')}}" class="text-info m-l-5"><b>Here!</b></a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@push('script')
    <script>
        $(document).ready(function(){
            setTimeout(function() {
                $('.alert').slideUp(1000);
            }, 4000);
        console.log();
        });
        
    </script>
@endpush

@endsection
