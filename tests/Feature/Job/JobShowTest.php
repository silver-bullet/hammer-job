<?php

namespace Tests\Feature\Category;

use App\Repositories\JobRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Job;

class JobShowTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test_Success_NoParam
     */
    public function test_Success_NoParam()
    {
        $resource = factory(Job::class)->create();

        $response = $this->get('/api/job/'.$resource->id);

        $response->assertStatus(200);
        $response->assertJson($resource->toArray());
    }

    /**
     * test_Success_WithParam
     */
    public function test_Success_WithParam()
    {
        $resource = factory(Job::class)->create();

        $response = $this->get(
            '/api/job/'
            .$resource->id.
            "?with[]=category".
            "&with[]=zipCode".
            "&with[]=zipCode.city"
        );

        $response->assertStatus(200);
        $response->assertJson([ "category" => $resource->category->toArray() ]);
        $response->assertJson([ "zip_code" => $resource->zipCode->toArray() ]);
        $response->assertJson([ "zip_code" => [ "city" => $resource->zipCode->city->toArray() ] ]);
    }

    /**
     * test_Failure_NotFoundID
     */
    public function test_Failure_NotFoundID()
    {
        $randomID = rand();
        $response = $this->get("/api/job/".$randomID);

        $response->assertStatus(404);
        $response->assertJson([
            "error" => "NotFoundError",
            "message" => "Item not found!"
        ]);
    }

}
