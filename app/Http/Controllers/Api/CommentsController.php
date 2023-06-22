<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CommentsResource;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    /**
     * index
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        // Get all comments
        $comments = Comment::latest()->paginate(10);

        // Return collection of comments as a resource
        return new CommentsResource(true, 'List Comments', $comments);
    }

    /**
     * store
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username'  => 'required',
            'comment'   => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422); //bad response
        }

        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/comments', $image->hashName());

        // Create comment
        $comment = Comment::create([
            'image'     => $image->hashName(),
            'username'  => $request->username,
            'comment'   => $request->comment,
        ]);

        // Return response
        return new CommentsResource(true, 'Data Post Berhasil Ditambahkan!', resource: $comment);
    }
}
