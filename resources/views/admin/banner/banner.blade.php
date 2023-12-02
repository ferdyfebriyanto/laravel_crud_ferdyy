@extends('pages.master')

@section('content')
    <main class="py-3 bg-light">
        <div class="container">
            <h1>Products</h1>
            <hr>
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="mb-3">
                        <a href="{{ route('product.create') }}" class="btn btn-primary">Add New</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table align-middle">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th></th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $product)
                                            {{-- {{ dd($product) }} --}}
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td><img src="{{ asset('storage/images/' . $product->gambar) }}"
                                                        alt="" width="100" class="rounded"></td>
                                                <td>{{ $product->nama_barang }}</td>
                                                <td>Rp{{ $product->harga }}</td>
                                                <td>{{ $product->stok }}</td>
                                                <td>
                                                    <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                                        class="btn btn-sm btn-warning mb-3">Edit</a>
                                                    <form class="d-inline-block delete-product"
                                                        action="{{ route('product.delete', ['product' => $product->id]) }}"
                                                        method="POST" id="deleteForm_{{ $product->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger mb-3 deleteButton"
                                                            data-product-id="{{ $product->id }}">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Menambahkan js datatable dari folder asset --}}
    <script src="{{ asset('assets/js/datatables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // DataTable Initialization
            $('.table').DataTable();

            // Delete Button On Click
            $('.delete-product button.deleteButton').click((e) => {
                e.preventDefault();

                const productId = $(e.target).data('product-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`#deleteForm_${productId}`).submit();
                    }
                });
            });
        });
    </script>

    @if (session('message'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire("{{ session('message') }}", '', 'success');
            });
        </script>
    @endif
@endsection
