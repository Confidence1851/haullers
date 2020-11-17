<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderContact;
use App\Vehicle;
use App\User;
use App\Payment;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::get();
        return view('admin.orders.view' , compact('orders'));
    }
    
    public function attachpay(Request $request , $id){
        $order = Order::findOrFail($id);
        // dd($order);
        $vehicle = Vehicle::findOrFail($request['v_id']);

        $now = new Carbon;
        $today = $now->format('Y-m-d');

        $type = $request['type'];
        if($type == "1"){
            $user = User::findOrFail($request['user_id']);
            $storePayment = Payment::create([
                'user_id' => $user->id,
                'payment_ref_no' => $request['ref'],
                'price' => $request['price'],
                'status' => 1 ,
                'date' => $today ,
            ]);

        }
        elseif($type == "0"){
            $customer = OrderContact::findOrFail($request['user_id']);

            $storePayment = Payment::create([
                'order_contact_id' => $customer->id,
                'payment_ref_no' => $request['ref'],
                'price' => $request['price'],
                'status' => 1 ,
                'date' => $today ,
            ]);
        }
        
        $order->payment_id = $storePayment->id;
        $order->status = 'Approved';
        $order->save();
        $vehicle->use_count = $vehicle->use_count + 1;
        $vehicle->save();
        
        if(!empty($order->payment_id)){
            return redirect()->route('admin.orders.index')->with('flash_message_success','Order with ID '.$id.' has been updated and approved successfully!');
        }
        else{
            return redirect()->route('admin.orders.index')->with('flash_message_error','Transaction failed!');
        }
    }

    public function approveOrder($id){
        $order = Order::findOrFail($id);
        $vehicle = Vehicle::findOrFail($order->vehicle_id);
        $order->status = 'Approved';
        $order->save();
        $vehicle->use_count = $vehicle->use_count + 1;
        $vehicle->save();
        return redirect()->route('admin.orders.index')->with('flash_message_success','Order with ID '.$id.' has been updated and approved successfully!');
    }
}
