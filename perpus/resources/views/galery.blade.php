@extends('layouts.guest')

@section('title')
    Galery PT. Najah Hurrahman
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
            aspect-ratio: 1/1;
            /* height: 100%; */
            /* height: 50vh; */
            /* Sesuaikan tinggi */
            /* object-fit: cover; */
            object-fit: contain;
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
                width: 50%;
                aspect-ratio: 1/1;
                /* height: 100%; */
                /* height: 50vh; */
                /* Sesuaikan tinggi */
                /* object-fit: cover; */
                object-fit: contain;
                border-radius: 10px;
            }
        }

        /* video.iframe { */
        /* width: 50%; */
        /* aspect-ratio: 1/1; */
        /* height: 100%; */
        /* height: 50vh; */
        /* Sesuaikan tinggi */
        /* object-fit: cover; */
        /* object-fit: contain; */
        /* border-radius: 10px; */
        /* } */

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
    </style>
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row">
            <!-- /.col-md-12 -->
            <div class="col-lg-12">
                <div class="mt-2 card"
                    style="background: rgba(255, 255, 255, 0.768); font-family: Arial; font-size: clamp(12pt, 1.5vw, 14pt);">
                    <div class="card-body" style="text-align: justify;">
                        <center>
                            <h2>Galery Foto</h2>
                        </center>
                        <div class="tumbnail justify-content-center">
                            @foreach ($images as $im)
                                <img src="{{ asset('najahhurrahman/najahhurrahman/' . $im->file) }}" alt="galery"
                                    class="tumbnail-img">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mt-2 card"
                    style="background: rgba(255, 255, 255, 0.768); font-family: Arial; font-size: clamp(12pt, 1.5vw, 14pt);">
                    <div class="card-body" style="text-align: justify;">
                        <center>
                            <h2>Galery video</h2>
                        </center>
                        <div class="container-video">
                            @foreach ($videos as $vd)
                                @php
                                    if (!empty($vd->file)) {
                                        echo '<div class="embed"><video src="' .
                                            asset('najahhurrahman/najahhurrahman/' . $vd->file) .
                                            '" controls></video> <h5>' .
                                            $vd->title .
                                            '</h5><div>' .
                                            \Carbon\Carbon::parse($vd->created_at)->translatedFormat('d F Y') .
                                            '</div></div>';
                                    } else {
                                        echo '<div class="embed">' .
                                            $vd->content .
                                            '<h5>' .
                                            $vd->title .
                                            '</h5><div>' .
                                            \Carbon\Carbon::parse($vd->created_at)->translatedFormat('d F Y') .
                                            '</div></div>';
                                    }
                                @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
    </div>
@endsection

@section('script')
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
