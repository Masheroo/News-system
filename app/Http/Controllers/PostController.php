<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function getAllPosts()
    {
        
        $posts = Post::all();

        return response([
            'status' => 200,
            'data' => $posts
        ], 200);
    }

    public function getOnePost($id)
    {
        $post = Post::find((int)$id);

        if (!$post) {
            return response([
                'status' => 404,
                'message' =>'Invalid post_id',
            ], 404);
        }else{
            return response($post, 200);
        }
    }

    public function getPostsFromCategory(int $category_id, int $page = null)
    {
        $category = Category::find($category_id);

        if(!$category){
            return response([
                'status' => 404,
                'message' => 'Invalid category' 
            ]);
        }

        if($category){

            $posts_data = Post::where('category_id', $category_id)->get();

            if($page){

                $response_data = array_slice(json_decode($posts_data), ($page-1)*10, 10);

                return response([
                    'status' => 200,
                    'data' => [
                        'page' => $page,
                        'posts' => $response_data
                    ]
                ], 200);

            }

            return response([
                'status' => 200,
                'data' => [
                    'posts' => $posts_data
                ]
            ], 200);
           
        }
    }

    public function findPosts(string $title)
    {
        $posts = Post::where('title', 'like', '%'.$title.'%')->get();

        if(!$posts){
            return response([
                'status' => 404,
                'message' => 'Posts not found' 
            ]);
        }

        return response([
            'status' => 200,
            'data' => [
                'posts' => $posts
            ]
        ], 200);
    }

    public function createPost(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
            'text' => 'required',
            'image' => 'required',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'token' => 'required|exists:users,token',
        ]);

        if($validator->fails()){
            return response([
                'status' => 422,
                'message' =>'Validation error',
                'errors' =>[
                    $validator->errors()
                ]
            ], 422);
        }

        $token = $data['token'];

        $user = User::where('token', '=', $token)->first();

        if($user->role == 1){
            
            $post = Post::create($data);
    
            return response($post);
        }else{
            return response([
                'status' => 403,
                'message' =>'User accept error',
            ], 403);
        }


    }

    public function deletePost(Request $request, $id)
    {

        $data = $request->all();

        $data['post_id'] = (int)$id;
        
        $validator = Validator::make($data, [
            'token' => 'required|exists:users,token',
            'post_id' => 'required|exists:posts,id',
        ]);
        
        if($validator->fails()){
            return response([
                'status' => 422,
                'message' =>'Validation error',
                'errors' =>[
                    $validator->errors()
                    ]
            ], 422);
        }
        $token = $data['token'];

        $user = User::where('token', '=', $token)->first();

        if(!$user){
            return response([
                'status' => 401,
                'message' => 'Token is invalid',
            ], 401);
        }else{
            if($user->role == 1){
                $post = Post::find($data['post_id']);

                $post->delete();

                return response([
                    'status' => 200,
                    'message' => 'Post have been deleted',
                ], 200);
            }else{
                return response([
                    'status' => 401,
                    'message' => 'User haven`t accept to delete post',
                ], 401);
            }
        }
            
    }

    public function updatePost(Request $request, $id)
    {
        $data = $request->all();

        $data['post_id'] = (int)$id;
        
        $validator = Validator::make($data, [
            'token' => 'required|exists:users,token',
            'post_id' => 'required|exists:posts,id',
        ]);
        
        if($validator->fails()){
            return response([
                'status' => 422,
                'message' =>'Validation error',
                'errors' =>[
                    $validator->errors()
                    ]
            ], 422);
        }
        
        $token = $data['token'];

        $user = User::where('token', '=', $token)->first();

        $post = Post::find($data['post_id']);


        if ($user->role == 1) {
            
            if (!$post) {
                return response([
                    'status' => 404,
                    'message' =>'Invalid post_id',
                ], 404);
            }
            
            $post->update($data);
    
            return response([
                'status' => 200,
                'message' => 'Post has been updated',
                'data' => $post
            ]);
        }

        

    }
}
