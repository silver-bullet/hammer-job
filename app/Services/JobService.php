<?php

namespace App\Services;

use App\Responses\AbstractResponse;
use App\Validators\JobValidator;
use App\Repositories\JobRepository;

class JobService extends AbstractService
{
    /**
     * JobService constructor.
     * @param JobValidator $validator
     * @param JobRepository $repository
     * @param AbstractResponse $response
     */
    public function __construct(
        JobValidator $validator,
        JobRepository $repository,
        AbstractResponse $response
    ){
        $this->validator = $validator;
        $this->repository = $repository;
        $this->response = $response;
    }

}