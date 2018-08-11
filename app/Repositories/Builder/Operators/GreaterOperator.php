<?php

namespace App\Respositories\Builder\Operators;

use Illuminate\Database\Eloquent\Builder;

class GreaterOperator extends AbstractOperator
{
    /**
     * @param $key
     * @param $value
     * @return Builder
     */
    public function build($key, $value): Builder
    {
        return $this->builder->where($key, ">", $value);
    }
}