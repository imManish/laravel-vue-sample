<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'full_name' => $this->full_name,
            'role_id' => $this->role_id,
            'mobile_number' => $this->mobile_number,
            'country' => $this->country,
            'city' => $this->city,
            'is_active' => $this->is_active,
        ];
        //return parent::toArray($request);
    }

    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author_url' => url('http://devopsdrop.online'),
        ];
    }
}
