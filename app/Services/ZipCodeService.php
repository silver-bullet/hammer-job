<?php

namespace App\Services;

use App\Repositories\ZipCodeRepository;
use App\Responses\AbstractResponse;
use App\Validators\AbstractValidator;

class ZipCodeService extends AbstractService
{
    /**
     * ZipCodeService constructor.
     * @param AbstractValidator $validator
     * @param ZipCodeRepository $repository
     * @param AbstractResponse $response
     */
    public function __construct(
        AbstractValidator $validator,
        ZipCodeRepository $repository,
        AbstractResponse $response
    ){
        $this->validator = $validator;
        $this->repository = $repository;
        $this->response = $response;
    }
}