<?php

namespace App\Http\Controllers;

use \App\Conversation;
use \App\message_received;
use \App\message_sent;
use \App\alt_message_received;
use \App\alt_message_sent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ConversationController extends Controller
{
    public $client;

    public function index(){
        $conversations = Conversation::all();
        foreach($conversations as $index => $conversation){
            $messages_sent = $conversation->messages_sent;
            $messages_received = $conversation->messages_received;
            $conversations[$index]->messageCount = count($messages_sent) + count($messages_received);
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

    public function delMessage($id, $state){
        if($state == 1){
            $message = message_received::findOrFail($id);
        $message->delete();
        return redirect(route('editConversation', ['id'=>$message->conv_id]));
        }
        $message = message_sent::findOrFail($id);
        $message->delete();
        return redirect(route('editConversation', ['id'=>$message->conv_id]));
    }

    public function delete($id){
        $conversation = Conversation::findOrFail($id);
        $conversation->delete();

        return redirect(route('conversations'));
    }

    public function showAddMessage($id){
        return view('admin.addMessage', ['id'=>$id]);
    }

    public function sent_or_received(){
        $input = Input::all();
        if(empty($input['isBot']) == false){
            $newMessage = new message_received;
            $newMessage->message_received = $input['message'];
            $newMessage->conv_id = $input['id'];
            if(empty($input['isBot'])){
                $bot=false;
            } else {
                $bot=true;
            }
            $newMessage->Bot = $bot;
            $newMessage->save();
            $mess_id = message_received::orderBy('id', 'desc')->first()->id;
            return redirect(route('propositionMessage', ['id'=>$mess_id]));
        } else {
            $newMessage = new message_sent;
            $newMessage->conv_id = $input['id'];
            $newMessage->message_sent = $input['message'];
            if(empty($input['isBot'])){
                $bot=false;
            } else {
                $bot=true;
            }
            $newMessage->Bot = $bot;
            $newMessage->save();
            return redirect(route('conversations'));
        }
    }    

    public function editConversation($id){
        $conversation = Conversation::findOrFail($id);
        $messageS = $conversation->messages_sent;
        $messageR = $conversation->messages_received;
        return view('admin.editConversation', ['messageS'=>$messageS,'messageR'=>$messageR]);
    }

//////////////////////////////////////////////////////////////////////////////
////////////MODIFIER MESSAGE ENVOYÉ OK MAIS PAS MESSAGE REÇU//////////////////
//////////////////////////////////////////////////////////////////////////////

    public function editMessage($id){
        $message = message_sent::findOrFail($id);
        return view('admin.editMessage', ['message'=>$message]);
    }

    public function confirmEditMessage(){
        $input = Input::all();
        $new_message = message_sent::findOrFail($input['id']);
        $new_message->message_sent = $input['message'];
        if(empty($input['isBot'])){
            $bot=false;
        } else {
            $bot=true;
        }
        $new_message->bot = $bot;
        $new_message->save();
        return redirect(route('editConversation', ['id'=>$new_message->conv_id]));
    }

//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

    public function testConversation($id){
        $i=0;
        $conversation = Conversation::findOrFail($id);
        $messages = $conversation->messages_sent;
        
        foreach($messages as $message){

            $messagesV = $conversation->messages_received[$i]->message_received;
            $messagesV2 = $conversation->messages_received[$i];
            $messagesR = $conversation->messages_received[$i]->alt_messages_received;

            $response = $this->replyMessage($message);
            echo(nl2br('Message reçu = '.trim($response)."\n"));

            foreach($messagesR as $messageR){
                if(trim($response) == trim($messageR->Message)){
                    if(trim($response) == trim($messagesV)){
                        echo(nl2br('Test réussi (1ère tentative)'."\n"));
                        } else {
                            while(trim($response) != trim($messagesV)){
                                $response = $this->replyMessage($message);
                                if(trim($response) == trim($messagesV)){
                                    echo(nl2br('Test réussi (2ème tentative)'."\n"));
                                }
                            }
                        }
                        break;
                }
            }
        $i++;
    }
}
    

    public function replyMessage($message){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.recast.ai/build/v1/dialog");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"message\": {\"content\":\"".$message->message_sent."\",\"type\":\"text\"}, \"conversation_id\": \".$message->conv_id.\", \"language\": \"fr\"}");
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = "Authorization: Token 46c574b99e07f0d267f2bbee09f7a480";
        $headers[] = "Content-Type: application/json";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = json_decode(curl_exec($ch));
        curl_close($ch);

        $response = $result->results->messages[0]->content;
            if(gettype($response) == "object"){
                return $response->title;
            }
        return $response;    
    }

    public function propositionMessage($id){
        return view('admin.propositionMessage', ['id'=>$id]);
    }

    public function send_propMessage(){
        $input = Input::all();
        $oust = array_shift($input);
        foreach($input as $message){
            $newMessage = new alt_message_received;
            if($message == $input["isBot"] || $message == $input["id"]){
                continue;
            }
            $newMessage->Message = $message;
            $newMessage->message_id = $input['id'];
            if(empty($input['isBot'])){
                $bot=false;
            } else {
                $bot=true;
            }
            $newMessage->Bot = $bot;
            $newMessage->save();
        }
        return redirect(route('conversations'));
    }
}


