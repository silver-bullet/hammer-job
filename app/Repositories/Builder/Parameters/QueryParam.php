<?php

namespace App\Respositories\Builder\Parameters;

use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Builder;

class QueryParam extends AbstractParameter
{
    /**
     * @param $data
     * @return Builder
     */
    public function build($data): Builder
    {
        if (!isset($data["query"])) {
            return $this->builder;
        }

        $this->builder = $this->builder->where(
            $this->builder->getModel()::QUERY_SEARCH_ATTR,
            "like",
            "%".$data["query"]."%"
        );

        return $this->builder;
    }
}