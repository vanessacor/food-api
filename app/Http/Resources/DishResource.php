<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DishResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'dishes',
            'id' => $this->id,
            'atributes' => [
                'name' => $this->name,
                'description' => $this->description,
                'image' => $this->image,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,

            ],
            'link' => '/dishes/' . $this->id
        ];
    }
}
