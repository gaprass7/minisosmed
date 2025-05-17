<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'post_id' => 'required|integer',
            'content' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        //jika validasi berhasil
        $comment = Comment::create([
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'content' => $request->content
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Membuat Komentar Baru',
            'data' => $comment
        ], 201);
    }

    public function destroy($id)
    {
        Comment::destroy($id);
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil Menghapus Komentar'
        ]);
    }
}
