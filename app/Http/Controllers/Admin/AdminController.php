<?php

namespace App\Http\Controllers\Admin;
use App\Models\Item;
use App\Models\SupplierBalance;
use App\Models\Supply;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\DeclareDeclare;
use function PHPUnit\Framework\returnArgument;

class AdminController extends Controller
{
    public function index(){
        $items = Item::paginate(5);
        $supplied = Supply::paginate(5);
        return view('admin.home', ['items' =>$items , 'supplied' =>$supplied ]);
    }
    public function addSupplier(){
        $users = User::paginate(5);
        return view('admin.addSupplier')->with('user' , $users);
    }
    public function editUser(Request $request ,$id){

        $user= User::findOrFail($id);
        return view('admin.editUser')->with('user' , $user);

    }
    public function updateUser(Request $request ,$id){

        $user = User::find($id);
        $user->name = $request->input('username');
        $user->user_type = $request->input('user_type');
        $user->save();

        if ($request->input('user_type')=='supplier'){
        $supplier_balance = new SupplierBalance();
        $supplier_balance->supplier_id = $id;
        $supplier_balance->supplierName =$user->name;
        $supplier_balance->balance = 0.00;
        $supplier_balance->save();

        return redirect('addsupplier')->with('status' , 'Data updated successfully');
        }


        else{


                if (SupplierBalance::where('supplier_id', $id)->first()!=null){
                  $user = SupplierBalance::where('supplier_id', $id)->first();
                  $user->delete();
                    return redirect('addsupplier')->with('status', 'Data updated successfully');
                }
                else {
                    return redirect('addsupplier')->with('status', 'Data updated successfully');
                }

        }


    }
    public function addSuppliableItem(Request $request){
        $item = new Item();
        $item->name = $request->input('item');
        $item->save();
        Session::flash('iconstatus' , 'success');
        return redirect('dash')->with('status', 'Item added successfully');
    }

    public function viewSuppliedItemDetails($id){
        $supplied = Supply::paginate(5);
        $suppliedDetails = Supply::find($id);
        $supplierbalance = SupplierBalance::where('supplier_id', $suppliedDetails->supplier_id)->first();
        return view('admin.viewDetails',['suppliedDetails' =>$suppliedDetails , 'supplied' =>$supplied,'supplierbalance' =>$supplierbalance ]);

    }
    public function paySupplierView($id){
        $supplied = Supply::paginate(5);
        $supplierbalance = SupplierBalance::where('supplier_id',$id)->first();
        return view('admin.paySupplier',[ 'supplied' =>$supplied,'supplierbalance' =>$supplierbalance ]);


    }
    public function paySupplier(Request $request ,$id){
        $supplierbalance = SupplierBalance::where('supplier_id',$id)->first();
        $supplierbalance->balance -=  $request->input('amount');
        $supplierbalance->save();
        Session::flash('iconstatus' , 'success');

        return redirect()->to('pay-supplier-view/'.$id)->with('status', 'Money paid to '.$supplierbalance->supplierName);
    }

    public function manageSupplier(){
        $supplierbalances = SupplierBalance::paginate(5);
        return view('admin.manageSupplier')->with('supplierbalances',$supplierbalances);
    }

}

