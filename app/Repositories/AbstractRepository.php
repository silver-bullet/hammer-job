<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Exceptions\NotFoundException;
use App\Traits\AbstractRepositoryTrait;

class AbstractRepository implements RepositoryInterface
{
    use AbstractRepositoryTrait;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var
     */
    protected $data;

    /**
     * @var int
     */
    protected $paginate = 1;

    /**
     * @var int
     */
    protected $perPage = 10;


    /**
     * AbstractRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->builder = $this->model->query();
    }

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        return $this->builder->create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return bool
     * @throws NotFoundException
     * @throw QueryException
     */
    public function update(array $data, int $id): bool
    {
        $entity = $this->findById($id);

        return $entity->update($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return Model
     * @throws NotFoundException
     */
    public function show(array $data, int $id): Model
    {
        $this->data = $data;

        $this->with();

        return $this->findById($id);
    }

    /**
     * @param array $data
     * @return Arrayable
     */
    public function filter(array $data): Arrayable
    {
        $this->data = $data;

        $this->query()->conditions()->with()->paginate();

        return $this->paginate == 1
            ? $this->builder->paginate($this->perPage)
            : $this->builder->get();
    }

    /**
     * @param array $data
     * @return Arrayable
     */
    public function index(array $data): Arrayable
    {
        $this->data = $data;

        $this->with()->paginate();

        return $this->paginate == 1
            ? $this->builder->paginate($this->perPage)
            : $this->builder->get();
    }

    /**
     * @param int $id
     * @return Model
     * @throws NotFoundException
     */
    private function findById(int $id): Model
    {
        $entity = $this->builder->find($id);

        if (!$entity) {
            throw new NotFoundException();
        }

        return $entity;
    }

}