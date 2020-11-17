<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RouteCategory;
use App\Route;

class RouteController extends Controller
{
    public function index(){
        $routes = Route::paginate(20);
        return view('admin.routes.view', compact('routes'));    }

    public function create(){
        $cats = RouteCategory::get();
        return view('admin.routes.add' , compact('cats'));
    }
    public function store(Request $request){
        $data = $this->verify($request);
        
        $routeCat = Route::create([
           'route_cat_id' => $request->input('route_cat_id'),
           'start' => $request->input('start'),
           'end' => $request->input('end'),
           'price' => $request->input('price'),
        ]);
        return redirect()->route('admin.routes.index')->with('flash_message_success','Route added successfully!');
    }

    public function edit($id){
       $routeDetails = Route::findOrFail($id);
       $cats = RouteCategory::get();
       return view('admin.routes.edit' , compact('routeDetails' , 'cats'));
    }

    public function update(Request $request,$id){
        $data = $this->verify($request);

        $route = Route::findOrFail($id);
        $route->route_cat_id = $request->input('route_cat_id');
        $route->start = $request->input('start');
        $route->end = $request->input('end');
        $route->price = $request->input('price');
        $route->save();
        return redirect()->route('admin.routes.index')->with('flash_message_success','Route updated successfully!');
     }

    public function delete($id){
        $route = Route::findOrFail($id);
        $route->delete();
        return redirect()->route('admin.routes.index')->with('flash_message_success','Route deleted successfully!');
     }

     public function verify($request){
        $data =$request->validate([
            'route_cat_id' => 'required',
            'start' => 'required',
            'end' => 'required',
            'price' => 'required',
        ]);
        return $data;
     }
}
