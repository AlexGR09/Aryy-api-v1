<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CalendarAppointmentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public $collects = CalendarResource::class;

    public function toArray($request)
    {
        return [
            'data'=>$this->collection,
            'id'=>'id'
        ];
    }
}
