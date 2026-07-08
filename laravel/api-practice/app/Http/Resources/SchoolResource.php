<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\JsonApi\JsonApiResource;

class SchoolResource extends JsonApiResource
{
    /**
     * The resource's attributes.
     */
    public $attributes = [
        // ...
        'name',
    ];

    /**
     * The resource's relationships.
     */
    public $relationships = [
        // ...
    ];
}
