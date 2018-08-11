<?php

namespace App\Respositories\Builder\Operators;

use App\Contracts\OperatorInterface;
use Illuminate\Database\Eloquent\Builder;

class AbstractOperator implements OperatorInterface
{
    /**
     * @var Builder
     */
    protected $builder;

    /**
     * AbstractOperator constructor.
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @param $key
     * @param $value
     * @return Builder
     */
    public function build($key, $value): Builder
    {
        return $this->builder->where($key, $value);
    }
}