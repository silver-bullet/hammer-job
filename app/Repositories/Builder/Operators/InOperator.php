<?php

namespace App\Respositories\Builder\Operators;

use Illuminate\Database\Eloquent\Builder;

class InOperator extends AbstractOperator
{
    /**
     * @param $key
     * @param $value
     * @return Builder
     */
    public function build($key, $value): Builder
    {
        return $this->builder->whereIn($key, explode(",", $value));
    }
}