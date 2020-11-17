<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $payments = Payment::orderby('created_at','desc')->get();
        return view('admin.payments.view' , compact('payments'));
    }

    public function approvePayment($id){
        $payment = Payment::findOrFail($id);
        $payment->status = 1;
        $payment->save();

        $order = Order::where('payment_id', $payment->id);
        $count = $order->count();

        if($count > 0 ){
            $order = $order->first();
            $order->status = 'Approved';
            $order->save();
        }

        return redirect()->back()->with('flash_message_success','Payment with ID '.$id.' has been updated and approved successfully!');
    }
}
