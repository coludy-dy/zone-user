<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display the Home Page.
     */
    public function index(Request $request)
    {
        $brands = Brand::all();

        $query = Product::query(); 

        $best_sellers = Product::select('products.*', DB::raw('SUM(order_items.quantity) as total_quantity'))
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->groupBy('products.id')
            ->having('total_quantity', '>', 3)
            ->orderByDesc('total_quantity')
            ->get();

        if ($request->brand_id) {
            $query->where('brand_id', $request->brand_id);
        }

        $products = $query->paginate(8)->withQueryString();

        return view('welcome', compact('brands', 'products','best_sellers'));
    }

}
