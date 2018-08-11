<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * QUERY_SEARCH_ATTR
     */
    public const QUERY_SEARCH_ATTR = "title";

    /**
     * ALLOWED_ATTRIBUTES
     */
    public const ALLOWED_ATTRIBUTES = [
        "id",
        "title",
        "description",
        "delivery_date",
        "created_at",
    ];

    /**
     * ALLOWED_RELATIONSHIPS
     */
    public const ALLOWED_RELATIONSHIPS = [
        "category",
        "zipCode",
        "zipCode.city"
    ];

    /**
     * @var array
     */
    protected $fillable = [
        "title",
        "description",
        "delivery_date",
        "category_id",
        "zipcode_id"
    ];

    /**
     * @var array
     */
    protected $hidden = [
        "category_id",
        "zipcode_id"
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function zipCode()
    {
        return $this->belongsTo(ZipCode::class, "zipcode_id");
    }
}
