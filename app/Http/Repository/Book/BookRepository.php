<?php 


namespace App\Http\Repository\Book;

use App\Models\Book;
use Ramsey\Uuid\Uuid;
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

   public function store($data)
   {
      try {
         DB::beginTransaction();

         $book = Book::create([
            'uuid' => Uuid::uuid1(),
            'category_books_id' => $data->category_books_id,
            'publisher_books_id' => $data->publisher_books_id,
            'title' => $data->title,
            'slug' => str()->slug($data->title),
            'synopsis' => $data->synopsis,
            'author' => $data->author,
            'total_page' => $data->total_page,           
            'total_stock' => $data->total_stock,
            'publish_year' => $data->publish_year,           
        ]);

         DB::commit();

         $response = [
            'status' => 'success',
            'message' => 'Berhasil menambahkan data!',
            'data' => $book,
         ];
      } catch (\Throwable $th) {
         $response = [
            'status' => 'failed',
            'message' => $th->getMessage(),
         ];
      }
      return $response;
   }
}


?>