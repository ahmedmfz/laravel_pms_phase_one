<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $categories = count(Category::all());
        $users = count(User::all());
        $products = count(Product::all());
        $orders = count(Order::all());
        return view('pages.index' , compact('categories','users','products','orders'));
    }

}
