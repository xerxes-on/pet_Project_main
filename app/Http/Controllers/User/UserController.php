<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(): View
    {
        $user_info = auth()->user();

        return view('layouts.profile', compact(['user_info']));
    }

    public function edit(): View
    {
        return view('layouts.edit_profile');
    }
        public function store(Request $request)
    {
        $user = Auth::user();

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
        return redirect()->route('profile')->with('message',"Successfully changed 🤗");

    }

}
