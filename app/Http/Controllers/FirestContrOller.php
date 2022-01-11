<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirestContrOller extends Controller
{
    public function check(Request $request)
    {
        return response()->json(['message'=>'Success']);
    }
}
