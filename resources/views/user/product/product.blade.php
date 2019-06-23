@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table table-bordered" id="laravel_datatable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th class="asda" >Stock</th>
                <th>Created at</th>
            </tr>
            </thead>
        </table>

    </div>

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
                    { data: 'created_at', name: 'created_at',searchable: false, orderable: false  }

                ],

            });

            });
    </script>
@endsection
