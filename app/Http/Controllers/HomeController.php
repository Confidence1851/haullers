<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Mail\Tested;
use App\Mail\OrderDetailFormMail;
use App\Mail\PaymentDetailFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Vehicle;
use App\Company;
use App\Message;
use App\Order;
use App\Payment;
use App\OrderContact;
use App\Route;
use App\RouteCategory;
use App\User;
use Auth;
use App\VehicleCategory;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware(['auth','verified']);
    }
     // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'Admin' or Auth::user()->role == 'admin'){
             return redirect('/admin/dashboard');
        }
        return view('home');
    }
    
    public function settings(){
        $user = Auth::User();
        return view('users.settings', compact('user'));
   }

   public function logout(){
        Session::flush();
        return redirect()->route('index');
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['role'=> 'user'])->first();
        if (Hash::check($current_password,$check_password->password)) {
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
            if (Hash::check($current_password,$check_password->password)) {
                $password = bcrypt($data['new_pwd']);
                User::where('id',Auth::User()->id)->update(['password'=>$password]);
                return redirect('/users/settings')->with('flash_message_success','Password updated Successfully!');
            }else {
                return redirect('/users/settings')->with('flash_message_error','Incorrect Current Password!');
            }
        }
    }
    
    public function profile(){
        $user = Auth::User();
        return view('users.profile', compact('user'));
    }

    public function updateprofile(Request $request) {
        $user = Auth::User();

        request()->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'phone' => 'required|string|max:25',
            'phone2' => 'nullable|string|max:25',
        
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->phone2 = $request->input('phone2');

    
        $affected_row = $user->save();

        if (!empty($affected_row)) {
            return redirect()->back()->with('flash_message_success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('flash_message_error', 'Operation failed !');
        }
    }

    public function order(){
        $user = Auth::User();
        // $payments= array();
        // $valids = Payment::where('user_id' , $user->id)->get();
        // foreach($valids as $valid){
        //     $o = Order::where('payment_id', $valid->id);
        //     $order = $o->first();
        //     if($o->count() > 0){
        //         array_push($payments,$order->id);
        //     }
        // }
        
         $orders = Order::where('user_id' , $user->id)->get();
    
        return view('users.orders.view', compact('orders','user'));
    }

    public function payment(){
        $user = Auth::User();

        $payments = Payment::where('user_id' , $user->id)->get();
    
        return view('users.payments.view', compact('payments','user'));
    }
}
