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
        <table id="table-server" class = "table table-hover table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Server IP</th>
                    <th>Username</th></th>
                    {{-- <th>Password</th> --}}
                    <th>Port</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
</div>
</div>

@push('script')
        <script>
            $(function() {
                $('#table-server').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/super/server/json',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'ip', name: 'ip' },
                        { data: 'username', name: 'username' },
                        // { data: 'password', name: 'password' },
                        { data: 'port', name: 'port' },
                    ],
                    "columnDefs": [ {
                        "searchable": false,
                        "orderable": false,
                        "targets": 0
                    } ],
                    "order": [[ 1, 'asc' ]]
                });
                t.on( 'order.dt search.dt', function () {
                    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    } );
                } ).draw();
            });

            $('#id tbody').on('click', function(){
                table
                    .row($(this).parents('tr'))
                    .remove()
                    .draw();
            });
        </script>
@endpush

@endsection