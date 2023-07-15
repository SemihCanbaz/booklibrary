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
        $books = Book::orderBy('id')->get();

        // Verileri sıfırdan başlayarak yeniden numaralandırma işlemi
        $books = $books->map(function ($book, $key) {
            $book->id = $key + 1;
            return $book;
        });
    
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
        return view('books.edit', compact('book'));
    }

    public function delete($id){
        $book = Book::findOrFail($id)->delete();
        return redirect()->route('books.index')->with('success', 'Kitap başarıyla silindi . ');
    }

    public function update(BookRequest $request , $id)
    {
        $book = Book::findOrFail($id);
        $book->name = $request->name;
        $book->page_count = $request->page_count;
        $book->date = $request->date;
        $book->writer = $request->writer;
        $book->save();

    
        return redirect()->route('books.index')->with('success', 'Kitap başarıyla güncellendi . ');
    }

 
    

}
