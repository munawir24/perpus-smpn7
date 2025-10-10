@extends('layouts.guest')

@section('title')
    Berita PT. Najah Hurrahman
@endsection

@section('css')
    <style>
        /* Styling untuk blog-nav */
        .blog-nav ul {
            list-style: none;
            padding: 0;
            margin: 20px 0 0;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            /* Membuat li turun ke bawah jika tidak cukup space */
        }

        .blog-nav ul li {
            border: 1px solid black;
            margin: 2px;
            border-radius: 5px;
        }

        .blog-nav ul li a {
            color: #000000;
            text-decoration: none;
            font-size: 1.1rem;
            padding: 0px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .blog-nav ul li a.active,
        .blog-nav ul li a:hover {
            background-color: #FFD500;
        }

        .tumbnail {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            max-width: 80%;
            /* padding: 10px; */
            margin: auto;
        }

        .justify-content-center {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 5px;
        }

        .tumbnail-img {
            /* background: #fff; */
            width: 100%;
            aspect-ratio: 1/1;
            margin: 0px;
            padding: 0px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .thumbnail-img img {
            /* height: 33vw; */
            border: none;
            border-radius: 10px;
            object-fit: cover;
        }

        div#social-links {
            margin: 5px auto;
            max-width: auto;
        }

        div#social-links ul {
            display: flex;
            justify-content: flex-end;
            /* Mengatur semua item ke kanan */
            padding: 0;
            margin: 0;
        }

        div#social-links ul li {
            display: inline-flex;
            align-items: center;
            margin: 0 5px;
            list-style: none;
            /* Menghilangkan bullet point */
        }

        div#social-links ul li a {
            position: relative;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 50%;
            margin: 1px;
            /* font-size: clamp(15px, 1.5vw, 20px); */
            color: #222;
            width: 40px;
            height: 40px;
            text-align: center;
            background-color: #ccc;
            overflow: hidden;
            /* Untuk memastikan animasi tidak keluar dari area tombol */
            text-decoration: none;
            /* Menghilangkan underline pada link */
            transition: color 0.3s ease;
            /* Animasi perubahan warna teks */
        }


        div#social-links ul li a::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 0;
            background-color: rgba(0, 0, 0, 0.5);
            /* Warna gelap dengan transparansi */
            transition: height 0.3s ease;
            /* Animasi ketinggian */
            z-index: 1;
        }

        div#social-links ul li a:hover::before {
            border-radius: 50%;
            height: 100%;
            /* Mengisi seluruh tombol saat hover */
        }

        div#social-links ul li a:hover {
            border-radius: 50%;
            color: #fff;
            background-color: rgba(48, 48, 48, 0.082);
            /* Mengubah warna teks saat hover */
        }

        div#social-links ul li a i {
            position: relative;
            border-radius: 50%;
            z-index: 2;
            /* Memastikan ikon berada di atas animasi */
        }

        .fa-facebook-square {
            color: rgb(24, 115, 235)
        }

        .fa-twitter {
            color: rgb(0, 132, 255)
        }

        .fa-telegram {
            color: rgb(0, 183, 255)
        }

        .fa-whatsapp {
            color: green;
        }

        @media (max-width: 1024px) {
            .tumbnail {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                max-width: 60%;
                /* margin: auto; */
            }
        }

        @media (max-width: 768px) {
            .tumbnail {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                max-width: 100%;
                /* margin: none; */
            }
        }
    </style>
@endsection

@section('content')
    <div class="container mt-2">
        <div class="container">
            <nav class="blog-nav">
                <ul>
                    <li><a href="{{ route('berita') }}">Semua</a></li>
                    @foreach ($kategori as $kg)
                        <li><a href="{{ route('berita') }}" class="{{ $kg->slug == $data->category->slug ? 'active' : '' }}"
                                data-category="{{ $kg->slug }}">{{ $kg->name }}</a></li>
                    @endforeach
                </ul>
            </nav>
        </div>

        <main class="container">
            <div class="mt-2 card" style="background: rgba(255, 255, 255, 0.768); font-family: Arial; font-size: 14pt; width: 100%;">
                <div class="text-center card-header" style="border-bottom: none"><b>{{ Str::title($data->title) }}</b>
                </div>
                <div class="card-body" style="text-align: justify;">
                    <p style="text-align: right">
                        <small>{{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('l, d F Y') }}</small>
                    </p>
                    {{-- {!! clean($data->content) !!} --}}
                    <div class="tumbnail">
                        @foreach ($data->getMedia('img') as $media)
                            <div class="tumbnail-img">
                                <img src="{{ $media->getUrl() }}" alt="{{ $data->title }}" class="tumbnail-img">
                            </div>
                        @endforeach
                    </div>
                    <br>
                    {{-- {!! str($data->content)->sanitizeHtml() !!} --}}
                    {!! $data->content !!}
                </div>
                <div class="card-footer" style="border-top: none">
                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12">
                                    <i class="fas fa-eye"
                                        style="background-color: #ccc; border-radius: 50%;
                                     text-align: center; vertical-align: middle;width: 40px; height: 40px;
                                    margin: 3px; padding: 10px;"></i>{{ $data->view }}
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            {!! $shareComponent !!}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection


@section('script')
    {{-- <script>
        // Filter blog posts by category
        document.addEventListener('DOMContentLoaded', function() {
            const categoryLinks = document.querySelectorAll('nav ul li a');
            const blogCards = document.querySelectorAll('.blog-card');

            categoryLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const category = this.getAttribute('data-category');

                    // Remove active class from all links
                    categoryLinks.forEach(link => link.classList.remove('active'));
                    // Add active class to the clicked link
                    this.classList.add('active');

                    // Filter blog cards
                    blogCards.forEach(card => {
                        if (category === 'semua' || card.getAttribute('data-category') ===
                            category) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script> --}}
@endsection
