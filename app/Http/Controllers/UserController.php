<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function checkPhoneExist(Request $request, $phone) {
        $user = User::where('phone', $phone)->first();
        if ($user)
            return response()->json(['status' => 1, 'msg' => 'Phone already exists']);
        else
            return response()->json(['status' => 0, 'msg' => 'Phone is available']);
    }

    public function checkNameExist(Request $request, $name) {
        $user = User::where('name', $name)->first();
        if ($user)
            return response()->json(['status' => 1, 'msg' => 'Name already exists']);
        else
            return response()->json(['status' => 0, 'msg' => 'Name is available']);
    }

    public function getUserInfo(Request $request, $user_id = null) {
        $userId = $user_id ? $user_id : getUserId($request);
        $user = User::where('id', $userId)->first();
        return response()->json($user);
    }

    public function updateUserInfo(Request $request) {
        $userId = getUserId($request);
        $user = User::where('id', $userId)->first();
        $newName = $request->input('name');
        $newDescription = $request->input('description');
        if ($newName)
            $user->name = $newName;
        if ($newDescription)
            $user->description = $newDescription;
        $user->save();
        return response()->json(['status' => 0, 'msg' => 'Update information successfully']);
    }
}
