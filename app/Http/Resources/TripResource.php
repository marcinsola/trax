<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'  => $this->id,
            'date' => (new Carbon($this->date))->format('m/d/Y'),
            'miles' => $this->miles,
            //in a newer version of laravel I would use "whenNotNull"
            'total' => $this->when(isset($this->total), $this->total),
            'car' => new CarItemResource($this->car),
        ];
    }
}
