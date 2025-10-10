@extends('layouts.guest')

@section('title')
    Perpustakaan Pelangi SMP Negeri 7 Arut Selatan
@endsection

@section('css')
    <style>
        .tumbnail {
            display: flex;
            width: 100%;
            height: 100%;
        }

        .justify-content-center {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            /* gap: 5px; */
        }

        .tumbnail-img {
            width: 15vw;
            height: 15vw;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 5px;
        }

        .thumbnail-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slogan {
            width: 50vw;
        }

        .direktur {
            width: 10vw;
        }

        .container-video {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: auto;
        }

        .embed {
            background: #fff;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        iframe {
            width: 100%;
            /* height: 400px; */
            border: none;
            border-radius: 10px;
        }

        video {
            width: 100%;
            /* height: 400px; */
            border: none;
            border-radius: 10px;
        }

        @media (max-width: 1024px) {
            .tumbnail-img {
                width: 30vw;
                height: 30vw;
            }

            .thumbnail-img img {
                width: 100%;
                aspect-ratio: 1/1;
                /* height: 100%; */
                /* height: 50vh; */
                /* Sesuaikan tinggi */
                /* object-fit: cover; */
                object-fit: contain;
                border-radius: 10px;
            }
        }

        @media (max-width: 768px) {
            .tumbnail-img {
                width: 40vw;
                height: 40vw;
            }

            .thumbnail-img img {
                width: 100%;
                aspect-ratio: 1/1;
                /* height: 100%; */
                /* height: 50vh; */
                /* Sesuaikan tinggi */
                /* object-fit: cover; */
                object-fit: contain;
                border-radius: 10px;
            }

            .slogan {
                width: 60vw;
            }

            .direktur {
                width: 15vw;
            }
        }
    </style>
    <style>
        /* Carousel container */
        .custom-carousel {
            position: relative;
            width: 100%;
            max-width: 700px;
            /* Sesuaikan dengan kebutuhan */
            margin: auto;
            overflow: hidden;
        }

        /* Wrapper untuk item */
        .custom-carousel-inner {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        /* Setiap item slide */
        .custom-carousel-item {
            min-width: 100%;
            transition: opacity 0.5s ease-in-out;
        }

        /* Gambar dalam carousel */
        .custom-carousel-item img {
            width: 100%;
            aspect-ratio: 1/1;
            /* height: 100%; */
            /* height: 50vh; */
            /* Sesuaikan tinggi */
            /* object-fit: cover; */
            object-fit: contain;
            border-radius: 10px;
        }

        /* Tombol navigasi */
        .custom-carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 50%;
            z-index: 10;
        }

        .custom-carousel-btn:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Posisi tombol */
        .custom-prev {
            left: 10px;
        }

        .custom-next {
            right: 10px;
        }

        /* Indikator */
        .custom-carousel-indicators {
            text-align: center;
            position: absolute;
            bottom: 10px;
            width: 100%;
        }

        .custom-carousel-indicators button {
            width: 10px;
            height: 10px;
            margin: 0 5px;
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            border-radius: 50%;
            cursor: pointer;
        }

        .custom-carousel-indicators .active {
            background-color: #00ddff;
        }

        .responsive-width {
            width: 10%;
            /* default: tampilan PC */
        }

        /* Tablet (max lebar 992px) */
        @media (max-width: 992px) {
            .responsive-width {
                width: 12%;
            }
        }

        /* HP (max lebar 768px) */
        @media (max-width: 768px) {
            .responsive-width {
                width: 15%;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Container untuk slideshow -->
    {{-- <div class="container p-1 mb-3 rounded-sm" style="background-color: #FFBD59">
        <div id="myCarousel" class="rounded-sm carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img src="{{ asset('pictures/home/SLIDE01.png') }}" alt="Gambar 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('pictures/home/SLIDE022.png') }}" alt="Gambar 2">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
            </button>

            <ol class="carousel-indicators">
                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active">1</li>
                <li data-bs-target="#myCarousel" data-bs-slide-to="1">2</li>
            </ol>
        </div>
    </div> --}}

    <div class="container mt-1">
        <div class="row">
            <!-- /.col-md-12 -->
            <div class="col-lg-12">
                {{-- <div class="mt-1 card"
                    style="background: url('{{ asset('img/bg-book.jpg') }}') center repeat-y; background-size: 100%; backdrop-filter: blur(5px);; font-family: Arial; font-size: clamp(12pt, 1.5vw, 14pt); height: auto;">
                    <div id="myCarousel" class="rounded-sm custom-carousel slide" data-bs-ride="carousel">
                        <div class="custom-carousel-inner">
                            @foreach ($sertifikat as $st)
                                <div class="custom-carousel-item">
                                    <img src="{{ asset('perpus/smpn7/' . $st->file) }}" alt="Gambar {{ $st->id }}"
                                        style="width: 100%;">
                                </div>
                            @endforeach
                        </div>
                        <button class="custom-carousel-btn custom-prev" onclick="prevSlide()">❮</button>
                        <button class="custom-carousel-btn custom-next" onclick="nextSlide()">❯</button>

                        @php
                            $no = 0;
                            $no1 = 1;
                        @endphp
                        <div class="custom-carousel-indicators">
                            @foreach ($sertifikat as $str)
                                <button onclick="goToSlide({{ $no++ }})" class="active"></button>
                            @endforeach
                        </div>
                    </div>
                </div>
                <br> --}}
                <div class="mt-2 card"
                    style="background: url('{{ asset('img/bg-book.jpg') }}') center repeat-y; background-size: 100%;">
                    <center>
                        <h2 class="p-2" style="background-color: #ffffffc6">BUKU POPULER</h2>
                    </center>
                    <div class="row justify-content-center">
                        @foreach ($book as $bk)
                            <div class="m-2 border col-md-2 col-5 col-sm-3"
                                style="border-radius: 5%; background-color: #ffffffc6;">
                                <a href="{{ url('/baca-buku', $bk->id) }}" target="_blank"
                                    style="text-decoration: none; color: black; font-weight: bold;">
                                    <img src="{{ asset('perpus/smpn7/' . $bk->cover) }}" alt="{{ $bk->cover }}"
                                        style="width: 100%; border-radius: 5%; padding-top: 5px;">
                                    <div class="mb-2 text-center">{{ Str::upper($bk->judul) }}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer" style=" background-color: #ffffffc6;">
                        <div class="text-center"><a href="{{ url('/buku') }}"
                                style="text-decoration: none; color: black;"><b>Lihat semua
                                    buku . . .</b></a></div>
                    </div>
                </div>
                <div class="mt-2 card" style="background: #f8fdffa7">
                    <div class="mt-2 mb-2 row justify-content-center">
                        <img src="{{ asset('img/sekolah_ramah.png') }}" alt="" class="col-2 responsive-width">
                        <img src="{{ asset('img/sekolah_sehat.png') }}" alt=""class="col-2 responsive-width">
                        <img src="{{ asset('img/logo smp.png') }}" alt="LOGO SMP"class="col-2 responsive-width">
                        <img src="{{ asset('img/adiwiyata.png') }}" alt=""class="col-2 responsive-width">
                        <img src="{{ asset('img/narkoba.png') }}" alt=""class="col-2 responsive-width">
                    </div>
                </div>
                <div class="mt-2 card" style="background: #f8fdffa7">
                    <div class="card-body">
                        <center>
                            <h2>Galeri SMPN 7 Arut Selatan</h2>
                        </center>
                        <div class="tumbnail justify-content-center">
                            @foreach ($galery as $im)
                                <img src="{{ asset('perpus/smpn7/' . $im->file) }}" alt="galery" class="tumbnail-img">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script>
        let currentIndex = 0;

        function showSlide(index) {
            const slides = document.querySelectorAll(".custom-carousel-item");
            const indicators = document.querySelectorAll(".custom-carousel-indicators button");

            if (index >= slides.length) currentIndex = 0;
            else if (index < 0) currentIndex = slides.length - 1;
            else currentIndex = index;

            const newTransformValue = `translateX(-${currentIndex * 100}%)`;
            document.querySelector(".custom-carousel-inner").style.transform = newTransformValue;

            // Update indikator
            indicators.forEach(ind => ind.classList.remove("active"));
            indicators[currentIndex].classList.add("active");
        }

        function nextSlide() {
            showSlide(currentIndex + 1);
        }

        function prevSlide() {
            showSlide(currentIndex - 1);
        }

        function goToSlide(index) {
            showSlide(index);
        }

        // Auto-slide setiap 3 detik
        setInterval(() => {
            nextSlide();
        }, 10000);
    </script>
@endsection
