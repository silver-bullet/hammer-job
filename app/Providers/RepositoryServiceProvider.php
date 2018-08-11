<?php

namespace App\Providers;

use App\Validators\JobValidator;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
//        JobService::class => DigitalOceanServerProvider::class,
    ];
}
