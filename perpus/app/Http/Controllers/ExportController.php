<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formulir($id)
    {
        $no = 1;
        $data = Pendaftaran::findOrFail($id);
        return view('export.formulir', compact('data', 'no'));
    }
}
