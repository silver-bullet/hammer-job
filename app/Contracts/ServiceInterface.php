<?php

namespace App\Contracts;

use App\Responses\AbstractResponse;
use Illuminate\Http\Request;

interface ServiceInterface {

    /**
     * @param Request $request
     * @return AbstractResponse
     */
    public function store(Request $request): AbstractResponse;

    /**
     * @param Request $request
     * @param int $id
     * @return AbstractResponse
     */
    public function update(Request $request, int $id): AbstractResponse;

    /**
     * @param Request $request
     * @return AbstractResponse
     */
    public function index(Request $request): AbstractResponse;

    /**
     * @param Request $request
     * @param int $id
     * @return AbstractResponse
     */
    public function show(Request $request, int $id): AbstractResponse;

}