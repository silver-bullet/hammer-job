<?php

namespace Tests\Feature\Category;

use App\Models\Category;
use App\Models\Job;
use App\Models\ZipCode;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobUpdateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test_Failure_NotFoundJob
     */
    public function test_Failure_NotFoundJob()
    {
        $randomID = rand();
        $response = $this->put("/api/job/".$randomID, []);

        $response->assertStatus(404);
        $response->assertJson([
            "error" => "NotFoundError",
            "message" => "Item not found!"
        ]);
    }

    /**
     * test_Success_ValidData
     */
    public function test_Success_ValidData()
    {
        $resource = factory(Job::class)->create();
        $data = $resource->toArray();
        $data["category_id"] = $resource->category->id;
        $data["zipcode_id"] = $resource->zipCode->id;

        $this->assertDatabaseHas("jobs", $data);

        $data["title"] = "Updated Title";

        $response = $this->put("/api/job/".$resource->id, $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas("jobs", $data);
    }

}
