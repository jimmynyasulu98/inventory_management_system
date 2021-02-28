<?php


namespace App\Models;


class Cart
{
     public $items = null;
     public $totalQuantity;
     public $totalPrice;

     public function __construct($oldCart){
         if($oldCart) {

             $this->items = $oldCart->items;
             $this->totalQuantity = $oldCart->totalQuantity;
             $this->totalPrice = $oldCart->totalPrice;
         }
     }

    public function add($item, $id){
        $storedItem = array('quantity' =>0 , 'price' => $item->price_each , 'item'  => $item);
        if ($this->items){
            if(array_key_exists($id , $this->items)){
                $storedItem = $this->items[$id];

            }
        }
        $storedItem['quantity']++;
        $storedItem['price'] = $item->price_each * $storedItem['quantity'];
        $this->items[$id] = $storedItem;
        $this->totalQuantity++;
        $this->totalPrice += $item->price_each;
    }
    public function reduceByOne($id){
        $this->items[$id]['quantity']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price_each'];
        $this->totalQuantity--;
        $this->totalPrice -= $this->items[$id]['item']['price_each'];

        if ($this->items[$id]['quantity'] <=0){
            unset($this->items[$id]);
        }

    }
    public function removeItem($id){
        $this->totalQuantity -= $this->items[$id]['quantity'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }

}
