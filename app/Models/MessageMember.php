<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageMember extends Model
{
    protected $fillable = ['message_group_id','user_id'];

    public function groups()
    {
        return $this->belongsTo(MessageGroup::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
