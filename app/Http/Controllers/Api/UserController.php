<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user_info = Auth::user()->with('books');
        return response()->json([
            'user'=>$user_info,
        ]);

    }

    public function my_books()
    {
        return response()->json([
            'my_books'=>Auth::user()->books
        ]);
    }
        public function my_liked_quotes()
    {
        return response()->json([
            'my_quotes'=>Auth::user()->quotes
        ]);
    }
        public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'username' => ['string','nullable', 'lowercase',  'max:255', 'unique:'. User::class],
            'profile_picture' =>['nullable', 'image', 'mimes:jpg,png,webp', 'max:2048'],
        ]);
        $updating_data = (array) $request->all();
        if( $request->hasFile('profile_picture')){

    //        img handling + naming
            $file = $request->file('profile_picture');
            $fileName  =time(). "-".$file-> getClientOriginalName();
            $file->move('assets/images/user_pics' , $fileName);

            $updating_data['profile_picture'] = $fileName;
//            remove the old pic
            if($user->pic_changed){
                unlink('assets/images/user_pics/' . $user->profile_picture);
            }else{
                $user->pic_changed = true;
                $user->save();
            }
        }
        $user->update($updating_data);
        return response()->json([
            'message'=>"Successfully changed 🤗",
            'updated_data'=>$updating_data
        ]);

    }

}
