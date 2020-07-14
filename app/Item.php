<?php

namespace App;

use App\User;
use App\Image;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['item_name', 'description','user_id',
        'category_id','category_children_id','category_grand_children_id',
        'brand_name', 'price', 'size', 'condition','shipping_fee_payer',
        'prefecture_id', 'shipping_days'
    ];

    public function user()
    {
        return $this->BelongsTo('App\User');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }
}