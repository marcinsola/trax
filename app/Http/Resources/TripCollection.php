<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TripCollection extends ResourceCollection
{
    public $collects = TripResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        /**
         * I decided it would be easier to calculate the "total" column
         * on every view instead of storing this data in the database.
         * The premise is that if the user would like to store a trip that
         * happened a long time ago and some more recent trips were already
         * stored, we would have to re-calculate the total of every trip
         * that happened after this newly added trip.
         *
         * Plus - I assume that IRL project would have some kind of a pagination
         * in place, so the number of trips wouldn't be an issue, because we would
         * have to calculate the total for X or less trips, where X is the number
         * of trips we provide via API per page.
         */
        $total = 0;
        return [
            'data' => $this->collection->sortBy('date')
                ->map(function (TripResource &$tripResource) use (&$total) {
                    $total += $tripResource->miles;
                    $tripResource->total = $total;
                    return $tripResource;
                })
                ->values(),
        ];
    }
}
