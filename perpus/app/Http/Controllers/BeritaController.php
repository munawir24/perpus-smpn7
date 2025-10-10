<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Visitor;
use App\Models\Category;
use Jorenvh\Share\Share;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();

        if (!Visitor::where('ip_address', $ip)->exists()) {
            Visitor::create(['ip_address' => $ip]);
        }
        $now = Visitor::whereDate('created_at', Carbon::today())->get();
        $dayCount = count($now);
        $visitorCount = Visitor::count();
        $kategori = Category::all();
        $data = Post::with('category')->where('status', 1)->lazyById();
        return view('berita', compact('data', 'kategori', 'visitorCount', 'dayCount'));
    }
    public function baca(Request $request, $id)
    {
        $ip = $request->ip();
        $edit = Post::where('slug', '=', $id)->first();
        $edit->view += 1;
        $edit->save();
        if (!Visitor::where('ip_address', $ip)->exists()) {
            Visitor::create(['ip_address' => $ip]);
        }
        $kategori = Category::all();
        $data = Post::with('category')->where('slug', '=', $id)->first();

        $shareComponent = \Share::page(route('baca-berita', $data->slug))
            ->facebook()
            ->twitter()
            ->telegram()
            ->whatsapp();
        return view('baca-berita', compact('data', 'kategori', 'shareComponent'));
    }
}