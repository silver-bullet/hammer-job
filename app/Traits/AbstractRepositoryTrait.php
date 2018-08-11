<?php

namespace App\Traits;

use App\Repositories\AbstractRepository;
use App\Respositories\Builder\Parameters\WithParam;
use App\Respositories\Builder\Parameters\ConditionsParam;
use App\Respositories\Builder\Parameters\QueryParam;

trait AbstractRepositoryTrait
{
    /**
     * @return AbstractRepository
     */
    protected function with(): AbstractRepository
    {
        $this->builder = (new WithParam($this->builder))->build($this->data);

        return $this;
    }

    /**
     * @return AbstractRepository
     */
    protected function conditions(): AbstractRepository
    {
        $this->builder = (new ConditionsParam($this->builder))->build($this->data);

        return $this;
    }

    /**
     * @return AbstractRepository
     */
    protected function query(): AbstractRepository
    {
        $this->builder = (new QueryParam($this->builder))->build($this->data);

        return $this;
    }

    /**
     * @return AbstractRepository
     */
    protected function paginate(): AbstractRepository
    {
        if (isset($this->data["paginate"])
            && (
                $this->data["paginate"] === "false"
                || $this->data["paginate"] === false
                || $this->data["paginate"] === 0
                || $this->data["paginate"] === "0"
            )
        ) {
            $this->paginate = 0;
        }

        if (isset($this->data["per_page"])
            && filter_var($this->data["per_page"], FILTER_VALIDATE_INT) !== false
        ) {
            $this->perPage = $this->data["per_page"];
        }

        return $this;
    }

}