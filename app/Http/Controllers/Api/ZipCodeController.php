<?php

namespace App\Http\Controllers\Api;

use App\Responses\JsonResponse;
use App\Services\ZipCodeService;

class ZipCodeController extends AbstractController
{
    /**
     * ZipCodeController constructor.
     * @param ZipCodeService $jobService
     * @param JsonResponse $response
     */
    public function __construct(
        ZipCodeService $jobService,
        JsonResponse $response
    ){
        $this->service = $jobService;
        $this->response = $response;
    }
}
