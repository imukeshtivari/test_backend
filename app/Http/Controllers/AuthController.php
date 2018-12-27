<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller {

  public function register() {
    try {

      $data = request(['name', 'email', 'password']);

      $user = new User;
      $user->role = 'user';
      $user->name = $data['name'];
      $user->email = $data['email'];
      $user->password = bcrypt($data['password']);
      $user->save();

      return response()->json([
        "user" => $user,
        "status" => 200
      ]);

    } catch(\Exception $ex) {
      return response()->json([
        "message" => $ex->getMessage(),
        "status" => 400
      ], 400);
    }
  }

  public function login() {
    $credentials = request(['email', 'password']);

    if (!$token = auth('api')->attempt($credentials)) {
      return response()->json(['error' => 'Unauthorized'], 401);
    }

    return response()->json([
                'token' => $token,
                'expires' => auth('api')->factory()->getTTL() * 60,
    ]);
  }

}
