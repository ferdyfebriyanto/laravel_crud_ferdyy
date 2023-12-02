@extends('pages.master')

@section('content')
    <main class="py-3 bg-light">
        <div class="container">
            <h1>New Category</h1>
            <hr>
            <form class="row" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-md">
                    <div class="card">
                        <div class="card-body">
                            <h3>Category Details</h3>
                            <hr>
                            <div class="mb-3">
                                <label for="name">Category Name</label>
                                <input type="text" name="product_name" id="name" class="form-control" required>
                            </div>
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script>
        const imgInput = document.getElementById('image')
        const imgPreview = document.getElementById('image-preview')

        imgInput.onchange = evt => {
            const [file] = imgInput.files
            if (file) {
                imgPreview.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
