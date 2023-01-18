<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function show(ProductRequest $request)
    {
        //Get ProductId
        $params = $request->validated();

        //Send Requset To Another Server
        $product = $this->send_external_request($params['id']);
        return view('product.show', ['product' => $product]);
    }

    public function download_pdf($product_id)
    {
        $product = $this->send_external_request($product_id);
        if (isset($product->rating['count'])) {
            return $this->create_pdf_file($product);
        }
    }

    private function send_external_request($product_id)
    {
        if (Cache::get($product_id, '') != '') {
            return Cache::get($product_id, '');
        } else {
            $response = Http::get('https://api.digikala.com/v1/product/' . $product_id . '/');
            $product = new Product();
            if ($response['status'] == 200) {
                $product->fill($response['data']['product']);
            }
            $this->save_data_in_cache($product);
            return $product;
        }
    }

    private function save_data_in_cache($product)
    {
        Cache::add($product->id, $product, now()->addDay(7));
    }

    private function create_pdf_file($product)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(
            '<h1>' . $product->title_fa . '</h1>' .
                '<p>Category: </p><p>{{' . $product->category['title_fa'] . ' }}</p>' .
                '<p>Code: </p><p>{{' . $product->id . ' }}</p>' .
                '<p>Count: </p><p>{{' . $product->rating['count'] . ' }}</p>' .
                '<p>Rate: </p><p>{{' . $product->rating['rate'] . ' }}</p>'
        );
        return $pdf->stream();
    }
}
