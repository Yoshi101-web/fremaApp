<?php

namespace App;

use App\User;
use App\Image;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function user()
    {
        return $this->BelongsTo('App\User','user_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
