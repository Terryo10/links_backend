<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Exception;

class JobsController extends Controller
{
    public function getJobs(Request $request){
        $user = Auth::user();

        try{
            $user = Auth::user();

            $expertise = Job::where('expertises_id', '=', $user->experties_id)->get();


            return response()->json([
                'success' => true,
                'jobs' => $expertise,
            ]);
        }catch(Exception $exception){
            return response()->json([
                'success' => false,
                'message' => $exception,
            ], 217);

        }

    }
}
