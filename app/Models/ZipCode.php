<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    /**
     * QUERY_SEARCH_ATTR
     */
    public const QUERY_SEARCH_ATTR = "code";

    /**
     * ALLOWED_ATTRIBUTES
     */
    public const ALLOWED_ATTRIBUTES = [
        "id",
        "code",
        "city_id",
    ];

    /**
     * ALLOWED_RELATIONSHIPS
     */
    public const ALLOWED_RELATIONSHIPS = [
        "city",
        "jobs"
    ];

    /**
     * @var string
     */
    protected $table = "zipcodes";

    /**
     * @var array
     */
    protected $fillable = [
        "code",
        "city_id"
    ];

    /**
     * @var array
     */
    protected $hidden = [
        "city_id",
        "created_at",
        "updated_at"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city() {
        return $this->belongsTo(City::class, "city_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs() {
        return $this->hasMany(Job::class, "zipcode_id");
    }
}
