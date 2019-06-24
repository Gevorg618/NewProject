@extends('layouts.app')
@section('content')

    <div class="container">
        <table class="table table-bordered" id="laravel_datatable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
            </thead>
        </table>

    </div>
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>
    <script>
        $(document).ready( function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#laravel_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('products-list') }}",
                columns: [
                    { data: 'id',searchable: false, orderable: false, name: 'id'  },
                    { data: 'name', name: 'name', orderable: false  },
                    { data: 'price', name: 'price',searchable: false, orderable: false  },
                    { data: 'in_stock', name: 'in_stock',searchable: false},
                ],

            });

            });
    </script>
@endsection
