<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message_member_id','body'];

    public function members()
    {
        return $this->belongsTo(MessageMember::class);
    }
}
