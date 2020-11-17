<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::where('status', 0)->get();
        foreach($messages as $m){
            $m->status = 1;
            // $m->save();
        }
        return view('admin.messages.view' , compact('messages'));

    }
}
