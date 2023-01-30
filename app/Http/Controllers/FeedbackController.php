<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class FeedbackController extends Controller
{
    public function setFeedback(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'token' => 'required|exists:users,token',
            'post_id' => 'required|exists:posts,id',
            'feedback' => 'required|boolean'
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

       $data['user_id'] = $user->id;

       $feedback = Feedback::where('post_id', $data['post_id'])->where('user_id',  $data['user_id'])->first();

       if(!$feedback){

            $new_feedback = Feedback::create($data);

            return response([
                'status' => 200,
                'message' => 'Feedback has been created',
                'data' => $new_feedback
            ], 200);

       }

       $feedback->update($data);

       return response([
            'status' => 200,
            'message' => 'Feedback has been created',
            'data' => $feedback
       ], 200);
    }
}
