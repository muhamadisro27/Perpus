<?php 

namespace App\Http\Interfaces\Book;

interface BookInterface {
   public function index();
   // public function show();
   public function store($data);
   public function update($data,$book);
   public function destroy($data);
}

?>