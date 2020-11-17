<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Session;

class UserController extends Controller
{
    

    public function index(){
        $users = User::orderby('created_at','desc')->get(); //whereNotIn('id' , [Auth::User()->id])->get();
        return view('admin.users.view' , compact('users'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.users.edit' , compact('user'));
    }

    public function update(Request $request , $id){
        $user = User::findOrFail($id);
        if($user->email == $request['email']){
            $email = 'required|email' ;
        }
        else{
            $email = 'required|email|unique:users' ;
        }
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => $email,
            'role' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'phone2' => 'nullable|string|max:20',
        ]);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->role = $request['role'];
        $user->phone = $request['phone'];
        $user->phone2 = $request['phone2'];
        if(!empty($request['password'])){
            $user->password = Hash::make($request['password']);
        }
        
        $user->save();
        return redirect()->route('admin.users.index')->with('flash_message_success','User details updated successfully!');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('flash_message_success','User deleted successfully!');
    }
}
