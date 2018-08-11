<?php

/**
 * @OA\Parameter(
 *     parameter="ID",
 *     name="id",
 *     in="path",
 *     description="resource id",
 *     required=true,
 *     @OA\Schema(
 *          type="integer",
 *     )
 * )
 */

/**
 * @OA\Parameter(
 *     parameter="paginate",
 *     name="paginate",
 *     in="query",
 *     description="Enable/Disable pagination, Default: enabled",
 *     required=false,
 *     @OA\Schema(
 *          type="boolean",
 *     )
 * )
 */

/**
 * @OA\Parameter(
 *     parameter="per_page",
 *     name="per_page",
 *     in="query",
 *     description="number of items per page, Default: 10",
 *     required=false,
 *     @OA\Schema(
 *          type="integer",
 *     )
 * )
 */

/**
 * @OA\Parameter(
 *     parameter="page",
 *     name="page",
 *     in="query",
 *     description="current page",
 *     required=false,
 *     @OA\Schema(
 *          type="integer",
 *     )
 * )
 */


/**
 * @OA\Parameter(
 *     parameter="conditions",
 *     style="deepObject",
 *     explode=true,
 *     name="conditions",
 *     in="query",
 *     description="Retrieve only resources that match defined conditions. <br>format: conditions[attr_name:operator]=whatever <br>Current allowed operators: eq, gt, in <br><b>Note that you will need to remove OrderedMap if you are going to edit this field</b>",
 *     required=false,
 *     @OA\Schema(
 *          type="object",
 *          example={"id:in":"2,4"}
 *     )
 * )
 */

/**
 * @OA\Parameter(
 *     parameter="query",
 *     name="query",
 *     in="query",
 *     description="search the resource by its main key.<br>Note that main key changes from entity to another",
 *     required=false,
 *     @OA\Schema(
 *          type="string",
 *     )
 * )
 */