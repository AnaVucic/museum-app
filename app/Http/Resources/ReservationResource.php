<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'reservation';
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'ticket' => new TicketResource($this->resource->ticket),
            'reservation_date' => $this->resource->reservation_date,
            'user' => new UserResource($this->resource->user),
            'customer' => new CustomerResource($this->resource->customer) 
        ];

    }
}
