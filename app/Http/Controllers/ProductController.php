<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $data = [];

        $productList = \App\Models\Product::all();
        $data['list'] = $productList;

        return view("home", $data);
    }

    public function category(Request $request){
        $data = [];

        return view("category", $data);
    }
}
