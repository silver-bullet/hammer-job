<?php

namespace App\Repositories;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;

class JobRepository extends AbstractRepository
{
    /**
     * JobRepository constructor.
     * @param Job $model
     */
    public function __construct(Job $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $data
     * @return Arrayable
     */
    public function filter(array $data): Arrayable
    {
        $data["conditions"]["created_at:gt"] = Carbon::now()->subMonth();
        return parent::filter($data);
    }

    /**
     * @param array $data
     * @return Arrayable
     */
    public function index(array $data): Arrayable
    {
        $this->builder->where("created_at", ">", Carbon::now()->subMonth());
        return parent::index($data);
    }
}