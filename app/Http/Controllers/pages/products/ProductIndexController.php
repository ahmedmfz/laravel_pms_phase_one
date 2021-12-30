<?php

namespace App\Http\Controllers\pages\products;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Traits\uploadTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\product\StoreProduct;
use App\Http\Requests\product\UpdateProduct;



class ProductIndexController extends Controller
{
    use uploadTrait;

    public function index()
    {
        $data = Product::with('category')->get();
        return view('pages.products.index' ,compact('data'));
    }


    public function create()
    
    {
        $categories = Category::all();
        return view('pages.products.add' , compact('categories'));
    }

  
    public function store(StoreProduct $request)
    {
        //trait upload
        $file_name = $this->saveImage($request->image,'products');

        $data = $request->all();
        $data['image'] = $file_name;
        $target_data = Product::create($data);
        $target_data->save();

        return back()->with('success','you added Product successfully');
     
    }


    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $data = Product::where('id',$product->id)->first();
        $categories = Category::all();
        return view('pages.products.edit', compact('data','categories'));
    }
  
    
    public function update(UpdateProduct $request, Product $product)
    {
       
        $data = $request->all();
        $target_data = Product::where('id',$product->id)->first();

        //check image uploaded
        if ($request->file('image')!=null):

            $path = 'assets/images/products/'.$target_data->image;

            if(file_exists($path)):
                unlink($path);
            endif;

            $file_name = $this->saveImage($request->image,'products');   
            $data['image'] =  $file_name;
        endif;//end check

         $target_data->update($data);
         return redirect('/products')->with('update','you updated Product succssefully');
    }
    
    public function destroy(Product $product)
    {
       
        $data = Product::where('id',$product->id)->first();
        $path = 'assets/images/products/'.$data->image;

        if(file_exists($path)):
            unlink($path);
        endif;
        
        $data->delete();

        return redirect('/products')->with('delete','you deleted Product succssefully');
    }

    public function addToCart(Request $request , $id){
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($product , $product->id);
        $request->session()->put('cart',$cart);

        return redirect('/products');
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('pages.cart.index');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('pages.cart.index',['products'=>$cart->items ,'totalPrice'=>$cart->totalPrice]);
    }

    public function getRemoveItem($id){
        
        $oldCart = Session::get('cart');
        $cart    = new Cart($oldCart);
        $cart->removeItem($id);
        if($cart->totalQty <= 0):
            session()->forget('cart');
        else:
            session()->put('cart' ,$cart);
        endif;
            
        return back();
    }

    public function getDestroy(){
        if(Session::has('cart')){
            session()->forget('cart');
            return view('pages.cart.index');
        }
    }
}
