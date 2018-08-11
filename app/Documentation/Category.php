<?php

/**
 * @OA\Tag(
 *     name="Category Entity",
 *     description="All operations related to category/service entity"
 * )
 */


/**
 * Main Schema
 */

/**
 * @OA\Schema(
 *     schema="Category",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="code", type="string"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="jobs", type="array", @OA\Items(ref="#/components/schemas/Job"))
 * )
 */

/**
 * List Category/Service
 */

/**
 * @OA\Get(
 *     operationId="ListCategory",
 *     summary="List Services/Categories",
 *     description="use this API endpoint to list all categories/services",
 *     tags={"Category Entity"},
 *     method="Get",
 *     path="/api/category",
 *     @OA\Parameter(ref="#/components/parameters/paginate"),
 *     @OA\Parameter(ref="#/components/parameters/per_page"),
 *     @OA\Parameter(ref="#/components/parameters/page"),
 *     @OA\Parameter(ref="#/components/parameters/category_with"),
 *     @OA\Response(response="200", ref="#/components/responses/CategoryListingResponse"),
 *     @OA\Response(response="500", ref="#/components/responses/DatabaseErrorResponse")
 * )
 */

/**
 * Filter Category/Service
 */

 /**
 * @OA\Post(
 *     operationId="FilterCategory",
 *     summary="Filter Services/Categories",
 *     description="Use this API endpoint to filter categories/services based on category attributes",
 *     tags={"Category Entity"},
 *     method="Post",
 *     path="/api/category/filter",
 *     @OA\Parameter(ref="#/components/parameters/paginate"),
  *     @OA\Parameter(ref="#/components/parameters/per_page"),
  *     @OA\Parameter(ref="#/components/parameters/page"),
 *     @OA\Parameter(ref="#/components/parameters/category_with"),
 *     @OA\Parameter(ref="#/components/parameters/query"),
 *     @OA\Parameter(ref="#/components/parameters/conditions"),
 *     @OA\Response(response="200", ref="#/components/responses/CategoryListingResponse"),
 *     @OA\Response(response="500", ref="#/components/responses/DatabaseErrorResponse")
 * )
 */

/**
 * Responses
 */

/**
 * @OA\Response(
 *     response="CategoryListingResponse",
 *     description="Category Listing",
 *     @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(
 *              allOf={@OA\Schema(ref="#/components/schemas/LaravelPagination")},
 *              @OA\Property(
 *                  property="data",
 *                  type="array",
 *                  @OA\Items(ref="#/components/schemas/Category")
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
  *     parameter="category_with",
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
  *              enum={"jobs"}
  *          )
  *     )
  * )
  */
