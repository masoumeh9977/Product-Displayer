@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="card-title">Please Enter Your Favorite Product ID to See Its Details</h4>
                    <form class="mt-3" action="{{ route('product.show') }}" method="GET">
                        @csrf
                        
                        <label for="product_id">Id:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon">dkp-</span>
                            <input type="text" class="form-control" id="product_id" name="id" title="dkp-id"
                                aria-describedby="basic-addon">
                        </div>

                        @error('id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <button type="submit" class="btn btn-primary btn-block mb-2">Display Details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
