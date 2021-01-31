<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function noticeable()
    {
        return $this->morphTo();
    }

    
    protected $fillable = ['user_id','noticeable','message'];

}
