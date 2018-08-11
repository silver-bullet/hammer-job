<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryAPI extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testListCategory()
    {
        $response = $this->get('/api/category');

        $response->assertStatus(200);
    }
}
