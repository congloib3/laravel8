<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function addProducts(){
        $products = [
            ["name" => "Phone"],
            ["name" => "Tablet"],
            ["name" => "Laptop"],
            ["name" => "Watch"],
            ["name" => "Television"],
        ];

        Product::insert($products);
        return "Product has been added successfully";
    }

    public function search(){
        return view('search');
    }

    public function autoComplete(Request $request){
        // dd($request->terms);
        $datas = Product::select("name")
                        ->where("name", "LIKE", "%{$request->terms}%")
                        ->get();
        return response()->json($datas);
    }
}
