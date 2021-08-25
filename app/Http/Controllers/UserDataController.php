<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDataController extends Controller
{
    public function userData(Request $request)
    {
        $user = Auth::user();
        return  new UserResource($user);
    }


}
