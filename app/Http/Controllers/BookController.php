<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
   
    public function index()
    {        
        $user = Auth::user();

    if ($user->hasRole('admin')) {
        $books = Book::orderBy('id')->get()->all();
    } else {
        $books = Book::OfOwnedByUser($user->id)->get();
    }

    return view('books.index', compact('books'));   
    }

    public function create()
    {
        return view ('books.create');
    }

    public function store(BookRequest $request)
    {
        $validated = $request->validated();

        $book = Book::create([
            'user_id' => Auth::user()->id,
            'name' => $validated['name'],
            'page_count' => $validated['page_count'],
            'date' => $validated['date'],
            'writer' => $validated['writer']
        ]);
    
        return redirect()->route('books.index')->with('success', 'Kitap başarıyla eklendi.');
    }
    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
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

 

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();


        return redirect()->route('books.index')->with('success', 'Kitap başarıyla silindi . ');
    }


    public function createBooks()
    {
        $books = Book::factory()->count(5)->create();
        
        return redirect()->route('books.index')->with('success', 'Kitaplar başarıyla oluşturuldu.');
        
    }
    
  
}

 