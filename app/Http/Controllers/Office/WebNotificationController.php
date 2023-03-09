<?php

namespace App\Http\Controllers\Office;

use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use App\Models\User;

class WebNotificationController extends BackendController
{
    public function store(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->web_token = $request->token;
        $user->save();
        return response()->json(['Token successfully stored.']);
    }
}
