<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'experties_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    protected $with = [ 'cvFile', 'expertise'];

    public function cvFile(){
        return $this->hasOne(CvFile::class);
    }

    public function expertise(){
        return $this->belongsTo(Expertise::class);
    }

    public function subscription(){
        return $this->hasOne(Subscriptions::class);
    }

    public function jobApplication(){
        return $this->hasMany(JobApplications::class);
    }

    public function profile(){
        return $this->hasOne(UserProfile::class);
    }

    Public function wishList(){
        return $this->hasMany(WishList::class);
    }
}
