<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$jobController = "\\App\\Http\\Controllers\\Api\\JobController";
$categoryController = "\\App\\Http\\Controllers\\Api\\CategoryController";
$zipCodeController = "\\App\\Http\\Controllers\\Api\\ZipCodeController";


Route::get("/category", $categoryController."@index");
Route::post("/category/filter", $categoryController."@filter");

Route::get("/job", $jobController."@index");
Route::post("/job/filter", $jobController."@filter");
Route::get("/job/{id}", $jobController."@show");
Route::post("/job", $jobController."@store");
Route::put("/job/{id}", $jobController."@update");

Route::post("/zip-code/filter", $zipCodeController."@filter");

