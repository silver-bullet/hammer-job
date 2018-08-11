<?php

namespace App\Http\Controllers\Api;

use App\Responses\JsonResponse;
use App\Services\CategoryService;

class CategoryController extends AbstractController
{
    /**
     * CategoryController constructor.
     * @param CategoryService $categoryService
     * @param JsonResponse $response
     */
    public function __construct(
        CategoryService $categoryService,
        JsonResponse $response
    ){
        $this->service = $categoryService;
        $this->response = $response;
    }


}
