<?php

namespace App;

use App\Item;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['image', 'item_id'];

    public function item()
    {
        return $this->BelongsTo('App\Item');
    }
}
