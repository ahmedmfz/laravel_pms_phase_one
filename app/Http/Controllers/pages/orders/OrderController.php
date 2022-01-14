<?php

namespace App\Http\Controllers\pages\orders;

use App\Models\Cart;
use App\Models\Order;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Models\Order_Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\order\StoreOrder;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    
    public function index(){
        $data = Order::with('products')->orderBy('id','desc')->get();
        return view('pages.orders.index' , compact('data'));
    }

    public function create(){
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('pages.orders.create',['totalPrice'=>$cart->totalPrice]);
    }
    
    public function store(StoreOrder $request){

       $data = $request->all();
       $data['user_id'] =  Auth::user()->id;
       $data = Order::create($data);

       $order_id = $data->id;
       $cart = $this->getCart();

       foreach($cart->items as $product){
            $product_id = $product['item']['id'];
            $qty= $product['qty'];

            Order_Product::create([
                'product_id' => $product_id,
                'order_id'   => $order_id,
                'quantity'   => $qty,
            ]);
       }
      
       session()->forget('cart');

       Mail::to($data->customer_email)->send(new OrderMail($data));
       
       return redirect('/')->with('success','your order on waiting list');
    }

    
    public function destroy($id){
        $data = Order::findOrFail($id);
        $data->delete();
        return back()->with('delete','you deleted order successfuly');
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('pages.cart.index');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return $cart;
    }

}
