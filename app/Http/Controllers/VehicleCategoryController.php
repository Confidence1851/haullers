<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehicleCategory;

class VehicleCategoryController extends Controller
{
    public function addCategory(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $category = new VehicleCategory();
            $category->name = $data['category_name'];
            $category->description = $data['description'];
            $category->save();
            return redirect('/admin/view-categories')->with('flash_message_success','Category Added Successfully!');
        }
        return view('admin.categories.add_category');
    }
    
    public function editCategory(Request $request, $id = null){
        if ($request->isMethod('post')) {
            $data = $request->all();
            VehicleCategory::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['description']]);
            return redirect('/admin/view-categories')->with('flash_message_success','Category Updated Successfully');
        }
        $categoryDetails = VehicleCategory::where(['id'=>$id])->first();
        return view('admin.categories.edit_category')->with(compact('categoryDetails'));
    }

    public function deleteCategory($id = null){
        if (!empty($id)) {
            VehicleCategory::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Vehicle Category Deleted Successfully');
        }
    }

    public function viewCategories(Request $request){
        $categories = VehicleCategory::get();
        return view('admin.categories.view_categories')->with(compact('categories'));
    }
}
