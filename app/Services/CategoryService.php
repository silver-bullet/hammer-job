<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Responses\AbstractResponse;
use App\Validators\AbstractValidator;

class CategoryService extends AbstractService
{
    /**
     * JobService constructor.
     * @param AbstractValidator $validator
     * @param CategoryRepository $repository
     * @param AbstractResponse $response
     */
    public function __construct(
        AbstractValidator $validator,
        CategoryRepository $repository,
        AbstractResponse $response
    ){
        $this->validator = $validator;
        $this->repository = $repository;
        $this->response = $response;
    }
}