<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Image;
use App\Vehicle;
use App\VehicleCategory;
use App\Company;
use App\RouteCategory;

class VehicleController extends Controller
{
    public function addVehicle(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['company_id'])) {
                return redirect()->back()->with('flash_message_error','Company Name is missing!');
            }
            if (empty($data['vehicle_cat_id'])) {
                return redirect()->back()->with('flash_message_error','Vehicle Category is missing!');
            }
            if (empty($data['route_cat_id'])) {
                return redirect()->back()->with('flash_message_error','Route Category is missing!');
            }
            $vehicle = new Vehicle();
            $vehicle->user_id = Auth::User()->id;
            $vehicle->company_id = $data['company_id'];
            $vehicle->vehicle_cat_id = $data['vehicle_cat_id'];
            $vehicle->route_cat_id = $data['route_cat_id'];
            $vehicle->vehicle_name = $data['vehicle_name'];
            $vehicle->vehicle_model = $data['vehicle_model'];
            $vehicle->vehicle_status = $data['vehicle_status'];
            $vehicle->vehicle_description = $data['description'];
            $vehicle->price = $data['vehicle_price'];
            $vehicle->quantity_available = $data['quantity'];
            $vehicle->plate_no = $data['plate_number'];
            $vehicle->capacity = $data['capacity'];
            $vehicle->unit = $data['unit'];

            // Upload Image
            if ($request->hasFile('image')) {
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(11111111,99999999999).'.'.$extension;
                    $medium_image_path = 'public/images/backend_images/products/medium/'.$filename;
                    // Resize Images
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);

                    //Store image name in products table
                    $vehicle->image =$filename;
                }
            }

            // Upload Image1
            if ($request->hasFile('image1')) {
                $image_tmp = Input::file('image1');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(11111111,99999999999).'.'.$extension;
                    $medium_image_path = 'public/images/backend_images/products/medium/'.$filename;
                    // Resize Images
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    //Store image name in products table
                    $vehicle->image1 =$filename;
                }
            }

            // Upload Image
            if ($request->hasFile('image2')) {
                $image_tmp = Input::file('image2');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(11111111,99999999999).'.'.$extension;
                    $medium_image_path = 'public/images/backend_images/products/medium/'.$filename;
                    // Resize Images
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    //Store image name in products table
                    $vehicle->image2 =$filename;
                }
            }

            // Upload Image
            if ($request->hasFile('image3')) {
                $image_tmp = Input::file('image3');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(11111111,99999999999).'.'.$extension;
                    $medium_image_path = 'public/images/backend_images/products/medium/'.$filename;
                    // Resize Images
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    //Store image name in products table
                    $vehicle->image3 =$filename;
                }
            }

            
            $vehicle->save();
        
            return redirect('/admin/view-vehicles')->with('flash_message_success','Vehicle added successfully!');
        }

        // Companies drop down start
        $vehicles = Company::get();
        $companies_dropdown = "<option  disabled selected>Select</option>";
        foreach($vehicles as $vehicle){
            $companies_dropdown .= "<option value='".$vehicle->id."'>".$vehicle->name."</option>";
        }
        // Companies drop down ends

        // Vehicle Category drop down start
        $vehicles = VehicleCategory::get();
        $vehiclecategory_dropdown = "<option  disabled selected>Select</option>";
        foreach($vehicles as $vehicle){
            $vehiclecategory_dropdown .= "<option value='".$vehicle->id."'>".$vehicle->name."</option>";
        }
        // Vehicle Category drop down ends

        // Route Category drop down start
        $vehicles = RouteCategory::get();
        $routecategory_dropdown = "<option  disabled selected>Select</option>";
        foreach($vehicles as $vehicle){
            $routecategory_dropdown .= "<option value='".$vehicle->id."'>".$vehicle->name."</option>";
        }
        // Route Category drop down ends


        return view('admin.vehicles.add_vehicle')->with(compact('companies_dropdown','vehiclecategory_dropdown','routecategory_dropdown'));
    }

    public function editVehicle(Request $request, $id){
        // dd($request->all());
        $vehicle = Vehicle::findorfail($id);
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            // Upload Image
            if ($request->hasFile('image')) {
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(11111111,99999999999).'.'.$extension;
                    $medium_image_path = 'public/images/backend_images/products/medium/';
                    // Resize Images
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path.$filename);
                    try{
                        unlink($medium_image_path.$vehicle->image);
                    }
                    catch(Exception $e){}
                }
            }else {
                $filename = $data['current_image'];
            }

             // Upload Image1
             if ($request->hasFile('image1')) {
                $image_tmp = Input::file('image1');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename1 = rand(11111111,99999999999).'.'.$extension;
                    $medium_image_path = 'public/images/backend_images/products/medium/';
                    // Resize Images
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path.$filename1);
                    try{
                        unlink($medium_image_path.$vehicle->image1);
                    }
                    catch(Exception $e){}
                }
            }else {
                $filename1 = $data['current_image1'];
            }

             // Upload Image2
             if ($request->hasFile('image2')) {
                $image_tmp = Input::file('image2');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename2 = rand(11111111,99999999999).'.'.$extension;
                    $medium_image_path = 'public/images/backend_images/products/medium/';
                    // Resize Images
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path.$filename2);
                    try{
                        unlink($medium_image_path.$vehicle->image2);
                    }
                    catch(Exception $e){}
                }
            }else {
                $filename2 = $data['current_image2'];
            }

             // Upload Image3
             if ($request->hasFile('image3')) {
                $image_tmp = Input::file('image3');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename3 = rand(11111111,99999999999).'.'.$extension;
                    $medium_image_path = 'public/images/backend_images/products/medium/';
                    // Resize Images
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path.$filename3);
                    try{
                        unlink($medium_image_path.$vehicle->image3);
                    }
                    catch(Exception $e){}
                }
            }else {
                $filename3 = $data['current_image3'];
            }


            if (empty($data['description'])) {
                $data['description'] = '';
            }

