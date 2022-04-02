<?php 


namespace App\Http\Repository\Book;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use App\Http\Interfaces\Book\BookInterface;

class BookRepository implements BookInterface {
   
   public function __construct(Book $book)
   {
      $this->book = $book;
   }

   public function index()
   {
      try {
         DB::beginTransaction();

         $data = Book::latest()->paginate(10);
 
         DB::commit();

         $response = [
            'status' => 'success',
            'data' => $data,
         ];
      } catch (\Throwable $th) {
         DB::rollBack();

         $response = [
            'status' => 'failed',
            'message' => $th->getMessage()
         ];
      }
      return $response;
   }
}


?>