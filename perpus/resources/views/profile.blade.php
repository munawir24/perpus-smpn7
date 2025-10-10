@extends('layouts.guest')

@section('title')
    Profile PT. Najah Hurrahman
@endsection

@section('css')
    <style>
        /* Carousel container */
        .custom-carousel {
            position: relative;
            width: 100%;
            max-width: 500px;
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
            width: 50%;
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
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
            border-radius: 50%;
            cursor: pointer;
        }

        .custom-carousel-indicators .active {
            background-color: #FFD500;
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
                            <h2>Profile</h2>
                        </center>
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-sm-8 col-12">
                                <div class="row">
                                    <div class="col-4">NAMA</div>
                                    <div class="col-8">: <b>PT. NAJAH HURRAHMAN</b></div>
                                </div>
                                <div class="row">
                                    <div class="col-4">NOMOR SK</div>
                                    <div class="col-8">: PPIU-135-0225 & PIHK-028-0225</div>
                                </div>
                                <div class="row">
                                    <div class="col-4">TANGGAL SK</div>
                                    <div class="col-8">: 10 Februari 2025</div>
                                </div>
                                <div class="row">
                                    <div class="col-4">DIREKTUR</div>
                                    <div class="col-8">: MUHAMMAD RAKHMAN</div>
                                </div>
                                <div class="row">
                                    <div class="col-4">ALAMAT KANTOR</div>
                                    <div class="col-8">: Jl. A. Yani No. 25 Rt. 17, Kel Baru, Pangkalan Bun, Kotawaringin
                                        Barat, Kalimantan Tengah</div>
                                </div>
                                <div class="row">
                                    <div class="col-4">EMAIL</div>
                                    <div class="col-8">: najahhurrahman@yahoo.co.id</div>
                                </div>
                                <div class="row">
                                    <div class="col-4">HOTLINE</div>
                                    <div class="col-8">: <a href="http://wa.me/6282242221330" target="_blank"
                                            rel="noopener noreferrer" class="text-dark" style="text-decoration: none"><i
                                                class="fab fa-whatsapp text-success"></i> <b>+6282242221330</b></a></div>
                                </div>
                                <div class="row">
                                    <div class="col-4">AKREDITASI</div>
                                    <div class="col-8">: A</div>
                                </div>
                                <div class="row">
                                    <div class="col-4">LEMBAGA AKREDITASI</div>
                                    <div class="col-8">: KEMENAG (Kementerian Agama)</div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-12">
                                <div class="row justify-content-center">
                                    <div class="text-center col-12"><img src="{{ asset('img/rahman.jpg') }}" alt="rahman"
                                            style="height: 35vh; border: 2px double black; border-radius: 5px;">
                                        <p>MUHAMMAD RAKHMAN (DIREKTUR)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2 card"
                    style="background: rgba(255, 255, 255, 0.768); font-family: Arial; font-size: clamp(12pt, 1.5vw, 14pt); height: auto;">
                    <div id="myCarousel" class="rounded-sm custom-carousel slide" data-bs-ride="carousel">
                        <div class="custom-carousel-inner">
                            @foreach ($sertifikat as $st)
                                <div class="custom-carousel-item">
                                    <img src="{{ asset('najahhurrahman/najahhurrahman/' . $st->file) }}"
                                        alt="Gambar {{ $st->id }}" style="width: 100%;">
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
                            {{-- <button onclick="goToSlide(0)" class="active"></button>
                            <button onclick="goToSlide(1)"></button>
                            <button onclick="goToSlide(2)"></button> --}}
                        </div>
                    </div>
                </div>
                <div class="mt-2 card"
                    style="background: rgba(255, 255, 255, 0.768); font-family: Arial; font-size: clamp(12pt, 1.5vw, 14pt);">
                    <div class="card-body" style="text-align: justify;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div><b>1. Pelayanan :</b></div>
                                <ol>
                                    <li>Pendampingan Pembuatan Paspor.</li>
                                    <li>Pembuatan Visa :</li>
                                    <p>Perusahaan akan membantu dalam proses pembuatan visa umrah dan haji.</p>
                                    <li>Pemesanan Tiket Pesawat :</li>
                                    <p>Tiket pesawat pergi & pulang ke Arab Saudi akan dipesan dan diatur oleh
                                        perusahaan.
                                    </p>
                                    <li>Akomodasi :</li>
                                    <p>Penginapan selama di Mekkah dan Madinah akan disediakan, mulai dari hotel bintang
                                        3
                                        hingga bintang 5.</p>
                                    <li>Transportasi Lokal :</li>
                                    <p>Transportasi selama di Arab Saudi, seperti bus atau kendaraan pribadi, akan
                                        disediakan untuk memudahkan mobilitas jamaah.</p>
                                    <li>Pembimbing Haji dan Umrah :</li>
                                    <p>Jamaah akan didampingi oleh pembimbing yang berpengalaman untuk memberikan
                                        bimbingan
                                        ibadah dan informasi selama perjalanan.</p>
                                    <li>Manajemen Perjalanan</li>
                                    <p>Perusahaan akan mengatur seluruh rangkaian perjalanan ibadah, mulai dari
                                        keberangkatan hingga kepulangan.</p>
                                </ol>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div><b>2. Pengalaman dan Reputasi :</b></div>
                                <ul>
                                    <li>Track Record yang Baik: Dengan pengalaman yang cukup, PT. Najah Hurrahman telah
                                        membuktikan kemampuannya dalam mengelola perjalanan ibadah haji dan umrah.</li>
                                    <li>Testimoni Jamaah: Banyak jamaah yang memberikan testimoni positif mengenai pelayanan
                                        yang diberikan oleh PT. Najah Hurrahman.</li>
                                </ul>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div><b>3. Paket Umrah dan Haji yang Variatif :</b></div>
                                <p> Pilihan Fleksibel: PT. Najah Hurrahman menawarkan berbagai pilihan paket umrah dan haji
                                    dengan harga yang kompetitif, sehingga Anda dapat memilih sesuai dengan budget dan
                                    preferensi.</p>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div><b>4. Fasilitas yang Lengkap :</b></div>
                                <ul>
                                    <li>Akomodasi Nyaman: Penginapan selama di Mekkah dan Madinah umumnya berada di lokasi
                                        yang strategis dan dilengkapi dengan fasilitas yang memadai.</li>
                                    <li>Transportasi yang Andal: Penggunaan bus yang nyaman dan aman untuk mobilitas selama
                                        di Arab Saudi.</li>
                                </ul>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div><b>5. Pembimbing yang Berpengalaman :</b></div>
                                <p>Bimbingan Ibadah: Jamaah akan didampingi oleh pembimbing yang kompeten dan berpengalaman
                                    dalam memberikan bimbingan ibadah.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2 card"
                    style="background: rgba(255, 255, 255, 0.768); font-family: Arial; font-size: clamp(12pt, 1.5vw, 14pt);">
                    <div class="mb-2 card-body" style="text-align: justify;">
                        <center>
                            <h2>Kelebihan PT. Najah Hurrahman</h2>
                        </center>
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-sm-12 col-12">
                                <p><b>PT. Najah Hurrahman</b>merupakan salah satu penyelenggara ibadah haji dan umrah yang
                                    telah mendapatkan kepercayaan banyak jamaah. Untuk mengetahui lebih lanjut mengenai
                                    kelebihan perusahaan ini, mari kita bahas beberapa poin penting berikut:</p>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <ol class="">
                                    <li>Izin Resmi dari Kemenag:</li>
                                    <p>Legalitas Terjamin: PT. Najah Hurrahman telah mendapatkan izin resmi dari Kementerian
                                        Agama, sehingga Anda dapat melakukan perjalanan ibadah dengan lebih tenang dan aman.
                                    </p>
                                    <li>Pengalaman dan Reputasi:</li>
                                    <ul>
                                        <li>Track Record yang Baik: Dengan pengalaman yang cukup, PT. Najah Hurrahman telah
                                            membuktikan kemampuannya dalam mengelola perjalanan ibadah haji dan umrah.</li>
                                        <li>Testimoni Jamaah: Banyak jamaah yang memberikan testimoni positif mengenai
                                            pelayanan yang diberikan oleh PT. Najah Hurrahman.</li>
                                    </ul>
                                    <li>Paket Umrah dan Haji yang Variatif:</li>
                                    <p>Pilihan Fleksibel: PT. Najah Hurrahman menawarkan berbagai pilihan paket umrah dan
                                        haji dengan harga yang kompetitif, sehingga Anda dapat memilih sesuai dengan budget
                                        dan preferensi.</p>
                                    <li>Fasilitas yang Lengkap:</li>
                                    <ul>
                                        <li>Akomodasi Nyaman: Penginapan selama di Mekkah dan Madinah umumnya berada di
                                            lokasi yang strategis dan dilengkapi dengan fasilitas yang memadai.</li>
                                        <li>Transportasi yang Andal: Penggunaan bus yang nyaman dan aman untuk mobilitas
                                            selama di Arab Saudi.</li>
                                    </ul>
                                    <li>Pembimbing yang Berpengalaman:</li>
                                    <p>Bimbingan Ibadah: Jamaah akan didampingi oleh pembimbing yang kompeten dan
                                        berpengalaman dalam memberikan bimbingan ibadah.</p>
                                    <li>Layanan Purna Haji:</li>
                                    <p>Pendampingan Pasca Ibadah: PT. Najah Hurrahman biasanya memberikan layanan purna haji
                                        untuk membantu jamaah dalam mengurus dokumen-dokumen pasca ibadah.</p>
                                    <li>Kantor Cabang yang Luas:</li>
                                    <p>Akses Mudah: Adanya kantor cabang di berbagai daerah memudahkan calon jamaah untuk
                                        mendapatkan informasi dan melakukan pendaftaran.</p>
                                    <li>Program Promosi Menarik:</li>
                                    <p> Harga Terjangkau: Seringkali PT. Najah Hurrahman menawarkan program promosi dengan
                                        harga yang lebih terjangkau, terutama untuk keberangkatan tertentu.</p>
                                </ol>
                            </div>
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
