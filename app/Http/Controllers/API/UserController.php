<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function get($id = null)
    {
        if (isset($id)) {
            $user = User::findOrFail($id);
            return response()->json(['msg' => 'Data retrieved', 'data' => $user], 200);
        } else {
            $user = User::get();
            return response()->json(['msg' => 'Data retrieved', 'data' => $user], 200);
        }
    }
}
