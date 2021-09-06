<?php

namespace App\Http\Resources;

use App\Models\Expertise;
use Illuminate\Http\Resources\Json\JsonResource;

class JobsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $experties = Expertise::where('id','=', $this->expertises_id)->first();

        return [
            'id'=> $this->id,
            'name'=>$this->name,
            'type'=>$this->type,
            'expertise'=> $experties,
            'organisation'=>$this->organisation,
            'description'=>$this->description,
            'tasks'=>$this->tasks,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
