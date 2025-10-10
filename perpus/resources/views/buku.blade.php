@extends('layouts.guest')

@section('title')
    Buku Perpustakaan Pelangi SMPN 7 ARSEL
@endsection
@section('content')
    <div class="container">
        {{-- <div class="card">
            <div class="row">
                <center>
                    <h2 class="pt-2">Buku Populer</h2>
                </center>
                <div class="row justify-content-center">
                    @foreach ($book as $bk)
                        @if ($bk->is_popular == 1)
                            <div class="m-2 border col-2" style="border-radius: 5%">
                                <a href="{{ url('/baca-buku', $bk->id) }}" target="_blank"
                                    style="text-decoration: none; color: black; font-weight: bold;">

                                    <img src="{{ asset('perpus/smpn7/' . $bk->cover) }}" alt="{{ $bk->cover }}"
                                        style="width: 100%; border-radius: 5%; padding-top: 5px;">
                                    <div class="mb-2 text-center">{{ Str::upper($bk->judul) }}</div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="row">
                <center>
                    <h2 class="pt-2">Buku Lainnya</h2>
                </center>
                <div class="row justify-content-center">
                    @foreach ($book as $bk)
                        @if ($bk->is_popular == 0)
                            <div class="m-2 border col-2" style="border-radius: 5%">
                                <img src="{{ asset('perpus/smpn7/' . $bk->cover) }}" alt="{{ $bk->cover }}"
                                    style="width: 100%; border-radius: 5%; padding-top: 5px;">
                                <div class="mb-2 text-center"><a href="{{ url('/baca-buku', $bk->id) }}" target="_blank"
                                        style="text-decoration: none; color: black; font-weight: bold;">{{ $bk->judul }}</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div> --}}

        {{-- <div id="book-list">
            <div class="mt-3 mb-3 row justify-content-center">
                <div class="mt-3 col-md-5 col-10">
                    <input type="text" id="search" class="form-control" placeholder="Ketik untuk mencari judul buku...">
                </div>
            </div>
            <div class="card"
                style="background: url('{{ asset('img/bg-book.jpg') }}') center repeat-y; background-size: 100%;">
                <div class="row">
                    <center>
                        <h2 class="p-2" style="background-color: #ffffffc6">Semua Buku</h2>
                    </center>
                    <div class="row justify-content-center">
                        @foreach ($book as $bk)
                            <div class="m-2 border col-md-2 col-6 col-sm-3"
                                style="border-radius: 5%; background-color: #ffffffc6">
                                <a href="{{ url('/baca-buku', $bk->id) }}" target="_blank"
                                    style="text-decoration: none; color: black; font-weight: bold;">
                                    <img src="{{ asset('perpus/smpn7/' . $bk->cover) }}" alt="{{ $bk->cover }}"
                                        style="width: 100%; border-radius: 5%; padding-top: 5px;">
                                    <div class="mb-2 text-center">{{ Str::upper($bk->judul) }}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}
        @include('list-buku')
    </div>
@endsection
@section('script')
    
@endsection
