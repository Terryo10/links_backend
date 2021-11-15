<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Expertise;

class Job extends Model
{
    protected $with = [ 'organisation', 'jobApplications'];
    use HasFactory;

    public function organisation(){
        return $this->belongsTo(Organisation::class);
    }

    public function jobApplications(){
        return $this->hasMany(JobApplications::class);
    }
}
