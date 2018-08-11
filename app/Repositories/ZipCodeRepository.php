<?php

namespace App\Repositories;

use App\Models\ZipCode;

class ZipCodeRepository extends AbstractRepository
{
    /**
     * ZipCodeRepository constructor.
     * @param ZipCode $model
     */
    public function __construct(ZipCode $model)
    {
        parent::__construct($model);
    }
}