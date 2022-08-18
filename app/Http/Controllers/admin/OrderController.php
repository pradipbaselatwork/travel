<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Order;
use App\Orderdetail;
use App\User;
use Auth;

class OrderController extends Controller
{
    public function showorder()
    {
       $showorder = Order::get();
        Session::flash('page', 'showorder');
        return view('admin.showorder.showorder', compact('showorder'));
    }

    public function deleteOrder($id)
    {
      $id =Order::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Order is Canceled successfully!');

    }

    public function seeorderdetail($id)
    {
       $showorder = Order::where('id',$id)->get();
        $order = Order::find($id);
        $seeorder = Orderdetail::where('order_id',$id)->get();
        Session::flash('page', 'showorder');
        return view('admin.showorder.seeorder', compact('seeorder','showorder','order'));
    }

    
 public function updateorder(Request $request,$id)
 {
    $data = $request->all();
    $order = Order::find($id);
    $order->status = $data['status'];
    $order->save(); 
    Session::flash('success_message','Order Updated updated successfully!');
    return redirect()->back();
 }

 public function users()
 {
   $users = User::get();
   Session::flash('page', 'users');
   return view('admin.showorder.users', compact('users'));
 }
    


}
