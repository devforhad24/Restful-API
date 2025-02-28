<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    // This method use for fetch users
    public function showUser($id=NULL){
        if($id == ''){
            $users = User::get();
            return response()->json(['users' => $users], 200); //Success- OK
        }else{
            $users = User::find($id);
            return response()->json(['users' => $users], 200);
        }
    }

    // This method use for add user
    public function addUser(Request $request){
        if($request->isMethod('POST')){
            $data = $request->all();
            // return $data;

            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ];

            $customMessage = [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email must be a valid email',
                'email.unique' => 'Email must be unique',
                'password.required' => 'Password is required',
            ];

            $validator = Validator::make($data, $rules, $customMessage);
            if($validator->fails()){
                return response()->json($validator->errors(), 422);     // Not Created
            }

            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);

            $user->save();
            $message = 'User Successfully Created';

            return response()->json(['message' => $message], 201); // success- CREATED
        }
    }


}
