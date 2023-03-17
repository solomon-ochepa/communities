<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class EmployeeResources extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"            => $this->id,
            // "name"                           => $this->first_name . ' ' . $this->last_name,
            // "phone"                          => $this->phone,
            // "gender"                         => trans('genders.' . $this->gender),
            "number"        => $this->number,
            "employed_at"   => Carbon::parse($this->employed_at)->format('d M Y'),
            "status"        => trans('statuses.' . $this->status),
            "user_id"       => (int) $this->user_id,
            "about"         => $this->about,
            // "image"                          => $this->user->images

        ];
    }
}
