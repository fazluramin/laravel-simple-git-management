@extends('layouts.layouts')


@section('title')

    Manage Server 

@endsection


@include('layouts.sidebar')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Manage Server List</h4>
        <h6 class="card-subtitle"></h6>
        <table id="demo-foo-addrow2" class="table table-bordered table-hover toggle-circle" data-page-size="7">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Server IP</th>
                    <th>Username</th></th>
                    {{-- <th>Password</th> --}}
                    <th>Port</th>
                    <th>Action</th>
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
                <tr>
                @foreach ($data as $key => $item)
                    <td> {{++$key}} </td>
                    <td>   {{$item->name}} </td>
                    <td> {{$item->ip}} </td>
                    <td> {{$item->username}}</td>
                    {{-- <td> {{$item->password}} </td> --}}
                    <td> {{$item->port}} </td>
                    <td>
                        <a href="" class="edit-data" data-toggle="modal" data-target="#edit-data" data-id={{$item->id}}>
                            <i class="fa fa-pencil-square-o"></i>
                        </a> 
                        &nbsp | &nbsp
                        <a href="" class="deleteAcc" data-id={{$item->id}}>
                                <i class="fa fa-times"></i>
                        </a>
                        &nbsp | &nbsp
                        <a href="{{route('super.server.git', ['id'=>$item->id])}}">
                                <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                    <tr>
                            <td colspan="2">
                                    <button type="button" 
                                            class="btn btn-info btn-rounded" 
                                            data-toggle="modal"  
                                            data-target="#add-contact"><i class="fa fa-plus"></i> &nbsp New Server
                                    </button>
                            </td>

                        <div id="add-contact" 
                                class="modal fade in" 
                                tabindex="-1" 
                                role="dialog" 
                                aria-labelledby="myModalLabel" 
                                aria-hidden="true">

                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Add New Server</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal form-material" method="POST" action="{{route('super.add.server')}}">

                                                {{ csrf_field() }}

                                                <div class="form-group">
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" name="name" placeholder="Server Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" name="ip" placeholder="Server IP">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 m-b-20"> 
                                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" name="port" placeholder="Port">
                                                    </div>
                                                </div>    
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-rounded btn-info waves-effect">Send</button>
                                            <button type="button" class="btn btn-rounded btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- ##############################################################-->
                            <div id="edit-data" 
                                class="modal fade in" 
                                tabindex="-1" 
                                role="dialog" 
                                aria-labelledby="myModalLabel" 
                                aria-hidden="true">

                                <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Edit Data Server</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-material" method="POST" action="{{route('super.update.server')}}">
    
                                                    {{ csrf_field() }}
    
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                        <input type="hidden" class="form-control" name="id" id='id'>
                                                        <input type="text" class="form-control" name="name" id='name' placeholder="Server Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="text" class="form-control" name="ip" id='ip' placeholder="Server IP">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20"> 
                                                            <input type="text" class="form-control" name="username" id='username' placeholder="Username">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="text" class="form-control" name="password" id='password' placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="text" class="form-control" name="port" id='port'placeholder="Port">
                                                        </div>
                                                    </div>    
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-rounded btn-info waves-effect">Send</button>
                                                <button type="button" class="btn btn-rounded btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                <!-- /.modal-dialog -->

                            </div>
                            {{-- ==================================================== --}}
                            <div id="show-data" 
                                class="modal fade in" 
                                tabindex="-1" 
                                role="dialog" 
                                aria-labelledby="myModalLabel" 
                                aria-hidden="true">

                                
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Git Project Connected To Server</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                
                                        <!-- /.modal-content -->
                                    </div>
                                <!-- /.modal-dialog -->

                            </div>
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

@push('script')
    <script>
        $(document).ready(function(){
            setTimeout(function() {
                $('.alert').slideUp(1000);
            }, 4000);
        console.log();
        });
    </script>
    <script>
            $('.deleteAcc').on('click', function(e){
                e.preventDefault();
                var id = $(this).attr("data-id")
                swal({
                        title: "Are you sure to delete?",
                        text: "You will not be able to recover this Server!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#ff354d",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: true
                    }, function(){
                        // $('.loading').show()
                        $.ajax({
                            headers: {
                                'X-CSRF-Token': "{{ csrf_token() }}"
                            },
                            url: "{{route('super.del.server')}}",
                            data: { id : id },
                            type: "POST",
                            success: function (data) {
                                location.reload();
                            }         
                        });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('.edit-data').click(function () {
                    var id = $(this).data('id');
                    console.log(id);
                    $.ajax({
                            headers: {
                                'X-CSRF-Token': "{{ csrf_token() }}"
                            },
                            url: "{{route('super.get.one.server')}}",
                            data: { id : id },
                            type: "POST",
                            success: function (data) {
                                $('#id').val(data.data.id);
                                $('#name').val(data.data.name);
                                $('#ip').val(data.data.ip);
                                $('#username').val(data.data.username);
                                $('#password').val(data.data.password);
                                $('#port').val(data.data.port);
                            }         
                    });
                });
            });
        </script>
        <script>
            $(function() {
                $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: 'user/json',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'updated_at', name: 'updated_at' }
                    ]
                });
            });
        </script>
@endpush

@endsection