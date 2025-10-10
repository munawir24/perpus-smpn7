<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Najah Hurrahman</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: url('https://via.placeholder.com/1920x1080') no-repeat center center/cover;
            color: white;
            position: relative;
        }

        .hero-section .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-section .content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 150px 20px;
        }

        .btn-orange {
            background-color: #232323;
            color: gold;
        }

        .btn-orange:hover {
            background-color: #000000;
            color: rgb(255, 255, 255);
        }

        .navbar {
            background-color: #FFD500;
        }

        .navbar .nav-link {
            position: relative;
            color: #543b14;
            /* Warna default teks */
            text-decoration: none;
            /* Menghilangkan garis bawah */
            transition: color 0.3s ease;
            /* Animasi perubahan warna */
        }

        .navbar .nav-link::after {
            content: "";
            /* Membuat elemen pseudo */
            position: absolute;
            bottom: 0;
            left: 50%;
            /* Posisi awal di tengah */
            transform: translateX(-50%);
            width: 0;
            height: 5px;
            /* Tinggi border */
            background-color: #996515;
            /* Warna border */
            border-radius: 10px;
            /* Membuat radius */
            transition: width 0.3s ease;
            /* Animasi lebar */
        }

        .navbar .nav-link:hover {
            color: #000000;
            /* Warna saat hover */
        }

        .navbar .nav-link:hover::after {
            width: 100%;
            /* Lebar penuh saat hover */
        }

        .navbar .nav-link.active::after {
            width: 80%;
            /* Border bawah penuh */
            background-color: #000000;
            /* Warna border */
        }
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }

        .carousel-indicators {
            display: flex;
            justify-content: center;
        }

        .carousel-indicators li {
            background-color: #888;
            border-radius: 50%;
            width: 12px;
            height: 12px;
            margin: 0 6px;
            border: 2px solid rgb(45, 255, 3);
            /* Untuk memberikan garis putih di sekitar setiap lingkaran */
            cursor: pointer;
        }
    </style>
</head>

<body style="background-color: #FAFAD2;">
    <nav class="navbar navbar-expand-lg nav-fixed">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.jpg') }}" alt="LOGO NH" class=""
                    style="width: 60px; border-radius: 50%; border: 2px solid black;">
                <b>NAJAH HURRAHMAN</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarNav">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Program</a></li>
                </ul>
                <a href="#" class="btn btn-orange ms-3">Login</a>
            </div>
        </div>
    </nav>

    <div class="hero-section">
        <div class="overlay"></div>
        <div class="content">
            <h1 class="display-4 fw-bold">Program Umrah<br> Menghapus Dosa</h1>
            <p class="lead mt-4">Rasulullah SAW pernah bersabda: "Antara umroh yang satu dan umroh lainnya, itu akan
                menghapuskan dosa di antara keduanya. Dan haji mabrur tidak ada balasannya melainkan surga." (HR Bukhari
                dan Muslim)</p>
            <a href="#" class="btn btn-orange mt-4">Lihat Paket Umroh</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
