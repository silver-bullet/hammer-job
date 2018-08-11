<?php

/**
 * @OA\Schema(
 *     schema="LaravelPagination",
 *     @OA\Property(property="total", type="integer"),
 *     @OA\Property(property="current_page", type="integer"),
 *     @OA\Property(property="from", type="integer"),
 *     @OA\Property(property="to", type="integer"),
 *     @OA\Property(property="per_page", type="integer"),
 *     @OA\Property(property="last_page", type="integer"),
 *     @OA\Property(property="first_page_url", type="string", format="url"),
 *     @OA\Property(property="next_page_url", type="string", format="url"),
 *     @OA\Property(property="prev_page_url", type="string", format="url"),
 *     @OA\Property(property="last_page_url", type="string", format="url"),
 *     @OA\Property(property="path", type="string", format="url"),
 * )
 */