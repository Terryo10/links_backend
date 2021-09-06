<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobsResource;
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

            $jobs= Job::where('expertises_id', '=', $user->experties_id)->get();

            $jobsCollection = JobsResource::collection($jobs);
            return response()->json([
                'success' => true,
                'jobs' => $jobsCollection,
            ]);
        }catch(Exception $exception){
            return response()->json([
                'success' => false,
                'message' => $exception,
            ], 217);

        }

    }
}
