<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\InvoiceResource;
use Illuminate\Http\Resources\Json\JsonResource;//json ahi que retornarlo

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                 'id' => $this->id,
                 'name' => $this->name,
                 'type' => $this->type,
                 'email' => $this->email,
                 'address' => $this->address,
                 'city' => $this->city,
                 'state' => $this->state,
                 'postalCode' => $this->postal_code,
                 'invoice' => InvoiceResource::collection($this->whenLoaded('invoices'))
        ];
    }
}
