<?php
/**
 * Created by PhpStorm.
 * User: pontsh
 * Date: 2/27/2019
 * Time: 2:41 PM
 */

use Illuminate\Http\Request;

function getUserId(Request $request)
{
    if ($user = $request->session()->get('user')) {
        return $user['id'];
    }
    return false;
}