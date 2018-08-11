<?php

namespace App\Http\Controllers\Api;

use App\Responses\JsonResponse;
use App\Services\AbstractService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbstractController extends Controller
{
    /**
     * @var $service
     */
    protected $service;

    /**
     * @var $response
     *
     */
    protected $response;

    /**
     * AbstractController constructor.
     * @param AbstractService $service
     * @param JsonResponse $response
     */
    public function __construct(
        AbstractService $service,
        JsonResponse $response
    ){
        $this->service = $service;
        $this->response = $response;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $response = $this->service->store($request);

        return $this->response->setData($response->get())->get();
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $response = $this->service->update($request, $id);

        return $this->response->setData($response->get())->get();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function filter(Request $request)
    {
        $response = $this->service->filter($request);

        return $this->response->setData($response->get())->get();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $response = $this->service->index($request);

        return $this->response->setData($response->get())->get();
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, int $id)
    {
        $response = $this->service->show($request, $id);

        return $this->response->setData($response->get())->get();
    }

}
