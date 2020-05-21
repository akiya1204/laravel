<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable = [
        'crt_id',
        'customer_id',
        'item_id',
        'num',
        'delete_flg',
    ];
}
