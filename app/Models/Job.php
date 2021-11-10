<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Expertise;

class Job extends Model
{
    protected $with = [ 'organisation'];
    use HasFactory;


    public function organisation(){
        return $this->belongsTo(Organisation::class);
    }
}
