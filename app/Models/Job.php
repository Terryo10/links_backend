<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function expertise(){
        return $this->belongsTo(Expertise::class);
    }

    public function organisation(){
        return $this->belongsTo(Organisation::class);
    }
}
