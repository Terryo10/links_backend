<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function createProfile(Request $request){
        //do everything here
        $user = Auth::user();
        if($user->profile != null){
            return response()->json([
                'success' => true,
                'message' => 'You Already have a profile',
            ]);
        }else{
            if ($request->has('image')) {
            $image = $request->image;
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $filenameToStore = $filename . '_.' . $extension;
                $image->storeAs('public/product_images', $filenameToStore);
        }
        $profile = new UserProfile();
        $profile->user_id = $user->id;
        $profile->phone_number = $request->input('phone_number');
        $profile->image_path = $filenameToStore;
        $profile->save();

        return response()->json([
                'success' => true,
                'message' => 'Profile Created Successfully',
            ]);
        }
    }

    public function deleteProfile(){
        $user = Auth::user();
        $user_id = $user->id;
        $profile = UserProfile::where('user_id', '=',$user_id )->first();
        $profile->delete();
        return response()->json([
            'success' => true,
            'message' => 'Profile Removed Successfully',
        ]);
    }




}
