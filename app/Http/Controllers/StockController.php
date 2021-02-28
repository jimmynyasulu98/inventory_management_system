<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Stock;
use App\Models\SupplierBalance;
use App\Models\Supply;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StockController extends Controller
{
    public function addToStockList(){

        $items = Supply::paginate(6);
        return view('admin.addToStockList')->with('items' , $items);

    }
    public function addToStock(Request $request, $id){
        try {
            $row = Supply::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('admin.addPrice')->with('row' , $row);
    }

    public function addItem(Request $request, $id){
        $rowSupply = Supply::findOrFail($id);

        //check if this stock with same columns exists. if so just add the quantity if the two
        if (Stock::where('item', $rowSupply->item )->count() > 0){
            $rowStock = Stock::where('item', $rowSupply->item )->first();
            $pricePerItem = $request->input('price');
            if($rowSupply->size == $rowStock->size and $rowSupply->colour == $rowStock->colour and $pricePerItem== $rowStock->price_each and $rowSupply->brand == $rowStock->brand)
            {
                $rowStock->quantity += $rowSupply->quantity;
                $rowStock->save();
            }

            else {
                $rowStock = new Stock();
                $rowStock->item =  $rowSupply->item;
                $rowStock->quantity  = $rowSupply->quantity;
                $rowStock->size  = $rowSupply->size;
                $rowStock->colour  = $rowSupply->colour;
                $rowStock->brand  = $rowSupply->brand;
                $rowStock-> price_each = $request ->input('price');
                $rowStock->imagePath = $request ->input('imagePath');
                $rowStock->save();
            }
        }
        //if it doesnt exist create instance and assign values
        else {
            $rowStock = new Stock();
            $rowStock->item =  $rowSupply->item;
            $rowStock->quantity  = $rowSupply->quantity;
            $rowStock->size  = $rowSupply->size;
            $rowStock->colour  = $rowSupply->colour;
            $rowStock->brand  = $rowSupply->brand;
            $rowStock-> price_each = $request ->input('price');
            $rowStock->imagePath = $request ->input('imagePath');
            $rowStock->save();
        }

        //updating the balance of supplier in balance tables after supplied item is added to stock
        $supplierBalance = SupplierBalance::where('supplier_id', $rowSupply->supplier_id)->first();
        $supplierBalance->balance += $rowSupply->price;
        $supplierBalance->save();

        //Adding the item to history
            //code here

        //removing supplied item from supplied items table table
        $rowSupply->delete();
        return redirect('add-to-stock-list')->with('status' , 'Item added to stock successfully');

    }

    public function addToCart(Request $request, $id){
        $stockItem = Stock::find($id);
        $oldcart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldcart);
        $cart->add($stockItem , $stockItem->id);
        $request->session()->put('cart',$cart);
        return redirect('home');
        //dd($request->session()->get('cart'));
    }
    public function shoppingCart(){
        if (!Session::has('cart')){
            return view('home');
        }

        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        return view('cart', ['stockItems' =>$cart->items , 'totalPrice' =>$cart->totalPrice ]);
    }
    public function getReduceByOne($id){
        $oldcart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldcart);
        $cart->reduceByOne($id);

        Session::put('cart', $cart);
        return redirect('shopping-cart');
    }
    public function getRemoveItem($id){
        $oldcart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldcart);
        $cart-> removeItem($id);

        Session::put('cart', $cart);
        return redirect('shopping-cart');
    }

    public function buyItems(Request $request){
        if (!Session::has('cart')){
            return view('home');
        }
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        $order = new Order();

        $order->cart = serialize($cart);
        $order->user_id = Auth::user()->id;
        $order->total_price = $cart->totalPrice;
        $order->money_paid = $request->input('amount');
        $order->payment_method = $request->input('paymentMethod');
        $order->save();

        foreach($cart->items as $key => $item){
            //dd($key);
            $stock = Stock::findOrFail($key);
            $stock->quantity -= $item['quantity'];
            $stock->save();
        }

        Session::forget('cart');
        return redirect('home')->with('status' , 'Order placed successfully');
    }

    public function manageStock(){
        $stocks = Stock::paginate(6);
        return view('admin.manageStock')->with('stocks' , $stocks);
    }
    public function editStock($id){
        $stocks = Stock::paginate(6);
        $stockItem = Stock::findOrFail($id);
        return view('admin.editStock', ['stocks' =>  $stocks, 'stockItem' =>$stockItem ]);

    }
    public function updateStock(Request $request , $id){
        $stockItem = Stock::findOrFail($id);
        $stockItem->price_each = $request->input('price');
        $stockItem->quantity = $request->input('quantity');
        $stockItem->save();
        Session::flash('iconstatus' , 'success');
        return redirect()->to('edit-stock/'.$id)->with('status' , 'Item updated');

    }
    public function deleteStock($id){
        $stockItem = Stock::findOrFail($id);
        $stockItem->delete();
        Session::flash('iconstatus' , 'warning');
        return redirect()->to('manage-stock')->with('status' , 'successfully deleted item with ID: '.$id);

    }
    public function getOrders(){
        $orders = Order::paginate(6);
        foreach($orders as $order){
            $order->cart = unserialize($order->cart);
            $orders->cart = $order->cart;
        }
        return view('admin.orders')->with('orders', $orders);

    }


}
