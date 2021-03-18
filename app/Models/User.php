<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    const CATEGORY_DEVELOPER = 'Developer';

    const CATEGORY_DESIGNER = 'Designer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','filepath', 'image', 'career', 'category'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bookmarkingPosts()
    {
        return $this->BelongsToMany(Post::class, 'bookmarks');
    }

    public function getBase64ImageAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }
        return 'data:image/png;base64,' . $this->image;
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->filepath) {
            return null;
        }
        return Storage::url($this->filepath);
    }

    public function notifications()
    {
        return $this->morphOne(Notification::class,'noticeable');
    }
    
    public function isDeveloper()
    {
        return $this->category === self::CATEGORY_DEVELOPER;
    }
    
    public function isDesigner()
    {
        return $this->category === self::CATEGORY_DESIGNER;
    }

    public function groups()
    {
        return $this->hasMany(MessageGroup::class);
    }

    public function members()
    {
        return $this->hasMany(MessageMember::class);
    }
}
