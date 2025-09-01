<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::all();

        $query = Product::query();

        if ($request->brand_id) {
            $query->where('brand_id', $request->brand_id);
        }

        $products = $query->with('photos')
                ->when($request->price, fn($q) => $q->where('price',$request->price))
                ->paginate(8)
                ->withQueryString();
        return view('product',compact('brands','products'));
    }

    public function detail(Product $product)
    {
        return view('product.detail',compact('product'));
    }

    public function addCard(Product $product)
    {
        dd($product);
    }
}
