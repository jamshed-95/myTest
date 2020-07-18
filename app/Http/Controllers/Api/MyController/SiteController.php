<?php

namespace App\Http\Controllers\Api\MyController;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function __invoke(Request $request){



        $token = Auth::user()->createToken(config('app.name'));
        $token->token->save();



        return response()->json([
            'token_type' => 'Bearer',
            'token' => $token->accessToken,
            'expires_at' => Carbon::parse($token->token->expires_at)->toDateTimeString()
        ], 200);


    }
}
