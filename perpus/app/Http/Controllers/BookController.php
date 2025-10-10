<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Visitor;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(Request $request, $id)
    {
        $ip = $request->ip();
        // $id = $request->id;

        if (!Visitor::where('ip_address', $ip)->exists()) {
            Visitor::create(['ip_address' => $ip]);
        }

        $book = Book::find($id);
        $book->jumlah_view += 1;
        $book->save();
        return view('baca-buku', compact('book'));
    }
}