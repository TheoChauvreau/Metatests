<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function messages_sent(){
        return $this->hasMany('App\message_sent', 'conv_id', 'id');
    }

    public function messages_received(){
        return $this->hasMany('App\message_received', 'conv_id', 'id');
    }

    public static function boot(){
        parent::boot();

        static::deleting(function($conversation){
           $messageS =  $conversation->messages_sent;
           $messageR =  $conversation->messages_received;


        foreach($messageS as $message){
            $message->delete();
        }

        foreach($messageR as $message){
            $message->delete();
        }
        });
    }

}
