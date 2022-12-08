<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(Request $request){
        $data = [];

        $productList = Product::all();
        $data['list'] = $productList;

        return view("home", $data);
    }

    public function category(Request $request, $category_id = 0){
        $data = [];

        $categoryList = Category::all();

        $productQuery = Product::limit(4);
        if($category_id != 0){
            $productQuery->where("category_id", $category_id);
        }
  
        $productList = $productQuery->get();
  
        $data['categoryList'] = $categoryList;
        $data['productList'] = $productList;

        return view("category", $data);
    }
}
