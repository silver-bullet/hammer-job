<?php

namespace App\Responses;

use App\Contracts\ResponseInterface;

class AbstractResponse implements ResponseInterface
{
    /**
     * @var $status
     */
    protected $status = 200;

    /**
     * @var $data
     */
    protected $data;

    /**
     * @param int $status
     */
    final public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @param array $data
     * @return $this
     */
    final public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return int
     */
    public final function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->data;
    }

}