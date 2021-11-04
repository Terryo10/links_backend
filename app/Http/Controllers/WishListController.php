<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function addToWishList(Request $request){
        $request->validate([
            'job_id' => 'required'
        ]);

        //check is job is already on users wishlist
        $user =  Auth::User();
        $existingWish = wishlist::where('jobs_id','=',$request->input('job_id'))->where('user_id','=',$user->id)->get();
        if($existingWish->count() > 0){
            return response()->json([
                'success' => false,
                'message'=>'you have already added this item to your wishlist',

            ]);
        }
        $wishlist = new wishlist();
        $wishlist->user_id = $user->id;
        $wishlist->jobs_id = $request->input('job_id');
        $wishlist->save();
        return response()->json([
            'success' => true,
            'message'=>'Succesfully added to wishlist',

        ]);
    }

    public function removeWishlist(Request $request){
        $user =Auth::user();
        //
        $wishlist = wishlist::find($request->input('wishlist_id'));
        $wishlistUserId = $wishlist->user_id;
        if($user->id ==  $wishlistUserId){
            $wishlist->delete();
            return response()->json([
                'success' => true,
                'message'=>'Succesfully removed wishlist',
            ]);
        }
        return response()->json([
            'success' => false,
            'message'=>'sorry you are in the wrong place ',


        ]);
    }
}
