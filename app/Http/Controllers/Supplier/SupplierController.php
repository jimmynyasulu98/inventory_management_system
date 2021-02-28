<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Supply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{

  public function index(){
      $items = Item::paginate(5);
      return view('supplier.home')->with('items' , $items);
  }
    public function selectItem(){

        $items = Item::paginate(5);
        return view('supplier.selectItem')->with('items' , $items);
    }

    public function supplyItem(Request $request){

       $row = new Supply();
       $row->supplier_id = Auth::user()->id;
       $row->supplierName = User::findOrFail(Auth::user()->id)->name;
       $row->item = $request->input('item');
       $row->quantity = $request->input('quantity');
       $row->size = $request->input('size');
       $row->colour = $request->input('colour');
       $row->brand = $request->input('brand');
       $row->price = $request->input('price');
       $row->comment = $request->input('comment');
       $row->save();
       Session::flash('iconstatus' , 'success');
       return redirect('/select-item')->with('status' , 'Item supplied successfully');

    }
    public function showRecentlySuppliedItem(){

      $rows = Supply::where('supplier_id',Auth::user()->id )->get();

      return view('supplier.recentlySupplied')->with('rows' , $rows);

    }
    public function editRow(Request $request, $id){

        $row = Supply::findOrFail($id);
        return view('supplier.editRow')->with('row' , $row);
    }

    public function updateRow(Request $request, $id){

      $row = Supply::find($id);

      $row->item = $request ->input('item');
      $row->quantity = $request ->input('quantity');
      $row->size = $request ->input('size');
      $row->colour = $request ->input('colour');
      $row->brand = $request ->input('brand');
      $row->price = $request ->input('price');
      $row->comment = $request ->input('comment');
      $row->update();
      Session::flash('iconstatus' , 'info');
      return redirect('/recently-supplied')->with('status' , 'Row updated successfully');
    }


}
