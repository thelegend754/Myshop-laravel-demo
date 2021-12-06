<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    static public function signIn(Request $request){

        $valid = User::userValidate($request->email,$request->password);
        if($valid){
            return redirect('/');
        }
       
    }
}
