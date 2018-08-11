<?php

namespace App\Contracts;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

interface ValidatorInterface {

    /**
     * @param Request $request
     * @return ValidatorInterface
     */
    public function store(Request $request): ValidatorInterface;

    /**
     * @param Request $request
     * @return ValidatorInterface
     */
    public function update(Request $request): ValidatorInterface;

    /**
     * @throws ValidationException
     */
    public function validate(): void;

}