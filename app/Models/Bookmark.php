<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = ['user_id','post_id'];

    public function notifications()
    {
        return $this->morphOne(Notification::class,'noticeable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Reply::class);
    }

    public $timestamps = false;
    
}
