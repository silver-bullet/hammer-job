<?php

namespace App\Respositories\Builder\Parameters;

use App\Contracts\ParameterInterface;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractParameter implements ParameterInterface
{
    /**
     * @var Builder
     */
    protected $builder;

    /**
     * AbstractParameter constructor.
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @param $data
     * @return Builder
     */
    public abstract function build($data): Builder;

}