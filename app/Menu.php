<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'menu', 'title', 'parent_id', 'status', 'icon','order',
    ];
}
