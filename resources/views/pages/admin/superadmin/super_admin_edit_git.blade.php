@extends('layouts.layouts')


@section('title')

    Manage My Accounts

@endsection


@include('layouts.sidebar')

@section('content')

<div class="row">
    <div class="col-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">My Account</h4>
                <form class="m-t-40" action="{{route('super.update.git')}}" method="POST">
                    
                    {{ csrf_field() }}
                
                    <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
                                <input type="text" class="form-control" name="name" value="{{$data->name}}">
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <input type="text" class="form-control" name="url" value="{{$data->url}}">
                            </div>
                        </div>
                            <div class="form-group">
                                <div class="col-md-12 m-b-20">
                                    <input type="text" class="form-control" name="branch" value="{{$data->branch}}">
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                {{-- {{Form::select('server_id',$select,$data->serverList->id,[
                                    'class'=>'form-control'
                                ])}} --}}

                                <select class="form-control" name="server_id">
                                    <option value="{{$data->serverList->id}}">Server:{{$data->serverList->name}} &nbsp|&nbsp IP:{{$data->serverList->ip}} </option>
                                    @foreach($select as $item)
                                        @if($item->id != $data->serverList->id)
                                            <option value="{{$item->id}}">Server:{{$item->name}} &nbsp|&nbsp IP:{{$item->ip}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
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