<?php

/**
 * @OA\Tag(
 *     name="Job Entity",
 *     description="All operations related to job entity"
 * )
 */

/**
 * Main Schema
 */

 /**
 * @OA\Schema(
 *     schema="Job",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="title", type="string"),
 *     @OA\Property(property="description", type="string"),
 *     @OA\Property(property="delivery_date", type="string", format="date"),
 *     @OA\Property(property="category", type="object", ref="#/components/schemas/Category"),
 *     @OA\Property(property="zip_code", type="object", ref="#/components/schemas/ZipCode"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */

/**
 * @OA\Get(
 *     operationId="ShowJob",
 *     summary="Show A Job",
 *     description="use this API endpoint to retrieve single job based on its ID.",
 *     tags={"Job Entity"},
 *     method="Get",
 *     path="/api/job/{id}",
 *     @OA\Parameter(ref="#/components/parameters/ID"),
 *     @OA\Parameter(ref="#/components/parameters/job_with"),
 *     @OA\Response(response="200", ref="#/components/responses/JobEntityResponse"),
 *     @OA\Response(response="404", ref="#/components/responses/NotFoundErrorResponse"),
 *     @OA\Response(response="500", ref="#/components/responses/DatabaseErrorResponse")
 * )
 */

/**
 * List Job
 */

/**
 * @OA\Get(
 *     operationId="ListJob",
 *     summary="List Jobs",
 *     description="use this API endpoint to list all jobs up to last 30 days.",
 *     tags={"Job Entity"},
 *     method="Get",
 *     path="/api/job",
 *     @OA\Parameter(ref="#/components/parameters/paginate"),
 *     @OA\Parameter(ref="#/components/parameters/per_page"),
 *     @OA\Parameter(ref="#/components/parameters/page"),
 *     @OA\Parameter(ref="#/components/parameters/job_with"),
 *     @OA\Response(response="200", ref="#/components/responses/JobListingResponse"),
 *     @OA\Response(response="500", ref="#/components/responses/DatabaseErrorResponse")
 * )
 */

/**
 * Filter Category/Service
 */

/**
 * @OA\Post(
 *     operationId="FilterJob",
 *     summary="Filter Jobs",
 *     description="Use this API endpoint to filter jobs based on job attributes",
 *     tags={"Job Entity"},
 *     method="Post",
 *     path="/api/job/filter",
 *     @OA\Parameter(ref="#/components/parameters/paginate"),
 *     @OA\Parameter(ref="#/components/parameters/per_page"),
 *     @OA\Parameter(ref="#/components/parameters/page"),
 *     @OA\Parameter(ref="#/components/parameters/job_with"),
 *     @OA\Parameter(ref="#/components/parameters/query"),
 *     @OA\Parameter(ref="#/components/parameters/conditions"),
 *     @OA\Response(response="200", ref="#/components/responses/JobListingResponse"),
 *     @OA\Response(response="500", ref="#/components/responses/DatabaseErrorResponse")
 * )
 */

/**
 * @OA\Response(
 *     response="JobListingResponse",
 *     description="Job Listing",
 *     @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(
 *              allOf={@OA\Schema(ref="#/components/schemas/LaravelPagination")},
 *              @OA\Property(
 *                  property="data",
 *                  type="array",
 *                  @OA\Items(ref="#/components/schemas/Job")
 *              ),
 *         )
 *     )
 * )
 */

/**
 * @OA\Schema(
 *     schema="JobListing",
 *     anyOf={
 *          @OA\Schema(ref="#/components/schemas/JobListingWithPagination"),
 *          @OA\Schema(ref="#/components/schemas/JobListingWithoutPagination")
 *     }
 * )
 */

/**
 * @OA\Schema(
 *     schema="JobListingWithPagination",
 *     allOf={@OA\Schema(ref="#/components/schemas/LaravelPagination")},
 *     @OA\Property(
 *          property="data",
 *          type="array",
 *          @OA\Items(ref="#/components/schemas/Job")
 *     ),
 * )
 */

/**
 * @OA\Schema(
 *     schema="JobListingWithoutPagination",
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/Job")
 * )
 */

/**
 * Create and Update Job
 */

 /**
 * @OA\Post(
 *     operationId="storeJob",
 *     summary="Store Job",
 *     description="use this endpoint to store a new job resource into data layer",
 *     tags={"Job Entity"},
 *     method="Post",
 *     path="/api/job",
 *     @OA\Parameter(ref="#/components/parameters/job_with"),
 *     @OA\RequestBody(ref="#/components/requestBodies/StoreOrUpdateJobRequestBody"),
 *     @OA\Response(response="200", ref="#/components/responses/JobEntityResponse"),
 *     @OA\Response(response="400", ref="#/components/responses/ValidationErrorResponse"),
 *     @OA\Response(response="500", ref="#/components/responses/DatabaseErrorResponse")
 * )
 */

/**
 * @OA\Put(
 *     operationId="updateJob",
 *     summary="Update Job",
 *     description="use this endpoint to update an existing job resource",
 *     tags={"Job Entity"},
 *     method="Put",
 *     path="/api/job/{id}",
 *     @OA\Parameter(ref="#/components/parameters/ID"),
 *     @OA\Parameter(ref="#/components/parameters/job_with"),
 *     @OA\RequestBody(ref="#/components/requestBodies/StoreOrUpdateJobRequestBody"),
 *     @OA\Response(response="200", ref="#/components/responses/JobEntityResponse"),
 *     @OA\Response(response="404", ref="#/components/responses/NotFoundErrorResponse"),
 *     @OA\Response(response="400", ref="#/components/responses/ValidationErrorResponse"),
 *     @OA\Response(response="500", ref="#/components/responses/DatabaseErrorResponse")
 * )
 *
 * @OA\RequestBody(
 *     request="StoreOrUpdateJobRequestBody",
 *     description="store or update job request body",
 *     required=true,
 *     @OA\MediaType(
 *          mediaType="application/x-www-form-urlencoded",
 *          @OA\Schema(ref="#/components/schemas/StoreOrUpdateJob")
 *     ),
 * )
 *
 * @OA\Schema(
 *     schema="StoreOrUpdateJob",
 *     required={"title", "description", "delivery_date", "category_id", "zipcode_id"},
 *     @OA\Property(property="title", type="string", example="transfer job"),
 *     @OA\Property(property="description", type="string", example="I need to transfer some products from building..."),
 *     @OA\Property(property="delivery_date", type="string", format="date", example="2018-08-10"),
 *     @OA\Property(property="category_id", type="integer", description="Category ID", example="1"),
 *     @OA\Property(property="zipcode_id", type="integer", description="ZipCode ID", example="2"),
 * )
 */

/**
 * @OA\Response(
 *     response="JobEntityResponse",
 *     description="Job Entity",
 *     @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(ref="#/components/schemas/Job")
 *     )
 * )
 */

 /**
 * Parameters
 */

 /**
  * @OA\Parameter(
  *     parameter="job_with",
  *     style="deepObject",
  *     explode=true,
  *     name="with",
  *     in="query",
  *     description="define relations to fetch with the original resource",
  *     required=false,
  *     @OA\Schema(
  *          type="array",
  *          @OA\Items(
  *              type="string",
  *              enum={"category", "zipCode", "zipCode.city"}
  *          )
  *     )
  * )
  */