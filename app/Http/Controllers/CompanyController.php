<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use App\Company;

class CompanyController extends Controller
{
    public function addCompany(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $company = new Company();
            $company->name = $data['company_name'];

            // Upload Image
            if ($request->hasFile('company_logo')) {
                $image_tmp = Input::file('company_logo');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'public/images/backend_images/products/large/'.$filename;
                    $medium_image_path = 'public/images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'public/images/backend_images/products/small/'.$filename;
                    // Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                    //Store image name in products table
                    $company->logo =$filename;
                }
            }

            $company->cac = $data['company_cac'];

            if (!empty($data['company_location'])) {
                $company->business_location = $data['company_location'];
            }else {
                $company->business_location = '';
            }

            $company->phone = $data['company_phone'];
            $company->phone2 = $data['company_phone2'];
            $company->email = $data['company_email'];

            $company->save();
            return redirect('/admin/view-companies')->with('flash_message_success','Company has been added Successfully!');
        }
        return view('admin.companies.add_company');
    }

    public function editCompany(Request $request, $id=null){
        if ($request->isMethod('post')) {
            $data = $request->all();

            // Upload Image
            if ($request->hasFile('company_logo')) {
                $image_tmp = Input::file('company_logo');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'public/images/backend_images/products/large/'.$filename;
                    $medium_image_path = 'public/images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'public/images/backend_images/products/small/'.$filename;
                    // Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                }
            }else {
                $filename = $data['current_image'];
            }

            if (empty($data['company_location'])) {
                $data['company_location'] = '';
            }


            Company::where(['id'=>$id])->update(['name'=>$data['company_name'],'logo'=>$filename,
            'cac'=>$data['company_cac'],'business_location'=>$data['company_location'],'phone'=>$data['company_phone'],
            'phone2'=>$data['company_phone2'],'email'=>$data['company_email']]);

            return redirect('/admin/view-companies')->with('flash_message_success','Company has been Updated Successfully!');
        }

        $companyDetails = Company::where(['id'=>$id])->first();
        return view('admin.companies.edit_company')->with(compact('companyDetails'));
    }

    public function deleteCompanyLogo($id = null){
        if (!empty($id)) {
            Company::where(['id'=>$id])->update(['logo'=>'']);
            return redirect()->back()->with('flash_message_success','Company Logo has been Deleted Successfully!');
        }
    }

    public function deleteCompany($id = null){
        if (!empty($id)) {
            Company::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Company Deleted Successfully');
        }
    }

    public function viewCompanies(Request $request){
        $companies = Company::get();
        return view('admin.companies.view_companies')->with(compact('companies'));
    }
}
