<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        "name"
    ];

    /**
     * @var array
     */
    protected $hidden = [
        "created_at",
        "updated_at"
    ];
}
