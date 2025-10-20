@extends('layouts.guest')

@section('title')
    Baca Buku {{ Str::title($book->judul) }}
@endsection
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="mt-2 mb-2 card" style="background: #f8fdffa7">
                    <div class="m-1 row justify-content-center">
                        <div class="mb-2 col-md-3 col-sm-4 col-12">
                            <img src="{{ asset('perpus/smpn7/' . $book->cover) }}"
                                alt="{{ asset('perpus/smpn7/' . $book->cover) }}" style="width: 100%; border-radius: 5px;">
                            <div class="mt-1 row">
                                <div class="col-5">Judul</div>
                                <div class="col-7">: {{ Str::title($book->judul) }}</div>
                            </div>
                            <div class="mt-1 row">
                                <div class="col-5">Penulis</div>
                                <div class="col-7">: {{ Str::title($book->penulis) }}</div>
                            </div>
                            <div class="mt-1 row">
                                <div class="col-5">Penerbit</div>
                                <div class="col-7">: {{ Str::title($book->penerbit) }}</div>
                            </div>
                            <div class="mt-1 row">
                                <div class="col-5">Tahun Terbit</div>
                                <div class="col-7">: {{ Str::title($book->tahun_terbit) }}</div>
                            </div>
                            <div class="mt-1 row">
                                <div class="col-5">Jlh. Halaman</div>
                                <div class="col-7">: {{ Str::title($book->jumlah_halaman) }} hlm.</div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8 col-12">
                            {{-- <object data="{{ asset('perpus/smpn7/' . $book->lampiran) }}" width="100%"></object> --}}
                            {{-- @if ($book->lampiran == null)
                                <iframe src="{{ $book->link }}"
                                    style="width: 100%; height:80vh; border-radius: 5px;"></iframe>
                            @else
                                <iframe src="{{ asset('perpus/smpn7/' . $book->lampiran) }}"
                                    style="width: 100%; height:80vh; border-radius: 5px;"></iframe>
                            @endif --}}
                            {{-- Versi tampilan besar (PC/tablet) → tampil iframe --}}
                            <div class="d-none d-md-block">
                                @if ($book->lampiran == null)
                                    <iframe src="{{ $book->link }}"
                                        style="width: 100%; height:80vh; border-radius: 5px;"></iframe>
                                @else
                                    <iframe src="{{ asset('perpus/smpn7/' . $book->lampiran) }}"
                                        style="width: 100%; height:80vh; border-radius: 5px;"></iframe>
                                @endif
                            </div>

                            {{-- Versi HP (col-12) → tampil tombol buka buku --}}
                            <div class="mt-3 text-center d-block d-md-none">
                                @if ($book->lampiran == null)
                                    <a href="{{ $book->link }}" target="_blank" class="btn btn-primary">
                                        📖 Baca Buku
                                    </a>
                                @else
                                    <a href="{{ asset('perpus/smpn7/' . $book->lampiran) }}" target="_blank"
                                        class="btn btn-primary">
                                        📖 Baca Buku
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
