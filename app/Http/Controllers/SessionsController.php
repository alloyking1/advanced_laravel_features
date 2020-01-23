<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use Mail;
use App\Mail\UserEmailConfirm;

class SessionsController extends Controller
{
    /**
     * creates a user
     * @param $request
     * @return $response 
    */

    public function create(Request $request){

        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:225',
            'email' => 'required|email',
            'password' => 'required|string|confirmed'
        ]);

        if($validate->fails()){
            $message = $validate->errors();
            return response()->json([
                'content' => $message
            ]);

        }else{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            
            // // $this->UserEmailConfirm($user);
            // $token = mt_rand(01234,23455);
            // Mail::to($request->email)->send(new UserEmailConfirm($token));

            return response()->json([
                'status' => 200,
                'message' => 'User created, verify your email',
                'data' => $user
            ]);
        }

    }

    /**
     * log a user in
     * @param $request
     * @return $response 
    */
    public function logIn(Request $request){
        $validate = Validator::make($request->all(), [
            'email' => 'required|string|email|max:225',
            'password' => 'required'
        ]);

        if($validate->fails()){
            return response()->json($validate->errors());
        }else{

            $AuthUser = Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);
            return response()->json([
                'status' => 200,
                'data' => Auth::user(),
                'message' => 'user loged in'
            ]);
        }
    }

    /**
     * logout the authenticated user
     * @param null 
    */
    public function logOut(){
        Auth::logout();
        return response()->json([
            'status'=> 200,
            'message'=> 'user loged out'
        ]);
    }

    /**
     * Sends confirmation email after creating user
     * @param $user(the user object)
     * @return $response 
    */
    protected function UserEmailConfirm($user){
        
    }
}
