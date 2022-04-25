<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Error;
use Exception;

class ProductsController extends Controller
{
    

    function search(){
        $skuList = request('sku', []);
        $products = [];
        foreach ($skuList as $sku) {
            // Check error
            if ($sku==501) {
                throw new Error("Internal Server Error", 501);
            }
            // wait function
            if ($sku==98765) {
                $sec = rand(5, 10);
                sleep($sec);
            }
            // check value if availble on cache
            if (!cache()->has($sku)) {
                $price = rand(300, 1200);
                $vat = round($price*25/100, 2);
                $product = [
                    "sku" => $sku,
                    "vat" => '25%',
                    "priceExcVat" => $price,
                    "priceIncVat" => $price+$vat,
                    "priceExcVatFormatted" => "SEK ".number_format($price, 2),
                    "priceIncVatFormatted" => "SEK ".number_format($price+$vat, 2)
                ];
                cache()->put($sku, $product);
            }
            $products[] = cache($sku);
        }
        return response($products);
    }


}
