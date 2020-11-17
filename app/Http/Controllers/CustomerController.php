<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderContact as Customer;
class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::orderby('created_at' , 'desc')->get();
        // dd($customers);
        return view('admin.customers.view' , compact('customers'));
    }


    public function delete($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('dashboard.customers.index')->with('flash_message_success','Customer deleted successfully!');
    }
}
