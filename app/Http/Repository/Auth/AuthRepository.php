<?php 

namespace App\Http\Repository\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Interfaces\Auth\AuthInterface;

class AuthRepository implements AuthInterface {

   public function __construct(User $user)
   {
      $this->user = $user;
   }

   public function register($data)
   {
      DB::beginTransaction();

      $user = $this->user::create([
         'name' => $data->name,
         'email' => $data->email,
         'password' => bcrypt($data->password)
      ]);
      DB::commit();

      return $user;
   }

   public function login($data)
   {
      DB::beginTransaction();

      $user = $this->user::where('email' , $data['email'])->first();

      DB::commit();

      return $user;
   }

}


?>