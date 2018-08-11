<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Arrayable;

interface RepositoryInterface {

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model;

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function update(array $data, int $id): bool;

    /**
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function show(array $data, int $id): Model;

    /**
     * @param array $data
     * @return Arrayable
     */
    public function filter(array $data): Arrayable;

    /**
     * @param array $data
     * @return Arrayable
     */
    public function index(array $data): Arrayable;

}
