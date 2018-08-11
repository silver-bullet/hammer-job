<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * QUERY_SEARCH_ATTR
     */
    public const QUERY_SEARCH_ATTR = "name";

    /**
     * ALLOWED_ATTRIBUTES
     */
    public const ALLOWED_ATTRIBUTES = [
        "id",
        "name",
    ];

    public const ALLOWED_RELATIONSHIPS = [
    ];

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
