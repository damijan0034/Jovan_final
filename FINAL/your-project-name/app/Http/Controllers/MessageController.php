<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function createMessage($id)
    {
        $product=Product::find($id);
        return view('admin.messages.create',compact('product'));
    }

    public function sendMessage(Request $request)
    {
        Message::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'user_id'=>$request->user_id,
            'product_id'=>$request->product_id,
            'recever_id'=>$request->recever_id
        ]);

        return redirect(route('admin.dashboard'));
    }

    public function showMessage()
    {
        $messages=Message::all();

        return view('admin.messages.show',compact('messages'));
    }

    public function singleMessage($id)
    {
        $message=Message::find($id);
        return view('admin.messages.single_message',compact('message'));
    }

    public function deleteMessage ($id)
    {
        $message=Message::find($id);

        $message->delete();

        return redirect(route('admin.dashboard'));

    }
}
