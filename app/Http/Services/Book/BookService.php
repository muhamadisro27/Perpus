<?php 

namespace App\Http\Services\Book;

use Illuminate\Support\Facades\Hash;
use App\Http\Interfaces\Auth\AuthInterface;
use App\Http\Interfaces\Book\BookInterface;


class BookService {

   public function __construct(BookInterface $book)
   {
      $this->book = $book;
   }

   public function index()
   {
      return $this->book->index();
   }

   public function store($data)
   {
      return $this->book->store($data);
   }

   public function destroy($data)
   {
      return $this->book->destroy($data);
   }


}