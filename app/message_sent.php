<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message_sent extends Model
{
    public function alt_messages_sent(){
        return $this->hasMany('App\alt_messages_sent','message_id','id');
    }
}