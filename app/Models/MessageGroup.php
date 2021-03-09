<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageGroup extends Model
{
    protected $fillable = ['post_id','user_id','last_body','last_posted_at'];
    protected $casts = ['last_posted_at' => 'date:Y-m-d',];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
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

    public function notifications()
    {
        return $this->morphOne(Notification::class,'noticeable');
    }
}
