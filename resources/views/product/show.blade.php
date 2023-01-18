@extends('layouts.app')
@section('title', 'Product')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col card mt-5 mb-5">
                @if(isset($product->rating['count']))
                <img src="{{ $product->images['main']['url'][0] }}" class="card-img-top w-25 h-25 m-auto" alt="product image">
                <div class="card-body">
                    <h4 class="card-title">Product Details</h4>
                    <div class="row">
                        <div class="col d-flex justify-content-between mt-2">
                            <p>Title</p>
                            <p>{{ $product->title_fa }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-between mt-2">
                            <p>Category</p>
                            <p>{{ $product->category['title_fa'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-between mt-2">
                            <p>Code</p>
                            <p>{{ $product->id }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-between mt-2">
                            <p>Count</p>
                            <p>{{ $product->rating['count'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-between mt-2">
                            <p>Rate</p>
                            <p>{{ $product->rating['rate'] }}</p>
                        </div>
                    </div>
                </div>
                <form action="{{ route('product.pdf', ['product_id' => $product->id]) }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-block mb-2">Create PDF</button>
                </form>
            </div>
            @else
            <div class="alert alert-danger mt-5">
                Not Available!
            </div>
            @endif
        </div>
       
    </div>
@endsection
