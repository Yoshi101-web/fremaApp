<?php

namespace App;

use App\Item;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function items()
    {
        return $this->BelongsTo('App\Item', 'item_id', 'id');
    }
}
