<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class AuthController extends Controller
{
    public function getLogin(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($data)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }

    public function getMe(){
        $auth = Auth::user();
        $user = User::getUser($auth->id);
        if(!empty($user)){
            return response()->json(['messages' => 'success', 'data' => $user], 200);
        }else{
            return response()->json(['messages' => 'Vui lòng đăng nhập'], 403);
        }
        
    }
}
