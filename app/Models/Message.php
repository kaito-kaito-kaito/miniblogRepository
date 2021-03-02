<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message_member_id','body'];

    public function member()
    {
        return $this->belongsTo(MessageMember::class, 'message_member_id');
    }
}
