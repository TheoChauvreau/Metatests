<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message_received extends Model
{
    public function alt_messages_received(){
        return $this->hasMany('App\alt_message_received','message_id','id');
    }

    public static function boot(){
        parent::boot();

        static::deleting(function($conversation){
           $alt_messageR = $conversation->alt_messages_received;

        foreach($alt_messageR as $message){
            $message->delete();
        }
        });
    }

}
