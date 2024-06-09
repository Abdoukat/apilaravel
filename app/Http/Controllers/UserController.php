<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function createUser(Request $request)
    {
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = $request->password;
        $result = $newUser->save();
        if ($result) {
            # code...
            return response()->json(['Message' => $newUser->name.' Created successfully']);
        }
        return response()->json(['Message' => 'There was a problem']);
    }
}
