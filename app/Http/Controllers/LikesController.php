<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Like;
use Tymon\JWTAuth\Facades\JWTAuth;

class LikesController extends Controller
{
    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $validator = Validator::make($request->all(), [
            'post_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        //jika validasi berhasil
        $like = Like::create([
            'user_id' => $user->id,
            'post_id' => $request->post_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Menyukai Post',
            'data' => $like
        ], 201);
    }

    public function destroy($id)
    {
        Like::destroy($id);
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil Menghapus Like'
        ]);
    }
}
