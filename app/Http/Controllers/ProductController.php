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
        $data['productList'] = $productList;

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
        $data['category_id'] = $category_id;

        return view("category", $data);
    }

    public function addToCart(Request $request, $product_id = 0){
        $prod = Product::find($product_id);
        if($prod){
            $cart = session('cart', []);
            array_push($cart, $prod);
            session(['cart' => $cart]);
        }
        
        return redirect()->route("home");
    }
    
    public function showCart(Request $request){
        $cart = session('cart', []);
        $data = ['cart' => $cart];
        return view('cart', $data);
    }

    public function removeFromCart(Request $request, $index){
        $cart = session('cart', []);
        if(isset($cart[$index])){
            unset($cart[$index]);
        }
        session(['cart' => $cart]);
        return redirect()->route('showCart');
    }
}
