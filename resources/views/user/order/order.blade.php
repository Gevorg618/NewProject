@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table table-bordered" id="laravel_datatable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Customers</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Created at</th>
            </tr>
            </thead>
        </table>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
            Buy Products
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <input  type="text" id="name"  name="name" class="form-control" for="invoice_number" value="{{ old('name') }}"    placeholder="name"  required>
                        </div>
                        <div class="modal-header">
                            <input  type="number" id="price"  name="price" class="form-control"  value="{{ old('price') }}"   placeholder="price" required>
                        </div>
                        <div class="modal-header">
                            <input  type="hidden" id="stock"   name="stock" class="form-control"  value="true"   placeholder="stock" >
                        </div>


                        <div class="modal-footer">
                            <input type='submit' name='submit' value='Save' class="btn btn-default create">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCustomers">
           Customers
        </button>
        <div class="modal fade" id="exampleModalCustomers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="modal-header">
                        </div>

                    {{$customer}}:{{$user->prod_name}}

                    </div>
                </div>
            </div>
        </div>
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
                ajax: "{{ url('order-list') }}",
                columns: [
                    { data: 'id', name: 'id',searchable: false, orderable: false },
                    // { data: 'invoice_number', name: 'invoice_number',orderable: false },
                    { data: 'customers', name: 'customers',orderable: false },
                    { data: 'total_amount', name: 'total_amount',searchable: false, orderable: false },
                    { data: 'status', name: 'status',searchable: false, orderable: false },
                    { data: 'created_at', name: 'created_at',searchable: false }

                ]

            });

        $('.create').on('click', function () {
            var data = {
                'name': $('#name').val(),
                'price': $('#price').val(),
                'stock': $('#stock').val()

            };


            created(data)

        });

        function created(data) {
            $.ajax({
                url: 'product/create',
                method: 'post',
                data: {

                    data: data,

                },

                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message)
                        $('#exampleModal').modal('hide');
                    } else {
                        toastr.error('error')
                    }
                }
            })
        }
        });
    </script>
@endsection
