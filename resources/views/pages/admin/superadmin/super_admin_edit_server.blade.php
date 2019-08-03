@extends('layouts.layouts')


@section('title')

    Manage My Accounts

@endsection


@include('layouts.sidebar')

@section('content')

<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">My Account</h4>
                <form class="m-t-40" action="{{route('super.update.server')}}" method="POST">
                    
                    {{ csrf_field() }}
                
                    <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <input type="hidden" name='id' value={{$id->id}}>
                                <input type="text" class="form-control" name="name" placeholder="Server Name" value={{$id->name}}>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <input type="text" class="form-control" name="ip" placeholder="Server IP" value={{$id->ip}}>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 m-b-20"> 
                                <input type="text" class="form-control" name="username" placeholder="Username" value={{$id->username}}>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <input type="text" class="form-control" name="password" placeholder="Password" value={{$id->password}}>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <input type="text" class="form-control" name="port" placeholder="Port" value={{$id->port}}>
                            </div>
                        </div>    
                    {{-- <div class="form-group">
                            <input type="checkbox" id="md_checkbox_3" class="agree chk-col-purple" unchecked />
                            <label for="md_checkbox_3">Update My Password</label>
                    </div> --}}
                    <div class="text-xs-right float-right">
                        <button type="submit" class="btn btn-info">Submit</button>
                        {{-- <button type="reset" class="btn btn-inverse">Reset</button> --}}
                    </div>
                </form>
            </div>
        </div>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('form input[type="password"]').prop("disabled", true);
            $(".agree").click(function(){
                if($(this).prop("checked") == true){
                    $('form input[type="password"]').prop("disabled", false);
                    $('form input[type="submit"]').prop("disabled", false);
                }
                else if($(this).prop("checked") == false){
                    $('form input[type="password"]').prop("disabled", true);
                    $('form input[type="submit"]').prop("disabled", true);
                }
            });
        });
    </script>
@endpush

@endsection