<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Hash;
use Session;

class User extends Model
{
    use HasFactory;
    
    static public function userValidate($email,$password){
       $valid = false; 
       $sql = "select * from users where email = ?";
       $user = DB::select($sql,[$email]);
       if($user){
           $user = $user[0];
           if(Hash::check($password,$user->password)){
               $valid = true;
               Session::put("user_id",$user->id);
               Session::put("user_name",$user->name);
               Session::flash("sm",$user->name." welcome back");
              
           }
       }
        return $valid;
    }
}
