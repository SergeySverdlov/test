<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::all();
        return response()->json(['users' => $users], JsonResponse::HTTP_OK);
    }

    public function getUser($id)
    {
        $user = User::find($id);
        if ($user){
            return response()->json(['user' => $user], JsonResponse::HTTP_OK);
        } else {
            return response()->json(['message' => 'Пользователь не найден!'], JsonResponse::HTTP_NO_CONTENT);
        }
    }
}
