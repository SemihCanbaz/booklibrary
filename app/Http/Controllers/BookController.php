<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function createBooks()
    {
        $books = Book::factory()->count(10)->create();

        return $books;
    }
    
    public function index()
    {
        $books = Book::get();
    
        return view('books.index', compact('books'));
    }

    public function create(){

        return view ('books.create');
  
    }
   
    public function store(BookRequest $request)
    {
        $book = Book::create($request->validated());
    
        return redirect()->route('books.index')->with('success', 'Kitap başarıyla eklendi.');
    }
    

    public function edit($id){
        $book = Book::findOrFail($id);
        return view('books.edit');
    }

 
    

}
