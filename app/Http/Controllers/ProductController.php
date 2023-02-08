<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\SaleService;

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

    public function buyCart(Request $request){
        $prods = session('cart', []);
        $saleService = new SaleService();
        $result = $saleService->finishSale($prods, Auth::user());

        if($result["status"] == "ok"){
            $request->session()->forget("cart");
        }

        $request->session()->flash($result["status"], $result["message"]);
        return redirect()->route('showCart');

    }

    public function history(Request $request){
        $data = [];

        $userId = Auth::user()->id;

        $orderList = Order::where('user_id', $userId)->orderBy("order_date", "desc")->get();

        $data['list'] = $orderList;

        return view('history', $data);
    }

    public function orderDetails(Request $request){
        $orderId = $request->input("id");
        $itemList = OrderItem::join("products", "products.id", "=", "order_items.product_id")->where("order_id", $orderId)->get(["order_items.*", "order_items.value as item_value", "products.*"]);

        $data["itemList"] = $itemList;
        return view("details", $data);
    }
}
