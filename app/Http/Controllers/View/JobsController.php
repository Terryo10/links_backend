<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\Expertise;
use App\Models\Job;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = Auth::user();
        $organisation = Organisation::find($id);
        if($user->id != $organisation->user_id){
            return redirect()->back()->withStatus('UnAuthorised');
        }

        $expertise = Expertise::all();
        return view('jobs.create')->with('expertise', $expertise)->with('organisation',$organisation);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'organisation_id' => 'required',
            'name' => 'required',


        ]);
        $user = Auth::user();
        $organisation = Organisation::find($request->input('organisation_id'));
        if($user->id != $organisation->user_id){
            return redirect()->back()->withStatus('UnAuthorised');
        }
        $job = new Job();
        $job->name = $request->input('name');
        $job->description = $request->input('description');
        $job->expertises_id = $request->input('expertises_id');
        $job

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
