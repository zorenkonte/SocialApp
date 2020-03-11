<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';

    protected $fillable = [
        'description',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(\App\user::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\comment::class);
    }
}
