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
        'prefecture_id', 'shipping_days','files[]'
    ];

    public function user()
    {
        return $this->BelongsTo('App\User');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function getPrefNameAttribute() { // {{ $item->PrefName }}で取得
        //pref.phpの1~47の数字をprefecture_idのカラムに保存してあるIDをもとに文字列を取得して表示
        return config('pref.'.$this->prefecture_id);
    }

    public function getCategoryNameAttribute() {
        return config('category.'.$this->category_id);
    }

    public function getCategoryChildrenNameAttribute() {
        return config('categoryChildren.'.$this->category_children_id);
    }

    public function getCategoryGrandChildrenNameAttribute() {
        return config('categoryGrandChildren.'.$this->category_grand_children_id);
    }
}