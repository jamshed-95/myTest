<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request){
        #http://localhost/myTest/public/api/register?name=jamshed&login=abdu&password=123456&email=jamshed@mail.ru&phone=928933320
        try {
             User::create(array_merge(
                $request->only('name', 'login','email','phone'),
                ['password' => Hash::make($request->password)]
            ));
            return response()->json([
                'message' => 'You were successfully registered. Use your login and password to sign in.'
            ], 200);
        }catch (QueryException $exception){
            if ($exception->errorInfo[1]==1062){
                return response()->json([
                    'message' => 'filed.'
                ], 401);
            }
        }
    }
}
