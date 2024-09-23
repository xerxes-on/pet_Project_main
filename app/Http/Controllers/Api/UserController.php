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
        $user_info = User::with('books',
                                'likedQuotes',
                                'reviews',
                                'likedGenres',
                                'following',
                                'followers')->find(auth()->user()->id);
        return response()->json([
            'user' => $user_info
        ]);

    }

    public function my_books()
    {
        return response()->json([
            'my_books' => Auth::user()->books
        ]);
    }

    public function my_liked_quotes()
    {
        return response()->json([
            'my_quotes' => Auth::user()->likedQuotes()
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'username' => ['string', 'nullable', 'lowercase', 'max:255', 'unique:'.User::class],
            'profile_picture' => ['nullable', 'image', 'mimes:jpg,png,webp', 'max:2048'],
        ]);
        $updating_data = (array) $request->all();
        if ($request->hasFile('profile_picture')) {
            //        img handling + naming
            $file = $request->file('profile_picture');
            $fileName = time()."-".$file->getClientOriginalName();
            $file->move('assets/images/user_pics', $fileName);
            $updating_data['profile_picture'] = $fileName;
        }
        $user->update($updating_data);
        $user_info = User::with('books',
                            'likedQuotes',
                            'reviews',
                            'likedGenres',
                            'following',
                            'followers')
                            ->find(auth()->user()->id);
        return response()->json([
            'user' => $user_info
        ]);


    }

    public function follow(User $user)
    {
        $current_user = User::find(auth()->user()->id);
        if($current_user->following()->where('following_id',$user->id )->exists()){
            auth()->user()->following()->detach($user->id);
            return response()->json(['message' => 'User unfollowed successfully']);
        }else{
            auth()->user()->following()->attach($user->id);
            return response()->json(['message' => 'User followed successfully']);
        }
    }


}
