@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="card-title">Please Enter Your Favorite Product ID to See Its Details</h4>
                    <form class="mt-3" action="#" method="GET">
                        @csrf
                        <div class="form-group">
                            <label for="product_id">Id:</label>
                            <input type="text" class="form-control" id="product_id" name="product_id" title="dkp-id">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mb-2">Display Details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
