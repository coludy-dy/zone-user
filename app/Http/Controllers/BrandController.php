<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(10)->withQueryString();
        return view('brands.index',compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string'
        ]);

        $name = Brand::where('name', $request->name)->first();

        if(!$name){
            Brand::create([
                'name' => $request->name
            ]);
        
            return back()->with('success','Success');
        }
        return redirect()->back()->with('error','Error');
    }
}
