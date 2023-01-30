<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'exclude',
            'token' => 'exclude'
        ]);

        if($validator->fails()){
            return response([
                'status' => 422,
                'message' => 'Validation error',
                'error' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        $new_token = Str::random(16);

        $user = User::where('token', $new_token)->first();
        
        if($user){
            while($user){
                
                $new_token = Str::random(16);

                $user = User::where('token', $new_token)->first();
                
            }
        }
        
        $data['token'] = $new_token;
        $data['role'] = 0;
        $data['password'] = Hash::make($request->all()['password']);

        $user = User::create($data);

        return response([
            'status' => 200,
            'message' => 'User has been registered',
            'data' => $user
        ]);
    }

    public function authorization(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response([
                'status' => 422,
                'message' => 'Validation error',
                'error' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        $user = User::where('email', $data['email'])->first();
        
        if(Hash::check($data['password'], $user->password)){

            return response([
                'status' => 200,
                'token' => $user->token
            ]);
            
        }
        
        return response([
            'status' => 403,
            'message' => 'Incorrect password'
        ]);
    }

    public function updateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|exists:users,token',
            'name' => 'unique:users,name',
            'email' => 'unique:users,email|email',
            'password' => '',
        ]);

        if($validator->fails()){
            return response([
                'status' => 422,
                'message' => 'Validation error',
                'error' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        $user = User::where('token', $data['token'])->first();

        
        $data['password'] = Hash::make($request->all()['password']);
        
        $user->update($data);

        return response([
            'status' => 200,
            'message' => 'User has been updated',
        ]);
    }
}
