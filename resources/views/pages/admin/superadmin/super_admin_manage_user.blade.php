@extends('layouts.layouts')


@section('title')

    Manage User Accounts

@endsection


@include('layouts.sidebar')

@section('content')

<div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage User Account</h4>
            <h6 class="card-subtitle"></h6>
            <table id="demo-foo-addrow2" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                <thead>
                    <tr>
                        <td>No.</td>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Password</th>
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
                    @foreach($data as $key => $item)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            @if ($item->is_active == 1)
                                <a href="{{route('super.activate.user',['id'=>$item->id])}}">
                                    <span class="label label-rounded label-success">active</span>
                                </a>
                            @else 
                                <a href="{{route('super.activate.user',['id'=>$item->id])}}">
                                    <span class="label label-rounded label-danger">inactive</span>
                                </a>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('super.reset.user',['id'=>$item->id])}}">
                                <span class="label label-rounded label-primary">reset pass
                                    <i class="fa fa-refresh"></i>
                                </span>
                            </a>
                        </td>
                        <td>
                            <a href="" class="edit-data" data-toggle="modal" data-target="#edit-data" data-id={{$item->id}}>
                                <i class="fa fa-pencil-square-o"></i>
                            </a> &nbsp | &nbsp
                            <a href="" class="deleteAcc" data-id={{$item->id}}>
                                <i class="fa fa-times"></i>
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
                                                data-target="#add-contact"> <i class="fa fa-paper-plane"></i> &nbsp Invite User
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
                                                <h4 class="modal-title" id="myModalLabel">Invite User</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-material" method="POST" action="{{route('super.add.user')}}">
    
                                                    {{ csrf_field() }}
    
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="text" class="form-control" name="email" placeholder="Email">
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
                                                <h4 class="modal-title" id="myModalLabel">Update Data User</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-material" method="POST" action="{{route('super.update.user')}}">
    
                                                    {{ csrf_field() }}
    
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="hidden" class="form-control" name="id" id='id'>
                                                            <input type="text" class="form-control" name="name" id='name'>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <div class="col-md-12 m-b-20">
                                                                <input type="text" class="form-control" name="email" id='email' disabled>
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
                        text: "You will not be able to recover this Account!",
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
                            url: "{{route('super.del.admin')}}",
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
                                url: "{{route('super.get.one.admin')}}",
                                data: { id : id },
                                type: "POST",
                                success: function (data) {
                                    console.log(data)
                                    $('#id').val(data.data.id);
                                    $('#name').val(data.data.name);
                                    $('#email').val(data.data.email);
                                }         
                        });
                    });
                });
            </script>
    @endpush
@endsection