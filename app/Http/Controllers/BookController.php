<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
    
        return view('books.index', compact('books'));
    }

    public function create(){

        return view ('books.create');
  
    }
   
    public function store(BookRequest $request)
    {
        $validated = $request->validated();
    
        $book = Book::create($validated);

        dd($book);

        $book->save();
    
        return redirect()->route('books.index')->with('success', 'Kitap başarıyla eklendi.');

    }

    public function uploadPhoto(Request $request)
    {
        // Fotoğrafı yükleme işlemleri
        if ($request->hasFile('photo')) {
            dd(123);
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $filename);
            
            // Fotoğrafı veritabanına kaydet
            $photoModel = new Photo();
            $photoModel->filename = $filename;
            $photoModel->save();

            return redirect()->back()->with('success', 'Fotoğraf başarıyla yüklendi!');
        }
        return redirect()->back()->with('danger','Fotoğraf yüklenemedi');
    }
    
    

}
