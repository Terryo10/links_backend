<?php

namespace App\Http\Resources;

use App\Models\Job;
use Illuminate\Http\Resources\Json\JsonResource;

class WishListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $jobs = array();
     $tobelooped = parent::toArray($request);
        foreach ($tobelooped as $item){
            $jaab = Job::find($item);
            array_push($jobs,$jaab );
        }
        return $jobs;
    }
}
