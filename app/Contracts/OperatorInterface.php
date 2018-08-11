<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface OperatorInterface
{
    /**
     * BuilderInterface constructor.
     * @param Builder $builder
     */
    public function __construct(Builder $builder);

    /**
     * @param $key
     * @param $value
     * @return Builder
     */
    public function build($key, $value): Builder;
}