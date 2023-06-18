<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublishController extends Controller
{
    public function detail(){
        $famous = detail::get();
        return view('home');
    }
}
