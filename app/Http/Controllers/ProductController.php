<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

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

    public function create_pdf($product_id)
    {
        $response = Http::get('https://api.digikala.com/v1/product/' . $product_id . '/');
        if ($response->status() == 200) {
            $product = new Product();
            $product->fill($response['data']['product']);

            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML(
                '<h1>' . $product->title_fa . '</h1>' .
                    '<p>Category: </p><p>{{' . $product->category['title_fa'] . ' }}</p>' .
                    ' <p>Code: </p><p>{{' . $product->id . ' }}</p>' .
                    ' <p>Count: </p><p>{{' . $product->rating['count'] . ' }}</p>' .
                    '<p>Rate: </p><p>{{' . $product->rating['rate'] . ' }}</p>'

            );
            return $pdf->stream();
        }
    }
}
