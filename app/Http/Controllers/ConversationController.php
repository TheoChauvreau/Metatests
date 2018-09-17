<?php

namespace App\Http\Controllers;

use \App\Conversation;
use \App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ConversationController extends Controller
{
    public function index(){
        $conversations = Conversation::all();
        foreach($conversations as $index => $conversation){
            $messages = $conversation->messages;
            $conversations[$index]->messageCount = count($messages);
        }
        return view('admin.conversations', ['conversations'=>$conversations]);
    }

    public function create(){
        $name = Input::get('name');
        if(empty($name)){
            return abort(404);
        }
        $newConversation = new Conversation;
        $newConversation->Nom = $name;
        $newConversation->save();
        return redirect(route('conversations'));
    }

    public function delete($id){
        $conversation = Conversation::findOrFail($id);
        $conversation->delete();
        return redirect(route('conversations'));
    }

    public function showAddMessage($id){
        return view('admin.addMessage', ['id'=>$id]);
    }

    public function addMessage(){
    $input = Input::all();
    $newMessage = new Message;
    $newMessage->Message = $input['message'];
    $newMessage->conv_id = $input['id'];
    if(empty($input['isBot'])){
        $bot=false;
    } else {
        $bot=true;
    }
    $newMessage->Bot = $bot;
    $newMessage->save();
    return redirect(route('conversations'));
}

    public function editConversation($id){
        $conversation = Conversation::findOrFail($id);
        $messages = $conversation->messages;
        return view('admin.editConversation', ['messages'=>$messages]);
    }

    public function editMessage($id){
        $message = Message::findOrFail($id);
        return view('admin.editMessage', ['message'=>$message]);
    }

    public function confirmEditMessage(){
        $input = Input::all();
        $new_message = Message::findOrFail($input['id']);
        $new_message->Message = $input['message'];
        if(empty($input['isBot'])){
            $bot=false;
        } else {
            $bot=true;
        }
        $new_message->Bot = $bot;
        $new_message->save();
        return redirect(route('editConversation', ['id'=>$new_message->conv_id]));
    }

    public function delMessage($id){
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect(route('editConversation', ['id'=>$message->conv_id]));
    }
}
