@extends('layouts.parent')
@section('title', 'All Products')
@section('card-color', 'dark')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    @include('messages.message')
    <div class="col-12">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name AR</th>
                    <th>Name EN</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Created AT</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $index => $product)
                    <tr>
                        <td>{{ $index }}</td>
                        <td>{{ $product->name_ar }}</td>
                        <td>{{ $product->name_en }}</td>
                        <td>{{ $product->price }}</td>
                        @if ($product->quantity >= 0 and $product->quantity <= 5)
                            <td class="text-danger">
                            @elseif($product->quantity > 5 AND $product->quantity <= 10) <td class="text-warning">
                                @else
                            <td class="text-success">
                        @endif
                        {{ $product->quantity }}
                        </td>
                        <td>{{ $product->status ? 'Active' : 'Not Active' }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('dashboard.products.edit') }}"> Edit </a>
                            <a class="btn btn-danger" href="">Delete </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
