<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Contact::orderBy('id', 'desc')->get();

        return view('admin.messages.messages', compact('messages'));
    }

    public function show($id)
    {
        try{
            $message = Contact::where('id', $id)->first();
            if($message){
                if($message->status=='0'){
                    $message->status=1;
                    $message->save();
                }
                return view('admin.messages.message_details', compact('message'));
            }else{
                session()->flash('type', 'danger');
                session()->flash('message', 'Something went wrong to sent message. please try again...!');
                return redirect()->back();
            }

        }catch (\Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message', 'Something went wrong to sent message. please try again...!');
            return redirect()->back();
        }

    }
}
