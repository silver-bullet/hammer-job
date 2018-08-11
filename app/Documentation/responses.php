<?php

/**
 * @OA\Response(
 *     response="ValidationErrorResponse",
 *     description="some errors in your request",
 *     @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(ref="#/components/schemas/ValidationError")
 *     )
 * )
 */

/**
 * @OA\Schema(
 *     schema="ValidationError",
 *     @OA\Property(property="error", type="string", default="ValidationError"),
 *     @OA\Property(property="messages", type="array", @OA\Items(type="string"))
 * )
 */

/**
 * @OA\Response(
 *     response="NotFoundErrorResponse",
 *     description="item is not found",
 *     @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(ref="#/components/schemas/NotFoundError")
 *     )
 * )
 */

/**
 * @OA\Schema(
 *     schema="NotFoundError",
 *     @OA\Property(property="error", type="string", default="NotFoundError"),
 *     @OA\Property(property="messages", type="string", default="Item not found!")
 * )
 */

/**
 * @OA\Response(
 *     response="DatabaseErrorResponse",
 *     description="something went wrong with database connection!",
 *     @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(ref="#/components/schemas/DatabaseError")
 *     )
 * )
 */

/**
 * @OA\Schema(
 *     schema="DatabaseError",
 *     @OA\Property(property="error", type="string", default="DatabaseError"),
 *     @OA\Property(property="messages", type="string", default="Something went wrong, please try again later!")
 * )
 */