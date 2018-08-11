<?php

namespace App\Services;

use App\Contracts\RepositoryInterface;
use App\Contracts\ResponseInterface;
use App\Contracts\ServiceInterface;
use App\Contracts\ValidatorInterface;
use App\Responses\AbstractResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AbstractService implements ServiceInterface {

    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * AbstractService constructor.
     * @param ValidatorInterface $validator
     * @param RepositoryInterface $repository
     * @param AbstractResponse $response
     */
    public function __construct(
        ValidatorInterface $validator,
        RepositoryInterface $repository,
        AbstractResponse $response
    ){
        $this->validator = $validator;
        $this->repository = $repository;
        $this->response = $response;
    }

    /**
     * @param Request $request
     * @return AbstractResponse
     */
    public function store(Request $request): AbstractResponse
    {
        $this->validator->store($request)->validate();

        $entity = $this->repository->store($request->all());

        return $this->show($request, $entity->id);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return AbstractResponse
     */
    public function update(Request $request, int $id): AbstractResponse
    {
        $this->repository->findById($id);

        $this->validator->update($request)->validate();

        $this->repository->update($request->all(), $id);

        return $this->show($request, $id);
    }

    /**
     * @param Request $request
     * @return AbstractResponse
     */
    public function filter(Request $request): AbstractResponse
    {
        $entities = $this->repository->filter($request->all());

        $this->response->setData($entities);

        return $this->response;
    }

    /**
     * @param Request $request
     * @return AbstractResponse
     */
    public function index(Request $request): AbstractResponse
    {
        $entities = $this->repository->index($request->all());

        $this->response->setData($entities);

        return $this->response;
    }

    /**
     * @param Request $request
     * @param int $id
     * @return AbstractResponse
     */
    public function show(Request $request, int $id): AbstractResponse
    {
        $entity = $this->repository->show($request->all(), $id);

        $this->response->setData($entity);

        return $this->response;
    }

}