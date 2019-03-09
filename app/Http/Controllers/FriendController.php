<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    //
    public function getMyFriendList(Request $request) {
        $userId = getUserId($request);
        $friendIdList = Friend::where('user_id', '=', $userId)->get();
        $friendList = array();
        foreach ($friendIdList as $row) {
            $friendList[] = User::where('id', '=', "{$row['friend_id']}")->first();
        }
        return response()->json($friendList);
    }

    public function addNewFriend(Request $request, $friend_id) {
        $userId = getUserId($request);
        $record = Friend::where('user_id', $userId)->where('friend_id', $friend_id)->first();
        if ($record || $userId == $friend_id)
            return response()->json(['status' => 1, 'msg' => 'Friend already exists']);
        $newRecord = new Friend;
        $newRecord->user_id = $userId;
        $newRecord->friend_id = $friend_id;
        $newRecord->save();
        return response()->json(['status' => 0, 'msg' => 'Add friend successfully']);
    }

    public function removeFriend(Request $request, $friend_id) {
        $userId = getUserId($request);
        $record = Friend::where('user_id', $userId)->where('friend_id', $friend_id)->first();
        if (!$record)
            return response()->json(['status' => 1, 'msg' => 'Friend does not exists']);
        $record->delete();
        return response()->json(['status' => 0, 'msg' => 'Remove friend successfully']);
    }
}
