@extends('layouts.app')
@section('content')
    <div class="container">

        <table class="table table-bordered" id="laravel_datatable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created at</th>
            </tr>
            </thead>
        </table>
    </div>
    <script>
        $(document).ready( function () {
            $('#laravel_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('users-list') }}",
                columns: [
                    { data: 'id', searchable: false, orderable: false, name: 'id'  },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at', searchable: false, orderable: false }
                ]
            });
        });
    </script>
@endsection
