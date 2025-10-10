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

        /* Container untuk blog posts */
        .blog-posts {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* Default: 3 card per baris */
            gap: 20px;
            /* Jarak antar card */
            padding: 10px;
        }

        /* Styling untuk setiap blog card */
        .blog-card {
            height: 158px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .blog-card:hover {
            transform: translateY(-10px);
        }

        .blog-card img,
        .blog-card figure,
        .blog-card a {
            visibility: hidden;
            display: none;
        }

        .blog-card h2 {
            /* font-size: 1.5rem; */
            font-size: clamp(1rem, 1.5vw, 1.3rem);
            /* font-weight: bold; */
            margin: 5px 5px 5px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .blog-card p:first-of-type {
            font-size: clamp(11pt, 1.5vw, 13pt);
            margin: 0 5px 5px;
            color: #666;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .blog-card p:not(:first-of-type) {
            display: none;
        }


        a .link-berita {
            visibility: visible;
            display: block;
            margin: 0 15px 15px;
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .blog-card button {
            display: inline-block;
            margin: 0 5px 5px;
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
            border: none;
            background-color: transparent;
        }

        .blog-card a:hover {
            text-decoration: underline;
        }

        .tumbnail {
            display: flex;
            width: 100%;
            height: 100%;
        }

        .justify-content-center {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 5px;
        }

        .tumbnail-img {
            width: 100%;
            /* height: 75px; */
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 2px;
        }

        .thumbnail-img img {
            width: 100%;
            aspect-ratio: 1/1;
            /* height: 100%; */
            /* height: 50vh; */
            /* Sesuaikan tinggi */
            object-fit: cover;
            /* object-fit: contain; */
            border-radius: 10px;
        }

        /* Media Queries untuk Responsiveness */
        @media (max-width: 1024px) {

            /* Tablet: 2 card per baris */
            .blog-posts {
                grid-template-columns: 1fr;
            }

            /* .tumbnail-img {
                                width: 75px;
                                height: 75px;
                            } */
        }

        @media (max-width: 768px) {
            .blog-nav ul {
                grid-template-columns: 1fr;
                /* 1 kolom saja */
            }

            /* HP: 1 card per baris */
            .blog-posts {
                grid-template-columns: 1fr;
            }

            /* .tumbnail-img {
                                width: 75px;
                                height: 75px;
                            } */

        }
    </style>
@endsection

@section('content')
    <div class="container mt-2">
        <div class="container">
            <nav class="blog-nav">
                <ul>
                    <li><a href="#" class="active" data-category="semua">Semua</a></li>
                    @foreach ($kategori as $kg)
                        <li><a href="#" data-category="{{ $kg->slug }}">{{ $kg->name }}</a></li>
                    @endforeach
                </ul>
            </nav>
        </div>

        <main class="container">
            <section class="blog-posts">
                @foreach ($data as $dt)
                    <article class="blog-card" data-category="{{ $dt->category->slug }}">
                        <div class="p-2 row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-3">
                                <div class="tumbnail">
                                    {{-- @foreach ($dt->getMedia('img') as $media)
                                        <img src="{{ $media->getUrl() }}" alt="{{ $dt->title }}" class="tumbnail-img"
                                            style="visibility: visible; display: block;">
                                    @endforeach --}}
                                    @if ($media = $dt->getMedia('img')->first())
                                        <img src="{{ $media->getUrl() }}" alt="{{ $dt->title }}" class="tumbnail-img"
                                            style="visibility: visible; display: block;">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-9">
                                <h2>{{ $dt->title }}</h2>
                                {!! str($dt->content)->sanitizeHtml() !!}
                                <a href="{{ route('baca-berita', $dt->slug) }}" class="link-berita"
                                    style="display: block; visibility: visible;margin: 0 5px 5px;color: #3498db;text-decoration: none;font-weight: bold; align-items: end; position: absolute;">Baca
                                    Selengkapnya . . .</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </section>
        </main>
    </div>
@endsection



@section('script')
    <script>
        // Filter blog posts by category
        document.addEventListener('DOMContentLoaded', function() {
            const categoryLinks = document.querySelectorAll('.blog-nav ul li a');
            const blogCards = document.querySelectorAll('.blog-card');
            0

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
        document.querySelectorAll('.blog-card').forEach(card => {
            let paragraphs = card.querySelectorAll('p');
            paragraphs.forEach((p, index) => {
                if (index !== 0) p.style.display = 'none';
            });
        });
    </script>
@endsection
