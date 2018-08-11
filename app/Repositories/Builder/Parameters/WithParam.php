<?php

namespace App\Respositories\Builder\Parameters;

use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class WithParam extends AbstractParameter
{
    /**
     * @param $data
     * @return mixed
     */
    public function build($data): Builder
    {
        if (!isset($data["with"]) || !is_array($data["with"])) {
            return $this->builder;
        }

        foreach ($data["with"] as $relation) {
            if (in_array($relation, $this->builder->getModel()::ALLOWED_RELATIONSHIPS)) {
                $this->builder = $this->builder->with($relation);
            }
        }

        return $this->builder;
    }

}