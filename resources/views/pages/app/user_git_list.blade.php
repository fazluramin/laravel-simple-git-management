@extends('layouts.layouts')


@section('title')

    Manage My Git Projects

@endsection


@include('layouts.sidebar')

@section('content')

<div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Git Projects</h4>
            <h6 class="card-subtitle"></h6>
            <table id="demo-foo-addrow2" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>URL</th>
                        <th>Branch</th>
                        <th>Server IP</th>
                        
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
                        <td> {{$item->serverList->ip}} </td>
                        
                        
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        
                                
                            <td colspan="7">
                                <div class="text-right float-right">
                                    <ul class="pagination"> </ul>
                                </div>
                            </td>
                        </tr>
                </tfoot>
            </table>
        </div>
    </div>
    </div>
    </div>
    
@endsection