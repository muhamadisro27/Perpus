<?php 

namespace App\Http\Repository\Auth;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use App\Http\Interfaces\Auth\AuthInterface;

class AuthRepository implements AuthInterface {

   public function __construct(User $user, Profile $profile)
   {
      $this->user = $user;
      $this->profile = $profile;
   }

   public function register($data)
   {
      DB::beginTransaction();

      $profile = $this->profile::create([
         'name' => $data->username,
      ]);

      $user = $this->user::create([
         'profile_id' => $profile->id,
         'username' => $data->username,
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