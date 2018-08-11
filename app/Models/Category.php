<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
        "code",
        "name",
    ];

    /**
     * ALLOWED_RELATIONSHIPS
     */
    public const ALLOWED_RELATIONSHIPS = [
        "jobs",
    ];

    /**
     * @var array
     */
    protected $fillable = [
        "code",
        "name"
    ];

    /**
     * @var array
     */
    protected $hidden = [
        "created_at",
        "updated_at"
    ];

    public function jobs()
    {
        return $this->hasMany(Job::Class, "category_id");
    }
}
