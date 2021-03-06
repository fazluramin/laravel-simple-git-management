@extends('layouts.layouts')


@section('title')

    Manage Git Project

@endsection


@include('layouts.sidebar')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Git Connected to server {{$data->name}}</h4>
        <h6 class="card-subtitle"></h6>
        <table id="demo-foo-addrow2" class="table table-bordered table-hover toggle-circle" data-page-size="7">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Branch</th>
                    
                </tr>
            </thead>
            <div class="m-t-40">
                <div class="d-flex">
                    <div class="ml-auto">
                        <div class="form-group">
                            <input id="demo-input-search2" type="text" placeholder="Search" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <tbody>
                    @foreach($git as $key=>$item)
                <tr>
                   
                    <td> {{++$key}} </td>
                    <td> {{$item->name}} </td>
                    <td> {{$item->url}}</td>
                    <td> {{$item->branch}} </td>
                    
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                
            </tfoot>
        </table>
    </div>
</div>
</div>
</div>


@endsection