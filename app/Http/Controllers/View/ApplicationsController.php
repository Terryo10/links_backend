<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\JobApplications;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function applications($id){
        $applications = JobApplications::where('job_id', '=', $id)->get();
        return view('jobs.applications')->with('applications', $applications);
    }
}
