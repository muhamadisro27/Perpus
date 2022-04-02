<?php 

namespace App\Http\Services\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Interfaces\Auth\AuthInterface;


class AuthService {

   public function __construct(AuthInterface $auth)
   {
      $this->auth = $auth;
   }

   public function register($request)
   {  
      try {
         $user = $this->auth->register($request);

         $token = $user->createToken('myapptoken')->plainTextToken;

         $response = [
            'status' => 'success',
            'message' => 'Terima kasih telah mendaftar!',
            'user' => $user,
            'token' => $token
         ];
      } catch (\Throwable $th) {
         $response = [
            'status' => 'failed',
            'message' => $th->getMessage()
         ];
      }
     
      return response()->json($response);
   }

   public function login($request)
   {
      try {
         $user = $this->auth->login($request);

         if(!$user || !Hash::check($request['password'], $user->password)){
            return response([
               'message' => 'Password tidak sesuai dengan data kami!',
            ],401);
         }

         $token = $user->createToken('myapptoken')->plainTextToken;

         $response = [
            'status' => 'success',
            'message' => 'Berhasil Login!',
            'user' => $user,
            'token' => $token
         ];

      } catch (\Throwable $th) {
         $response = [
            'status' => 'failed',
            'message' => $th->getMessage()
         ];
      }
      return response()->json($response);
   }
}


?>