<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageGroup extends Model
{
    protected $fillable = ['post_id','user_id','last_body','last_posted_at'];

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function members()
    {
        return $this->hasMany(MessageMember::class);
    }

    public function messages()
    {
        return $this->hasManyThrough(Message::class, MessageMember::class);
    }
}
