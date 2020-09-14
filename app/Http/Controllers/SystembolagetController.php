<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SystembolagetController extends Controller
{
    public function getProducts()
    {
        $response = Http::withHeaders(
            [
                'Ocp-Apim-Subscription-Key' => env('SYSTEMBOLAGET_API_KEY'),
            ]
        )->get('https://api-extern.systembolaget.se/product/v1/product');

        return $response->json();
    }

}
