<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myProfile(){

        $orders = Order::where('user_id', Auth::user()->id)->get();
        foreach($orders as $order){
          $order->cart = unserialize($order->cart);
            $orders->cart = $order->cart;
        }
        return view('profile')->with('orders', $orders);

    }

}
