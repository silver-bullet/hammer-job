<?php

namespace Tests\Feature\Category;

use App\Models\Category;
use App\Models\Job;
use App\Models\ZipCode;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobStoreTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test_Success_ValidData
     */
    public function test_Success_ValidData()
    {
        $data = $this->getValidJobAsArray();

        $this->assertDatabaseMissing("jobs", $data);

        $response = $this->post("/api/job", $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas("jobs", $data);
    }

    /**
     * test_Failure_MissingData
     */
    public function test_Failure_MissingData()
    {
        $response = $this->post("/api/job", []);

        $response->assertStatus(400);
        $response->assertJson([
            "error" => "ValidationError",
            "messages" => [
                "title" => ["The title field is required."],
                "description" => ["The description field is required."],
                "delivery_date" => ["The delivery date field is required."],
                "category_id" => ["The category id field is required."],
                "zipcode_id" => ["The zipcode id field is required."],
            ]
        ]);
    }

    /**
     * test_Failure_5CharAtLeastTitle
     */
    public function test_Failure_5CharAtLeastTitle()
    {
        $data = $this->getValidJobAsArray();
        $data["title"] = "r";

        $response = $this->post("/api/job", $data);

        $response->assertStatus(400);
        $response->assertJson([
            "error" => "ValidationError",
            "messages" => [
                "title" => ["The title must be at least 5 characters."],
            ]
        ]);
        $this->assertDatabaseMissing("jobs", $data);
    }

    /**
     * @return array
     */
    private function getValidJobAsArray(): array
    {
        $job = factory(Job::class)->make();

        $category = factory(Category::class)->create();
        $zipCode = factory(ZipCode::class)->create();

        $data = $job->toArray();
        $data["category_id"] = $category->id;
        $data["zipcode_id"] = $zipCode->id;

        return $data;
    }
}