// dd($data);
            $vehicle->update(['company_id'=>$data['company_id'],'vehicle_cat_id'=>$data['vehicle_cat_id'],
            'route_cat_id'=>$data['route_cat_id'],
            'vehicle_name'=>$data['vehicle_name'],'vehicle_model'=>$data['vehicle_model'],'vehicle_status'=>$data['vehicle_status'],
            'vehicle_description'=>$data['description'],'price'=>$data['vehicle_price'],'quantity_available'=>$data['quantity'],
            'plate_no'=>$data['plate_number'],'capacity'=>$data['capacity'], 'unit'=>$data['unit'],'image'=>$filename,'image1'=>$filename1,
            'image2'=>$filename2,'image3'=>$filename3]);

            return redirect('/admin/view-vehicles')->with('flash_message_success','Vehicle updated successfully!');
        }
        // Get Vehicle Details
        $vehicleDetails = Vehicle::where(['id'=>$id])->first();

        // Companies drop down start
        $companies = Company::get();
        $companies_dropdown = "<option disabled selected>Select</option>";
        foreach($companies as $company){
            if ($company->id==$vehicleDetails->company_id) {
                $selected = "Selected";
            }else {
                $selected = "";
            }
            $companies_dropdown .= "<option value='".$company->id."' ".$selected.">".$company->name."</option>";
        }    
        // Companies drop down ends

        // Vehicle Category drop down start
        $vehiclecategories = VehicleCategory::get();
        $vehiclecategory_dropdown = "<option  disabled selected>Select</option>";
        foreach ($vehiclecategories as $vehiclecategory) {
            if ($vehiclecategory->id==$vehicleDetails->vehicle_cat_id) {
                $selected = "Selected";
            }else {
                $selected = "";
            }
            $vehiclecategory_dropdown .= "<option value='".$vehiclecategory->id."' ".$selected.">".$vehiclecategory->name."</option>";
        }
        // Vehicle Category drop down ends

        // Route Category drop down start
        $routecategories = RouteCategory::get();
        $routecategory_dropdown = "<option  disabled selected>Select</option>";
        foreach($routecategories as $routecategory){
            if ($routecategory->id==$vehicleDetails->route_cat_id) {
                $selected = "Selected";
            }else {
                $selected = "";
            }
            $routecategory_dropdown .= "<option value='".$routecategory->id."' ".$selected.">".$routecategory->name."</option>";
        }
        // Route Category drop down ends

        

        return view('admin.vehicles.edit_vehicle')->with(compact('vehicleDetails','companies_dropdown','vehiclecategory_dropdown','routecategory_dropdown'));
    }

    public function deleteVehicleImage($id = null){
        if (!empty($id)) {
            Vehicle::where(['id'=>$id])->update(['image'=>'']);
            return redirect()->back()->with('flash_message_success','Product Image has been Deleted Successfully!');
        }
    }

    public function deleteVehicle($id = null){
        if (!empty($id)) {
            Vehicle::where(['id'=>$id])->delete();
            return redirect('/admin/view-vehicles')->with('flash_message_success','Vehicle deleted successfully');
        }
    }

    public function viewVehicles(Request $request){
        $vehicles = Vehicle::get();
        foreach ($vehicles as $key => $value) {
            $company_name = Company::where(['id'=>$value->company_id])->first();
            $vehicles[$key]->company_name = $company_name->name;
        }

        foreach ($vehicles as $key => $value) {
            $vehiclecategory_name = VehicleCategory::where(['id'=>$value->vehicle_cat_id])->first();
            $vehicles[$key]->vehiclecategory_name = $vehiclecategory_name->name;
        }

        foreach ($vehicles as $key => $value) {
            $routecategory_name = RouteCategory::where(['id'=>$value->route_cat_id])->first();
            $vehicles[$key]->routecategory_name = $routecategory_name->name;
        }

        return view('admin.vehicles.view_vehicles')->with(compact('vehicles'));
    }
}
