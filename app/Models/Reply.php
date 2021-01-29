<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['body'];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function post()
    {
        return $this->BelongsTo(Reply::class);
    }
}