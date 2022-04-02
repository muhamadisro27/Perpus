<?php 

namespace App\Http\Interfaces\Auth;


interface AuthInterface {
   public function register($data);
   public function login($data);
}

?>