<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Password;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function mock(Request $request, $user_id = 1) {
        $user = User::where('id', '=', $user_id)->first();
        session(['user' => $user->toArray()]);
        return response(['status' => 0, 'msg' => 'Mock Login Successfully']);
    }

    public function authenticate(Request $request) {
        $account = $request->input('account', null);
        $password = $request->input('password');
        if (!$account)
            return response()->json(["status" => 1, "msg" => "Account cannot be null"]);
        $user = User::where('name', '=', $account)->orWhere('phone', '=', $account)->first();
        if (!$user)
            return response()->json(["status" => 2, "msg" => "Account does not exist"]);
        $record = Password::where('user_id', '=', $user->id)->where('password', '=', $password)->first();
        if (!$record)
            return response()->json(["status" => 3, "msg" => "Password is not correct"]);

        //then store information to session
        session(['user' => $user->toArray()]);
//        var_dump($request->session()->all());
        return response()->json(["status" => 0, "msg" => "Login Successfully"]);
    }

    public function register(Request $request) {
        $phone = $request->input('phone');
        if (User::where('phone', $phone)->first())
            return response()->json(['status' => 1, 'msg' => 'Phone already exists']);
        $name = $request->input('name');
        if (User::where('name', $name)->first())
            return response()->json(['status' => 2, 'msg' => 'Name already exists']);
        $sex = $request->input('sex');
        $password = $request->input('password');
        if (!$phone || !$sex || !$name || !$password)
            return response()->json(['status' => 3, 'msg' => 'Please input valid information']);
        $user = User::create([
            'name' => $name,
            'phone' => $phone,
            'sex' => $sex
        ]);
        $user_pwd = Password::create([
            'user_id' => $user->id,
            'password' => $password
        ]);
        if ($user && $user_pwd)
            return response()->json(['status' => 0, 'msg' => 'Register successfully']);
//        $user_pwd = new Password;
//        $user_pwd =
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return response()->json(['status' => 0, "msg" => "Logout Successfully"]);
    }
}
