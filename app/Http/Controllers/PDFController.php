<?php

namespace App\Http\Controllers;

use App\Models\CvFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // store user pdf
        $user = Auth::user();
        $request->validate([
            'file' => 'required|mimes:pdf|max:10048',
        ]);
        try{
            if($user->cvFile != null ){
                return response()->json([
                    'success' => false,
                    'message' => 'You have already uploaded a cv to your profile if you wish to change it update your cv in your settings',
                ], 217);
            }
            if ($request->hasFile('file')) {
                //Get filename with extension
                $filenameWithExt = $request->file('file')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Getting file extension
                $extension = $request->file('file')->getCLientOriginalExtension();
                //Stored name
                $fileNameToStore = $filename . '_' . time() . '_.' . $extension;
                //Uploading Thumbnail
                //model->
                $request->file('file')->storeAs('public/cv_file', $fileNameToStore);
            } else {
                $fileNameToStore = 'noname.pdf';
            }
            // save pdf to CvFile Model
            $pdf = new CvFile;
            $pdf->user_id = $user->id;
            $pdf->file_path = $fileNameToStore;
            $pdf->save();
            return response()->json([
                'success' => true,
                'message' => 'We have saved your CV PDF',
            ]);
        }catch(Exception $exception){
            return response()->json([
                'success' => false,
                'message' => $exception,
            ], 217);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $cvFile = $user->cvFile;
        return $cvFile;

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy()
    {
        $user = Auth::user();
        $pdf = CvFile::where('user_id', '=' , $user->id);
        try{
            $pdf->delete();
            return  response()->json([
                'success' => false,
                'message' => ' Cv Successfully Deleted',
            ]);
        }catch(Exception $exception){
            return response()->json([
                'success' => false,
                'message' => $exception,
            ], 217);
        }
    }
}
