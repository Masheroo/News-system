<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function getAllCategories()
    {
        $categories = Category::all();

        return response([
            'status' => 200,
            'categories' => $categories
        ]);
    }

    public function createCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
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

        $data = $validator->validated();

        $token = $data['token'];

        $user = User::where('token', '=', $token)->first();

        if($user->role == 1){
            $category = Category::create($data);
    
            return response([
                'status' => 200,
                'message' => 'Category has been created',
                'data' => $category
            ]);
        }else{
            return response([
                'status' => 403,
                'message' =>'User accept error',
            ], 403);
        }

    }

    public function deleteCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
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

        $data = $validator->validated();

        $token = $data['token'];

        $user = User::where('token', '=', $token)->first();

        if($user->role == 1){
            $category = Category::find($data['category_id']);
    
            $category->delete();

            return response([
                'status' => 200,
                'message' => 'Category has been deleted'
            ]);
        }else{
            return response([
                'status' => 403,
                'message' =>'User accept error',
            ], 403);
        }
    }

    public function updateCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required',
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

        $data = $validator->validated();

        $token = $data['token'];

        $user = User::where('token', '=', $token)->first();

        if($user->role == 1){
            $category = Category::find($data['category_id']);
    
            $category->update($data);

            return response([
                'status' => 200,
                'message' => 'Category has been updated',
                'data' => $category
            ]);
        }else{
            return response([
                'status' => 403,
                'message' =>'User accept error',
            ], 403);
        }
    }
}
