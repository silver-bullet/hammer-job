<?php

namespace App\Validators;

use App\Contracts\ValidatorInterface;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AbstractValidator implements ValidatorInterface
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var array
     */
    protected $rules;

    /**
     * @param Request $request
     * @return ValidatorInterface
     */
    public function store(Request $request): ValidatorInterface
    {
        $this->request = $request;

        $this->rules = [


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


        ];

        return $this;
    }

    /**
     * @throws ValidationException
     */
    public function validate(): void
    {
        Validator::make($this->request->all(), $this->rules)->validate();
    }

}