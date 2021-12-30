<?php

namespace App\Models;

class Cart
{
   public $items = null; //assiotaive array of products you ad
   public $totalQty = 0; //sum of all product you ad
   public $totalPrice = 0; //sum of all product prices you add


   public function __construct($oldCart)
   {
       if($oldCart){
           $this->items = $oldCart->items;
           $this->totalQty = $oldCart->totalQty;
           $this->totalPrice = $oldCart->totalPrice;
       }
   }

   
   public function add($item ,$id){
    
        $storedItem = ['qty'=> 0 ,'price' => $item->price , 'item' => $item];

        if($this->items){
            if(array_key_exists($id , $this->items)){
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
   }

   public function removeItem($id){

        if(array_key_exists($id , $this->items)){
            $this->totalQty   -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['price'];
            unset($this->items[$id]);
        } 
   }

   public function edit(){
       //
   }

   public function destroy(){
       //
   }

}
