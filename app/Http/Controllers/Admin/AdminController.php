<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
//use http\Client\Curl\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addSupplier(){
        $users = User::paginate(5);
        return view('admin.addSupplier')->with('user' , $users);
    }
}
