<?php

namespace App\Http\Resources;

use App\Models\Expertise;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $experties = Expertise::where('id','=', $this->experties_id)->first();

        return   [
            'id' => $this->id,
            'name' => $this->name,
            'email'=> $this->email,
            'cv_file'=>$this->cvFile,
            'expertise'=>$experties ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
