<?php

/**
 * @OA\Tag(
 *     name="ZipCode Entity",
 *     description="All operations related to zip code entity"
 * )
 */

/**
 * Main Schema
 */

 /**
  * @OA\Schema(
  *     schema="ZipCode",
  *     @OA\Property(property="id", type="integer"),
  *     @OA\Property(property="code", type="integer"),
  *     @OA\Property(property="city", type="object", ref="#/components/schemas/City"),
  *     @OA\Property(property="jobs", type="array", @OA\Items(ref="#/components/schemas/Job"))
  * )
  */

/**
 * Filter ZipCode
 */

 /**
  * @OA\Post(
  *     operationId="FilterZipCode",
  *     summary="Filter Zip Codes",
  *     description="Use this API endpoint to filter zip codes based on zip code attributes",
  *     tags={"ZipCode Entity"},
  *     method="Post",
  *     path="/api/zip-code/filter",
  *     @OA\Parameter(ref="#/components/parameters/paginate"),
  *     @OA\Parameter(ref="#/components/parameters/per_page"),
  *     @OA\Parameter(ref="#/components/parameters/page"),
  *     @OA\Parameter(ref="#/components/parameters/zipcode_with"),
  *     @OA\Parameter(ref="#/components/parameters/query"),
  *     @OA\Parameter(ref="#/components/parameters/conditions"),
  *     @OA\Response(response="200", ref="#/components/responses/ZipCodeListingResponse"),
  *     @OA\Response(response="500", ref="#/components/responses/DatabaseErrorResponse")
  * )
  */

/**
 * Responses
 */

 /**
  * @OA\Response(
  *     response="ZipCodeListingResponse",
  *     description="ZipCode Listing",
  *     @OA\MediaType(
  *          mediaType="application/json",
  *          @OA\Schema(
  *              allOf={@OA\Schema(ref="#/components/schemas/LaravelPagination")},
  *              @OA\Property(
  *                  property="data",
  *                  type="array",
  *                  @OA\Items(ref="#/components/schemas/ZipCode")
  *              ),
  *         )
  *     )
  * )
  */

/**
 * Parameters
 */

 /**
  * @OA\Parameter(
  *     parameter="zipcode_with",
  *     style="deepObject",
  *     explode=true,
  *     name="with",
  *     in="query",
  *     description="define relations to fetch with the original resource",
  *     @OA\Schema(
  *          type="array",
  *          @OA\Items(
  *              type="string",
  *              enum={"city", "jobs"}
  *          )
  *     )
  * )
  */