<?php

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Video;
use App\Models\Galery;
use App\Models\Landing;
use App\Models\Visitor;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ExportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('beranda');
// });
Route::get('/', function (Request $request) {
    $ip = $request->ip();

    if (!Visitor::where('ip_address', $ip)->exists()) {
        Visitor::create(['ip_address' => $ip]);
    }
    $sertifikat = Sertifikat::where('status', 1)->get();
    $book = Book::where('is_publish', 1)->where('is_popular', 1)->get();
    $landing = Landing::where('status', 1)->get();
    $galery = Galery::where('status', 1)->where('pin', 1)->get();

    return view('beranda', compact('landing', 'galery', 'sertifikat', 'book'));
});
Route::get('/buku', function (Request $request) {
    $ip = $request->ip();

    if (!Visitor::where('ip_address', $ip)->exists()) {
        Visitor::create(['ip_address' => $ip]);
    }

    $query = $request->get('search');

    $book = Book::when($query, function ($q) use ($query) {
        $q->where('judul', 'like', "%{$query}%");
    })->get();

    return view('buku', compact('book'))->render();
});
Route::get('/list-buku', function (Request $request) {
    $query = $request->get('search');

    $book = Book::when($query, function ($q) use ($query) {
        $q->where('judul', 'like', "%{$query}%");
    })->get();

    return view('list-buku', compact('book'))->render();
});
Route::get('/baca-buku/{id}', [BookController::class, 'show'])->name('baca-buku');
// Route::get('/profile', function (Request $request) {
//     $ip = $request->ip();

//     if (!Visitor::where('ip_address', $ip)->exists()) {
//         Visitor::create(['ip_address' => $ip]);
//     }
//     $sertifikat = Sertifikat::where('status', 1)->get();
//     return view('profile', compact('sertifikat'));
// });
// Route::get('/galery', function (Request $request) {
//     $ip = $request->ip();

//     if (!Visitor::where('ip_address', $ip)->exists()) {
//         Visitor::create(['ip_address' => $ip]);
//     }
//     $images = Galery::where('status', 1)->get();
//     $videos = Video::where('status', 1)->orderBy('updated_at', 'desc')->get();
//     return view('galery', compact('images', 'videos'));
// });
// Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
// Route::get('/berita/{id}', [BeritaController::class, 'baca'])->name('baca-berita');
// Route::get('/export-formulir/{id}', [ExportController::class, 'formulir'])->name('export-formulir');
