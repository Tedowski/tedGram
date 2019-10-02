<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    // add auth middleware to make sure that this is not accessible to unauthenticated (un-logged) users
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts/create');
    }

    public function show(Post $post)
    {

        return view('posts.show', compact('post'));
    }

    public function store()
    {
        // validation

        $data = request()->validate([
           'caption' => 'required',
           'image' => ['required', 'image']
            // 'unvalidatedField' => ''   #  We have to include all fields that are in the form - if we do not need validation - pass empty string
        ]);

        // store uploaded image in public/storage and save the url to be saved in the database

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        // create new post to store in the database using the known relationship with user so the post gets the user_id
        // if a field is not specified in the validate function above, it will be ignored here, UNLESS SPECIFIED
        // JUST DO IT THIS WAY

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect('/profile/'. auth()->user()->id);

//        \App\Post::create($data);  # this would work as well but without the reference to the authenticated user
    }
}
