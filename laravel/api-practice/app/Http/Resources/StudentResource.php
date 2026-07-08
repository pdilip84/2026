<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\JsonApi\JsonApiResource;

class StudentResource extends JsonApiResource
{
    /**
     * The resource's attributes.
     */
    // what is the difference between $attributes and $relationships in a JsonApiResource?
    // $attributes are the properties of the resource itself, while $relationships are the links to other resources that are related to this resource. In a JSON:API response, attributes represent the data of the resource, while relationships represent the connections to other resources.
    // so what should be in $attributes and what should be in $relationships for a StudentResource?
    // $attributes should contain the properties of the Student model, such as name, grade, and school_id. $relationships should contain the relationships to other resources, such as the relationship to the School model, which could be represented as a relationship to the SchoolResource.
    public $attributes = [
        'name',
        'grade',
        'school_id',
    ];

    /**
     * The resource's relationships.
     */
    // i want to display school information when i get a student resource. how can i do that?
    // you can define a relationship in the StudentResource that links to the SchoolResource. This way, when you retrieve a StudentResource, it will include the related School information as part of the relationships section of the JSON:API response. You can do this by adding a method in the StudentResource that returns the related SchoolResource, and then include that method in the $relationships array.
    public function school()
    {
        return new SchoolResource($this->school);
    }

    public $relationships = [
        // ...
    ];
}
