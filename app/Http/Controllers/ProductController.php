<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function show(ProductRequest $request)
    {
        $params = $request->validated();

        //Send Requset To Another Server
        $response = Http::get('https://api.digikala.com/v1/product/' . $params['id'] . '/');
        if ($response->status() == 200) {
            $product = new Product();
            $product->fill($response['data']['product']);

            return view('product.show', ['product' => $product]);
        }
    }

    public function create_pdf()
    {
    }
}
