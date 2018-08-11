<?php

namespace App\Http\Controllers\Api;

use App\Responses\JsonResponse;
use App\Services\JobService;

class JobController extends AbstractController
{
    /**
     * JobController constructor.
     * @param JobService $jobService
     * @param JsonResponse $response
     */
    public function __construct(
        JobService $jobService,
        JsonResponse $response
    ){
        $this->service = $jobService;
        $this->response = $response;
    }
}
