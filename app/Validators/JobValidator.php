<?php

namespace App\Validators;

use App\Contracts\ValidatorInterface;
use Illuminate\Http\Request;

class JobValidator extends AbstractValidator implements ValidatorInterface
{
    /**
     * @param Request $request
     * @return ValidatorInterface
     */
    public function store(Request $request): ValidatorInterface
    {
        $this->request = $request;

        $this->rules = [
            "title" => "required|string|min:5|max:50",
            "description" => "required|string",
            "delivery_date" => "required|date_format:Y-m-d",
            "category_id" => "required|exists:categories,id",
            "zipcode_id" => "required|exists:zipcodes,id"
        ];

        return $this;
    }

    /**
     * @param Request $request
     * @return ValidatorInterface
     */
    public function update(Request $request): ValidatorInterface
    {
        $this->request = $request;

        $this->rules = [
            "title" => "required|string|min:5|max:50",
            "description" => "required|string",
            "delivery_date" => "required|date_format:Y-m-d",
            "category_id" => "required|exists:categories,id",
            "zipcode_id" => "required|exists:zipcodes,id"
        ];

        return $this;
    }

}