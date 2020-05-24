<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserProfile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    protected $user, $user_profile;
    
    public function __construct(User $user, UserProfile $user_profile){
        $this->user = $user;
        $this->user_profile = $user_profile;
    }

    public function index()
    {
        $users = $this->user::getAll();
        return response()->json($users, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),
            [ 
                'email' => 'required|unique:users,email',
                'password' => 'required',
            ],

            [
                'email.required' => "Email không được để trống",
                'email.unique' => "Email đã tồn tại",
                'password.required' => "Mật khẩu không được để trống"
            ]
        );
        if($validation->fails()){
            $errors = $validation->errors();
            return response()->json([ 'messages' => $errors], 400);
        } else{
            $user = $this->user->createUser($request->all());
            return response()->json(['messages' => 'success', 'data' => $user], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->getUser($id);
        if(empty($user)){
            return response()->json(['messages' => 'Tài khoản người dùng không tồn tại'], 400);
        }else{
            return response()->json(['messages' => 'success', 'data' => $user], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
            $user = $this->user_profile->updateUser($request->all(), $id);
            return response()->json(['messages' => 'success', 'data' => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->deleteUser($id);
        return response()->json(['messages' => 'success'], 200);
    }
}
