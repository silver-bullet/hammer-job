<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title");
            $table->text("description");
            $table->date("delivery_date");
            $table->unsignedInteger("category_id");
            $table->foreign("category_id")->references("id")->on("categories");
            $table->unsignedInteger("zipcode_id");
            $table->foreign("zipcode_id")->references("id")->on("zipcodes");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
