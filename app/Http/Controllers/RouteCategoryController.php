<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RouteCategory;

class RouteCategoryController extends Controller
{
    public function index(){
        $categories = RouteCategory::paginate(20);
        return view('admin.routes_category.view', compact('categories'));    }

    public function create(){
        return view('admin.routes_category.add');
    }
    public function store(Request $request){
        $request->validate([
            'state' => 'required',
            'name' => 'required|unique:route_categories',
        ]);
        $routeCat = RouteCategory::create([
           'state' => $request->input('state'),
           'name' => $request->input('name'),
        ]);
        return redirect()->route('admin.route-category.index')->with('flash_message_success','Category added successfully!');
    }

    public function edit($id){
       $categoryDetails = RouteCategory::findOrFail($id);
       return view('admin.routes_category.edit' , compact('categoryDetails'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|unique:route_categories',
        ]);
        $category = RouteCategory::findOrFail($id);
        $category->name = $request->input('state');
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('admin.route-category.index')->with('flash_message_success','Category updated successfully!');
     }

    public function delete($id){
        $category = RouteCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.route-category.index')->with('flash_message_success','Category deleted successfully!');
     }
}
