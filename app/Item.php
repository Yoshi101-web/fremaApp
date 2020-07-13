<?php

namespace App;

use App\User;
use App\Image;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // protected $fillable = ['image', 'item_id'];

    public function user()
    {
        return $this->BelongsTo('App\User');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }
}