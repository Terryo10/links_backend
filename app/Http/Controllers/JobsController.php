<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApplicationResource;
use App\Http\Resources\JobsResource;
use App\Models\Expertise;
use App\Models\Job;
use App\Models\JobApplications;
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

    public function applyJob($id){
        $user = Auth::user();
        $existingJob = JobApplications::where('user_id', '=', $user->id )->where('job_id', '=', $id)->get();
//        return $existingJob;
        if($existingJob == []){
            return response()->json([
                'success' => false,
                'message' => 'You Already Applied for this job',
            ], 217);
        }else{
            // creating a new job application
            $jobApplication = new JobApplications();
            $jobApplication->user_id = $user->id;
            $jobApplication->job_id = $id;
            $jobApplication->save();
            return response()->json([
                'success' => true,
                'message' => 'We have placed your application',
            ]);
        }
    }

    public function getAppliedJobs(){
        $user = Auth::user();
        $appliedJobs = JobApplications::where('user_id', '=', $user->id)->get();
        $empty = array();
        foreach ($appliedJobs as $jobs){
            $k = Job::find($jobs->job_id);
            array_push($empty, $k);
        }


        $jobsCollection = JobsResource::collection($empty);

        return response()->json([
            'success' => true,
            'jobs' =>$jobsCollection,
        ]);
    }


}
