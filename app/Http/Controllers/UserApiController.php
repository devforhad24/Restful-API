<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function showUser($id=NULL){
        if($id == ''){
            $users = User::get();
            return response()->json(['users' => $users], 200); //Success OK
        }else{
            $users = User::find($id);
            return response()->json(['users' => $users], 200);
        }
    }
}
