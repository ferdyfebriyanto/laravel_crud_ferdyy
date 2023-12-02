@extends('pages.master')

@section('content')
    <main class="py-3 bg-light">
        <div class="container">
            <h1>Dashboard</h1>
            <hr>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card text-primary border-primary">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col border-end">
                                    <h3>Products</h3>
                                    <p class="text-secondary">{{ $product->count() }}</p>
                                </div>
                                <div class="col-4 text-center">
                                    <h1 class="bi bi-box2"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
