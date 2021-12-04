<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\Expertise;
use App\Models\Job;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganisationsController extends Controller
{
    public function _construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $organisations= Organisation::where('user_id','=', $userId )->get();
        return view('organisations.index')->with('organisations', $organisations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expertise = Expertise::all();
        return view('organisations.create')->with('expertise', $expertise);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $request->validate([
            'number_of_employees' => 'required',
            'location' => 'required',
            'name' => 'required',
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:20240'
        ]);

        $filenameWithExt = $request->image->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Getting file extension
        $extension = $request->image->getCLientOriginalExtension();
        //Stored name
        $fileNameToStore = $filename . '_' . time() . '_.' . $extension;
        //model->
        $request->file('image')->storeAs('public/organisation_logos', $fileNameToStore);
        $organisation = new Organisation();
        $organisation->name = $request->input('name');
        $organisation->location = $request->input('location');
        $organisation->user_id = $userId;
        $organisation->number_of_employees = $request->input('number_of_employees');
        $organisation->image_path = $fileNameToStore;
        $organisation->save();
        $route = "organisations";
        return redirect($route."/".$organisation->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $organisation = Organisation::find($id);
        if($organisation == null){
            return redirect()->back()->withStatus('oops something happened');
        }
        $jobs = Job::where('organisation_id','=',$organisation->id)->get();
        return view('organisations.show ')
            ->with('organisation', $organisation)
            ->with('jobs', $jobs);
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
