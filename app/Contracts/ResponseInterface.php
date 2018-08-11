<?php

namespace App\Contracts;

interface ResponseInterface {

    /**
     * @param int $status
     * @return mixed
     */
    public function setStatus(int $status);

    /**
     * @param $data
     * @return mixed
     */
    public function setData($data);

    /**
     * @return int
     */
    public function getStatus(): int;

    /**
     * @return mixed
     */
    public function get();

}