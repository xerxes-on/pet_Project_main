<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AuthorsResource;
use App\Models\Author;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::with('books')->paginate(10);
        return response(AuthorsResource::collection($authors));
    }

    public function show(string $id)
    {
        $author = Author::with('books')->find($id);
        if ($author) {
            return response(new AuthorsResource($author));
        } else {
            return response('There is no hotel with such id');
        }
    }

    public function follow(Author $author)
    {
        $user = User::find(auth()->user()->id);
        if($user->followingAuthors()->where('author_id',$author->id )->exists()){
            auth()->user()->followingAuthors()->detach($author->id);
            return response()->json(['message' => 'Author unfollowed successfully']);
        }else{
            auth()->user()->followingAuthors()->attach($author->id);
            return response()->json(['message' => 'Author followed successfully']);
        }
    }
    public function isFollowing(Author $author)
    {
        $isFollowing = auth()->user()->followingAuthors()->where('author_id', $author->id)->exists();
        return response()->json(['isFollowing' => $isFollowing]);
    }
}
