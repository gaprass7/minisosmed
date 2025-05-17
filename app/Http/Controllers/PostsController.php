<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return response()->json([
            'success' => true,
            'data' => $posts
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'content' => 'required|string|max:255',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        //jika validasi berhasil
        $post = Post::create([
            'user_id' => $request->user_id,
            'content' => $request->content,
            'image' => $request->image
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Membuat Post Baru',
            'data' => $post
        ], 201);
    }
}
