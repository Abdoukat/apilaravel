<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiResourceController extends Controller
{
    //

    public function getMessage(string $id = null) {
        return response()->json(['Value 1' => 'Message number '.$id]);
        // if ($id) {
        //     return response()->json(['message' => 'Message with ID ' . $id]);
        // } else {
        //     return response()->json(['message' => 'No ID provided, displaying all messages']);
        // }
    }
}
