<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message_received extends Model
{
    public function alt_messages_received(){
        return $this->hasMany('App\alt_message_received','message_id','id');
    }
}
