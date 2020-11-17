<?php

namespace App\Http\Controllers;

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
use App\Post;
use Auth;
use App\VehicleCategory;
use Carbon\Carbon;
class WebController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }
    
    public function index()
    {
        $vehiclesAll = Vehicle::where('vehicle_status' , 'Active')->orderBy('vehicle_name' , 'asc')->get();

        $mostuseds = Vehicle::where('vehicle_status' , 'Active')->orderBy('use_count' , 'desc')->limit(6);
        foreach ($vehiclesAll as $key => $value) {
            $routecategory_name = RouteCategory::where(['id'=>$value->route_cat_id])->first();
            $vehiclesAll[$key]->routecategory_name = $routecategory_name->name;
        }
        return view('welcome' , compact('vehiclesAll','mostuseds'));
    }

    public function vehicles(){
        $vehiclesAll = Vehicle::where('vehicle_status' , 'Active')->orderBy('vehicle_name' , 'asc')->get();
        foreach ($vehiclesAll as $key => $value) {
            $routecategory_name = RouteCategory::where(['id'=>$value->route_cat_id])->first();
            $vehiclesAll[$key]->routecategory_name = $routecategory_name->name;
        }
        return view('vehicles')->with(compact('vehiclesAll'));
    }
    
    public function vehicle_search(Request $request){
        $keyword = $request['keyword'];
        $vehiclesAll = Vehicle::where('vehicle_status' , 'Active')->where('vehicle_name','like','%'.$keyword.'%' )->orWhere('vehicle_model','like','%'.$keyword.'%' )->orderBy('vehicle_name' , 'asc')->get();
        foreach ($vehiclesAll as $key => $value) {
            $routecategory_name = RouteCategory::where(['id'=>$value->route_cat_id])->first();
            $vehiclesAll[$key]->routecategory_name = $routecategory_name->name;
        }
        return view('vehicles')->with(compact('vehiclesAll' ,'keyword'));
    }

    public function vehicleInfo($id){
        $vehicle=Vehicle::where('id', $id)->first();
        $routecategory = RouteCategory::where('id', $vehicle->route_cat_id)->first();
        $relatedVs = Vehicle::where('id','!=', $vehicle->id)->where('route_cat_id', $vehicle->route_cat_id)->paginate(5);
        // dd($relatedVs);
        return view('vehicleinfo', compact('vehicle','relatedVs', 'routecategory'));
    }
    
    public function post_categories(){
        return Post::where('status' , 'Active')->distinct('category')->get();
    }
    public function latest_posts(){
        return Post::where('status' , 'Active')->orderBy('created_at' , 'desc')->limit(3)->get();
    }
    
    public function blog(){
        $posts = Post::where('status' , 'Active')->orderBy('created_at' , 'desc')->get();
        $cats = $this->post_categories();
        $latests = $this->latest_posts();
        return view('blog')->with(compact('posts' , 'cats' ,'latests'));
    }
    
    public function blog_search(Request $request){
        $keyword = $request['keyword'];
        $posts = Post::where('status' , 'Active')->where('title','like','%'.$keyword.'%' )->orWhere('message','like','%'.$keyword.'%' )->orderBy('created_at' , 'desc')->get();
        $cats = $this->post_categories();
        $latests = $this->latest_posts();
        // dd($posts->count());
        return view('blog')->with(compact('posts' , 'cats','keyword','latests'));
    }
    
    public function blog_category($category){
        $posts = Post::where('status' , 'Active')->where('category',$category)->orderBy('created_at' , 'desc')->get();
        $cats = $this->post_categories();
        $latests = $this->latest_posts();
        return view('blog')->with(compact('posts' , 'cats','latests'));
    }
    
    public function blog_info($id){
        $post = Post::findorfail($id);
        return view('blog_info')->with(compact('post'));
    }


    public function routeCats($id){
        $routes = RouteCategory::where('id',$id)->orderBy('state' , 'asc')->get()->toArray();
        
        return response()->json(array($routes));
    }

    public function catRoutes($id){
        $routes = Route::where('route_cat_id' , $id)->orderBy('start' , 'asc')->get()->toArray();
        
        return response()->json(array($routes));
    }
    

    public function bookVehicle(Request $request){
        $data = $request->validate([
            'VehicleID' => 'required|string',
            'price' => 'required|string',
            'type' => 'required|string',
            'route_id' => 'nullable|string',
        ]);
        // dd($data);
        
        $price = $data['price'];

        if($data['type'] == "0"){
            $route = '';
        }
        else{
            $route = $data['route_id'];
            $route = explode(",",$route[0]);
            $route = $route[0];
        }
        // dd($route);

        if(Auth::check()){
            $mode = 1;
            $user = Auth::User();
            $name = $user->name;
            $email = $user->email;
            $phone = $user->phone;
            $phone2 = $user->phone2;
        }
        else{
            $mode = 0;
            $name = Null;
            $email = Null;
            $phone = Null;
            $phone2 = Null;
        }
      $values = [
            'mode'=> $mode,
            'name'=> $name,
            'email'=> $email,
            'phone'=> $phone,
            'phone2'=> $phone2,
            'price'=> $price,
            'type' => $data['type']
        ];
        $vehicle = Vehicle::where('id' , $data['VehicleID'])->first();
        $route = Route::where('id' , $route)->first();
        
        return view('payment', compact('mode' ,'values' , 'vehicle' , 'route'));
    }

    public function fulldayBooking(Request $request){
        return response()->json($request->all());
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'phone2' => 'nullable|string',
            'reference' => 'required|string',
            'mode' => 'required|string',
            'v_id' => 'required|string',
            'price' => 'required|string',
        ]);

        $mode = $request['mode'];
        $now = new Carbon;
        $today = $now->format('Y-m-d');

        //save payment details in database
        if($mode == 1){
            $user = Auth::User();
            $user->name = $request['name'];
            $user->phone = $request['phone'];
            $user->phone2 = $request['phone2'];
            $user->save();

            $storePayment = Payment::create([
                'user_id' => $user->id,
                'payment_ref_no' => $request['reference'],
                'price' => $request['price'],
                'status' => 0 ,
                'date' => $today ,
            ]);

            $message = Message::create([
                'user_id' => $user->id,
                'user_type' => 'User',
                'payment_id' => $storePayment->id,
                'message' => 'A new payment has been made.Please review payment details immediately!',
                'type' => 'Payment',
            ]);

            //send email to user containing payment information
            
            //store order
            $storeOrder = Order::create([
                'user_id' => $user->id,
                'payment_id' => $storePayment->id,
                'route_id' => $request['r_id'],
                'vehicle_id' => $request['v_id'],
            ]);

        }
        
        else{
            $findContact = OrderContact::where('email' , $request['email']);
            $count = $findContact->count();

            // if($count > 0){
            //     $findContact->delete();
            // }
            
            $contact = OrderContact::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'phone2' => $request['phone2'],
            ]);

            $storePayment = Payment::create([
                'order_contact_id' => $contact->id,
                'payment_ref_no' => $request['reference'],
                'price' => $request['price'],
                'status' => 0 ,
                'date' => $today ,
            ]);

            $message = Message::create([
                'user_id' => $contact->id,
                'user_type' => 'Guest',
                'payment_id' => $storePayment->id,
                'message' => 'A new payment has been made.Please review payment details immediately!',
                'type' => 'Payment',
            ]);

            //send email to user containing payment information

            $storeOrder = Order::create([
                'order_contact_id' => $contact->id,
                'payment_id' => $storePayment->id,
                'route_id' => $request['r_id'],
                'vehicle_id' => $request['v_id'],
            ]);
            
        }


            
    
            //send a notification to admin dashboard about new order as a message
            if($mode == 1){
                $message = Message::create([
                    'user_id' => $user->id,
                    'user_type' => 'User',
                    'order_id' => $storeOrder->id,
                    'message' => 'A new order has been made.Please review order details immediately!',
                    'type' => 'Order',
                ]);
            }
            else{
                $message = Message::create([
                    'user_id' => $contact->id,
                    'user_type' => 'Guest',
                    'order_id' => $storeOrder->id,
                    'message' => 'A new order has been made.Please review order details immediately!',
                    'type' => 'Order',
                ]);
            }
            
            // send a order detail mail
            if($mode == 1){
                 $me = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'payment_id' => $storePayment->id,
                    'order_id' => $storeOrder->id,
                    'vehicle_id' => $request['v_id'],
                ];
            }
            else{
                $me =[
                    'name' => $contact->name,
                    'email' => $contact->email,
                    'payment_id' => $storePayment->id,
                    'order_id' => $storeOrder->id,
                    'vehicle_id' => $request['v_id'],
                ];
            }


            Mail::to($me['email'])->send(new Tested($me));

            //return with success page
            return response()->json(['success' => $storeOrder->id ]);
            
            

    }
    

    public function notifyForBooking(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'phone2' => 'nullable|string',
            'mode' => 'required|string',
            'v_id' => 'required|string',
            'price' => 'required|string',
        ]);

        $mode = $request['mode'];
        if($mode == 1){
            $user = Auth::User();
            $user->name = $request['name'];
            $user->phone = $request['phone'];
            $user->phone2 = $request['phone2'];
            $user->save();

            $storeOrder = Order::create([
                'user_id' => $user->id,
                'route_id' => $request['r_id'],
                'vehicle_id' => $request['v_id'],
            ]);

            $message = Message::create([
                'user_id' => $user->id,
                'user_type' => 'User',
                'order_id' => $storeOrder->id,
                'message' => 'A new order has been made.Please review order details immediately!',
                'type' => 'Order',
            ]);
    } 
        
    else{
            $findContact = OrderContact::where('email' , $request['email']);
            $count = $findContact->count();

            // if($count > 0){
            //     $findContact->delete();
            // }
            
            $contact = OrderContact::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'phone2' => $request['phone2'],
            ]);

            $storeOrder = Order::create([
                'contact_id' => $contact->id,
                'route_id' => $request['r_id'],
                'vehicle_id' => $request['v_id'],
            ]);
            
            

            $message = Message::create([
                'user_id' => $contact->id,
                'user_type' => 'Guest',
                'order_id' => $storeOrder->id,
                'message' => 'A new order has been made.Please review order details immediately!',
                'type' => 'Order',
            ]);
    
    }
       
         //send a notification to admin dashboard about new order as a message
        
         return response()->json(['success' => $storeOrder->id ]);
    }
    
    
    public function testmail(){
          $me =[
                    'name' => 'Confidence Ugolo',
                    'email' => 'ugoloconfidence@gmail.com',
                    'payment_id' => 31,
                    'order_id' => 35,
                    'route_id' =>2,
                    'vehicle_id' => 3,
                ];

          Mail::to($me['email'])->send(new Tested($me));
          dd($me);
    }
    
}












