<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Contact;

class ContactFormController extends Controller
{
    public function create(){
        return view('contact');
    }

    public function index(){
        $contacts = Contact::orderby('id' , 'desc')->get();
        return view('admin.contactmails.view' , compact('contacts'));
    }

    public function store(){
        //dd(request()->all());
        $data = request()->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            
        ]);

        $storeCotactInfo = Contact::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],

        ]);
        $email = 'info@haullersonline.com';

        // Send An Email
        Mail::to($email)->send(new ContactFormMail($data));
        return redirect()->back()->with('flash_message_success','Message Sent!');
        
    }

    public function delete($id){
        $contacts = Contact::findOrFail($id);
        $contacts->delete();
        return redirect()->back()->with('flash_message_success','Contact Mail deleted successfully!');
     }
}
