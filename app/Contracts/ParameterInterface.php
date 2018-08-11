<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface ParameterInterface
{
    /**
     * BuilderInterface constructor.
     * @param Builder $builder
     */
    public function __construct(Builder $builder);

    /**
     * @param $data
     * @return Builder
     */
    public function build($data): Builder;
}