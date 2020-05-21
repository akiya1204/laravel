<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $fillable = [
        'item_id',
        'item_name',
        'detail',
        'price',
        'image',
        'ctg_id',
    ];

    public function cart()
    {
        return $this->belongsTo('App\cart');
    }
}
