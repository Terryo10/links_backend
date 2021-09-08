<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Exception;

class ExpertiseController extends Controller
{
    public function selectExpertise(Request $request){
        $request->validate([
            'expertise_id' => 'required'
        ]);
        try{
            $user = Auth::user();
            $user->experties_id = $request->input('expertise_id') ;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Expertise Selected Successfully',
            ]);
        }catch(Exception $exception){
            return response()->json([
                'success' => false,
                'message' => $exception,
            ], 217);

        }

    }

    public function getExpertiseList(){
        $expertise = Expertise::all();
        return response()->json([
            'success' => true,
            'expertise' => $expertise,
        ]);
    }

    public function updateExpertise(Request $request){
        $request->validate([
            'expertise_id' => 'required'
        ]);

        try{
            $user = Auth::user();
            $user->experties_id = $request->input('expertise_id') ;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Expertise Updated Successfully',
            ]);
        }catch(Exception $exception){
            return response()->json([
                'success' => false,
                'message' => $exception,
            ], 217);

        }
    }
}
