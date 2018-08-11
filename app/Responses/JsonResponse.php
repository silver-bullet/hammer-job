<?php

namespace App\Responses;

class JsonResponse extends AbstractResponse
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function get()
    {
        return response()->json(parent::get()->toArray(), $this->getStatus());
    }
}