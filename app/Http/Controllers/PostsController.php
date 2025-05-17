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
            'image' => 'nullable',
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

    public function show($id)
    {
        $post = Post::find($id);
        
        return response()->json([
            'success' => true,
            'data' => $post
        ]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:255',
            'image' => 'nullable',
        ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => $validator->errors()
        //     ], 400);
        // }

        $post = Post::find($id);

        $post->content = $request->content;
        $post->image = $request->image;

        $post->save();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Update Postingan',
            'data' => $post
        ]);
    }

    public function destroy($id)
    {
        Post::destroy($id);
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil Menghapus Postingan'
        ]);
    }
}
