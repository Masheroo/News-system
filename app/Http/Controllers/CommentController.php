<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function getCommentOfPost(int $id)
    {
        $post = Post::find($id);

        if(!$post){
            return response([
                'status' => 404,
                'message' => 'Post not found'
            ], 404);
        }

        $comments = Comment::where('post_id', $id)->get();

        return response([
            'status' => 200,
            'data' => $comments
        ], 200);
    }

    public function createComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|exists:posts,id',
            'token' => 'required|exists:users,token',
            'text' => 'required',
        ]);

        if($validator->fails()){
            return response([
                'status' => 422,
                'meassage' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        $data = $validator->validated();
        $data['post_id'] = (int)$validator->validated()['post_id'];
        $data['user_id'] = User::where('token', $data['token'])->first()->id;

        $comment = Comment::create($data);

        return response([
            'status' => 200,
            'data' => $comment
        ]);
    }

    public function deleteComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|exists:users,token',
            'comment_id' => 'required|exists:comments,id'
        ]);

        if($validator->fails()){
            return response([
                'status' => 422,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        $data = $validator->validated();
        $user = User::where('token', $data['token'])->first();
        $comment = Comment::find((int)$data['comment_id']);

        if($comment->user_id == $user->id){

            $comment->delete();

            return response([
                'status' => 200,
                'message' => 'Comment has been deleted'
            ]);
        }
        return response([
            'status' => 403,
            'message' => 'This comment haven`t be create by this user'
        ]);
    }
}
