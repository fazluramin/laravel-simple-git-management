@extends('layouts.layouts')


@section('title')

    Manage Git Project

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
                    @foreach($data as $key=>$item)
                <tr>
                   
                    <td> {{++$key}} </td>
                    <td> {{$item->name}} </td>
                    <td> {{$item->url}}</td>
                    <td> {{$item->branch}} </td>
                    <td> {{$item->serverList->ip}} </td>
                    <td>
                        <a href="" class="edit-data" data-toggle="modal" data-target="#edit-data" data-id={{$item->id}}>
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        &nbsp | &nbsp
                         <a href="" class="deleteAcc" data-id={{$item->id}}>
                            <i class="fa fa-times"></i>
                        </a>
                        &nbsp | &nbsp
                        <a href="{{route('admin.user.git', ['id'=>$item->id])}}">
                                <i class="fa fa-eye"></i>
                        </a>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">
                        <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact">
                            <i class="fa fa-plus"></i>  &nbsp Git Project
                        </button>
                        <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-user">
                                <i class="fa fa-user-plus"></i>  &nbsp Add User To Git
                        </button>
                    </td>

                    <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Add Git Project</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal form-material" method="POST" action="{{route('admin.add.git')}}">
                                        {{ csrf_field() }}     
                                        <div class="form-group">
                                            <div class="col-md-12 m-b-20">
                                                <input type="text" class="form-control" name="name" placeholder="Project Name">
                                                </div>
                                            </div>
                                        <div class="form-group">
                                            <div class="col-md-12 m-b-20">
                                                <input type="text" class="form-control" name="url" placeholder="URL">
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <div class="col-md-12 m-b-20">
                                                    <input type="text" class="form-control" name="branch" placeholder="Git Branch">
                                                </div>
                                            </div>
                                        <div class="form-group">
                                            <div class="col-md-12 m-b-20">
                                                
                                                <select class="form-control" name="server_id">
                                                    @foreach($select as $item)
                                                    <option value="{{$item->id}}">Server:{{$item->name}} &nbsp|&nbsp IP:{{$item->ip}} </option>
                                                    @endforeach
                                                </select>
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
                        {{-- ==================================================================================== --}}
                        {{-- ==================================================================================== --}}
                        <div id="add-user" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Add Git Project</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal form-material" method="POST" action="{{route('admin.add.user.git')}}">
                                                {{ csrf_field() }}     
                                                <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                            <label>Username : </label>
                                                            <select class="form-control" name="user_id">
                                                                @foreach($user as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 m-b-20">
                                                            <label>Git Project : </label>
                                                        <select class="form-control" name="git_id">
                                                            @foreach($data as $item)
                                                            <option value="{{$item->id}}">{{$item->name}} | Url : {{$item->url}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-rounded btn-info waves-effect">Add</button>
                                                    <button type="button" class="btn btn-rounded btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                                </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                     {{-- ==================================================================================== --}}
                                    {{-- ==================================================================================== --}}
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
                                                <form class="form-horizontal form-material" method="POST" action="{{route('admin.update.git')}}">
                                                    {{ csrf_field() }}     
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="hidden" class="form-control" name="id" id='id' >
                                                            <input type="text" class="form-control" name="name" id='name' placeholder="Project Name">
                                                            </div>
                                                        </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="text" class="form-control" name="url" id='url' placeholder="URL">
                                                        </div>
                                                    </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12 m-b-20">
                                                                <input type="text" class="form-control" name="branch" id='branch' placeholder="Git Branch">
                                                            </div>
                                                        </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                            
                                                            <select class="form-control" name="server_id">
                                                                @foreach($select as $item)
                                                                <option value="{{$item->id}}">Server:{{$item->name}} &nbsp|&nbsp IP:{{$item->ip}} </option>
                                                                @endforeach
                                                            </select>
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
                        text: "You will not be able to recover this Project!",
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
                            url: "{{route('admin.del.git')}}",
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
                            url: "{{route('admin.get.one.git')}}",
                            data: { id : id },
                            type: "POST",
                            success: function (data) {
                                $('#id').val(data.data.id);
                                $('#name').val(data.data.name);
                                $('#url').val(data.data.url);
                                $('#branch').val(data.data.branch);
                                
                            }         
                    });
                });
            });
        </script>
    
@endpush

@endsection