<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $page = $request->get('page','1');
        $products = Product::paginate(50);
        if( $page > $products->lastPage() || $page < 1 ){
            abort(404,'page not found');
        }
        return view('welcome', ['products' => $products]);
    }
}
