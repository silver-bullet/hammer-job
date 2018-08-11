<?php

namespace Tests\Feature\Category;

use App\Models\Job;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobFilterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test_Success_NoParam
     */
    public function test_Success_NoParam()
    {
        $resources = factory(Job::class, 25)->create();

        $response = $this->post("/api/job/filter");

        $response->assertStatus(200);
        $response->assertJson([
            "total" => 25,
            "current_page" => 1,
            "from" => 1,
            "to" => 10,
            "per_page" => 10,
            "last_page" => 3,
            "data" => $resources->slice(0, 10)->toArray()
        ]);
    }

    /**
     * test_Success_NoPagination
     */
    public function test_Success_NoPagination()
    {
        $resources = factory(Job::class, 25)->create();

        $response = $this->post("/api/job/filter", [
            "paginate" => false
        ]);

        $response->assertStatus(200);
        $response->assertJson($resources->toArray());
    }

    /**
     * test_Success_PerPage
     */
    public function test_Success_PerPage()
    {
        $resources = factory(Job::class, 25)->create();

        $response = $this->post("/api/job/filter", [
            'per_page' => 5
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            "total" => 25,
            "current_page" => 1,
            "from" => 1,
            "to" => 5,
            "per_page" => 5,
            "last_page" => 5,
            "data" => $resources->slice(0, 5)->toArray()
        ]);
    }

    /**
     * test_Success_CurrentPage
     */
    public function test_Success_CurrentPage()
    {
        $resources = factory(Job::class, 25)->create();

        $response = $this->post("/api/job/filter", [
            'page' => 2
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            "total" => 25,
            "current_page" => 2,
            "from" => 11,
            "to" => 20,
            "per_page" => 10,
            "last_page" => 3,
            "data" => array_values($resources->slice(10, 10)->toArray())
        ]);
    }

    /**
     * test_Success_Query
     */
    public function test_Success_Query()
    {
        $resources = factory(Job::class, 25)->create();

        $response = $this->post("/api/job/filter", [
            'query' => "ra"
        ]);

        $resourcesMatchedQuery = $resources->filter(function($item){
            return strpos($item->title, "ra") !== false;
        });

        $response->assertStatus(200);
        $response->assertJson([
            "total" => $resourcesMatchedQuery->count(),
            "data" => array_values($resourcesMatchedQuery->slice(0, 10)->toArray())
        ]);
    }

    /**
     * test_Success_Conditions
     */
    public function test_Success_Conditions()
    {
        $resources = factory(Job::class, 25)->create();
        $resourcesIDs = $resources->pluck("id")->slice(2, 3)->toArray();

        $response = $this->post("/api/job/filter", [
            'conditions' => [ "id:in" => implode(",", $resourcesIDs) ]
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            "total" => 3,
            "data" => array_values($resources->slice(2, 3)->toArray())
        ]);
    }

}

