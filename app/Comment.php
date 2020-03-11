<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';

    protected $fillable = [
        'description',
        'user_id',
        'post_id'
    ];

    public function user() {
        return $this->belongsTo(\App\user::class);
    }

    public function post()
    {
        return $this->belongsTo(\App\post::class);
    }
}
