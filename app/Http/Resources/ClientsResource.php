<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            "firts_name"=>$this->firts_name,
            "last_name"=>$this->last_name,
            "email"=>$this->email,
            "phone"=>$this->phone,
            "address"=>$this->address,
        ];
    }
}
