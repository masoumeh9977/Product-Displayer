@extends('layouts.app')
@section('title', 'Product')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col card mt-5 mb-5">
                <img src="{{ $product[0]->images['main']['url'][0] }}" class="card-img-top w-25 h-25 m-auto" alt="product image">
                <div class="card-body">
                    <h4 class="card-title">Product Details</h4>
                    <div class="row">
                        <div class="col d-flex justify-content-between mt-2">
                            <p>Title</p>
                            <p>{{ $product[0]->title_fa }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-between mt-2">
                            <p>Category</p>
                            <p>{{ $product[0]->category['title_fa'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-between mt-2">
                            <p>Code</p>
                            <p>{{ $product[0]->id }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-between mt-2">
                            <p>Count</p>
                            <p>{{ $product[0]->rating['count'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-between mt-2">
                            <p>Rate</p>
                            <p>{{ $product[0]->rating['rate'] }}</p>
                        </div>
                    </div>
                </div>
                <form action="{{ route('product.print') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-block mb-2">Create PDF</button>
                </form>
            </div>
        </div>
    </div>
@endsection
