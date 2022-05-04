<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BudgetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'username' => $this->resource->user->name,
            'house' => $this->resource->house,
            'food' => $this->resource->food,
            'transport' => $this->resource->transport,
            'personal' => $this->resource->personal,
            'entertainment' => $this->resource->entertainment

        ];
    }
}
