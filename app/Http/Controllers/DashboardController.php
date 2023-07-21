<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $books = Book::take(5)->get();
        } else {
            $books = Book::OfOwnedByUser($user->id)->get();
        }
        return view('dashboard', compact('books'));
    }
}
