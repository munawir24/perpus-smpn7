<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Formulir Pendaftaran | Najah Hurrahman</title>
    <style>
        @page {
            size: auto;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="wrapper" style="font-family: Arial">
        <div class="card" style="border: none">
            <div class="card-body">
                <div class="row">
                    <div class="col-3" style="text-align: center;">
                        <img src="{{ asset('img/logo NH.png') }}" alt="" style="height: 4cm; margin-top: 17px;">
                    </div>
                    <div class="text-center col-6">
                        <br>
                        <div style="font-weight: bold; font-size: 18pt;">PT. NAJAH HURRAHMAN</div>
                        <div style="font-size: 9pt">Penyelenggara Perjalanan Wisata Umroh dan Haji Khusus</div>
                        <div style="border: 1px solid black; font-size: 18pt; font-weight: bold;">FORMULIR PENDAFTARAN
                            UMROH & HAJI KHUSUS</div>
                    </div>
                    <div class="col-3">
                        <div style="width: 3.81cm; height: 5.59cm; border: 1px dashed black;"></div>
                    </div>
                </div>
                <br>
                <div class="row" style="font-size: 12pt;">
                    {{-- Bari Data --}}
                    <div class="col-12">
                        <table style="widows: 100%">
                            <tr>
                                <td>{{ $no++ . '.' }}</td>
                                <td>Nama Sesuai Passport</td>
                                <td>:</td>
                                <td>{{ $data->nama }}</td>
                            </tr>
                            <tr>
                                <td>{{ $no++ . '.' }}</td>
                                <td>No. Passport</td>
                                <td>:</td>
                                <td>{{ $data->no_passport }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Tgl dikeluarkan Passport</td>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($data->tgl_passport)->translatedFormat('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Tempat dikeluarkan Passport <b class="text-white">. .</b></td>
                                <td>:</td>
                                <td>{{ $data->tempat_passport }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Masa Berlaku Paspor</td>
                                <td>:</td>
                                <td>{{ 'Tahun ' . $data->masa_passport . ' s/d Tahun ' . $data->expired_passport }}</td>
                            </tr>
                            <tr>
                                <td>{{ $no++ . '.' }}</td>
                                <td>Tempat & Tanggal Lahir</td>
                                <td>:</td>
                                <td>{{ $data->tempat_lahir . ', ' . \Carbon\Carbon::parse($data->tgl_lahir)->translatedFormat('d-m-Y') }}
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $no++ . '.' }}</td>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>{{ $data->jenis_kelamin == 'L' ? 'Pria' : 'Wanita' }}</td>
                            </tr>
                            <tr>
                                <td>{{ $no++ . '.' }}</td>
                                <td>Alamat Tetap</td>
                                <td>:</td>
                                <td>{{ $data->alamat }}</td>
                            </tr>
                            <tr>
                                <td>{{ $no++ . '.' }}</td>
                                <td>Kota</td>
                                <td>:</td>
                                <td>{{ $data->city }}</td>
                            </tr>
                            <tr>
                                <td>{{ $no++ . '.' }}</td>
                                <td>Harga Paket </td>
                                <td>:</td>
                                <td>{{ 'Rp. ' . number_format($data->paket->harga, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>{{ $no++ . '.' }}</td>
                                <td>Paket Pilihan</td>
                                <td>:</td>
                                <td>{{ $data->paket->nama }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-center"><b>Total</b></td>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $no++ . '.' }}</td>
                                <td>No. Telp/Hp</td>
                                <td>:</td>
                                <td>{{ $data->no_hp }}</td>
                            </tr>
                            <tr>
                                <td>{{ $no++ . '.' }}</td>
                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td>{{ $data->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <td>{{ $no++ . '.' }}</td>
                                <td>Nama Mahram/Pendamping</td>
                                <td>:</td>
                                <td>{{ $data->nama_mahrom }}</td>
                            </tr>
                            <tr>
                                <td>{{ $no++ . '.' }}</td>
                                <td>Hubungan Maram</td>
                                <td>:</td>
                                <td>{{ $data->jenis_mahrom }}</td>
                            </tr>
                            <tr>
                                <td>{{ $no++ . '.' }}</td>
                                <td>Pilihan Kamar</td>
                                <td>:</td>
                                <td>{{ $data->jenis_kamar }}</td>
                            </tr>
                            <tr>
                                <td>{{ $no++ . '.' }}</td>
                                <td>Tanggal Keberangkatan</td>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($data->tgl_berangkat)->translatedFormat('d-m-Y') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row" style="text-align: justify; font-size: 12pt;">
                    <div class="col-12">
                        <b>Dengan ini saya menyatakan mendaftarkan diri mengikuti program perjalanan Ibadah umroh/haji
                            plus bersama PT. NAJAH HURRAHMAN Tour & Travel dan selanjutmya akan menaati syarat dan
                            ketentuan yang berlaku sebagai berikut :</b>
                        <ol style="margin-left: 20px; padding: 0px;">
                            <li>Saya bersedia membayar uang muka sesuai dengan paket yang dipilih dan melunasi
                                pembayaran sesuai batas waktu yang telah ditentukan, jika terjadi keterlambatan
                                pelunasan, maka resiko yang timbul menjadi tanggung jawab pendaftar.</li>
                            <li>Saya bersedia menyerahkan salinan/FC dokumen pendukung untuk pengurusan pengajuan visa
                                daln lain-lainnya paling lambat 1 bulan sebelum jadwal keberengkatan, jika terjadi
                                keterlambatan penyerahan dokumen, maka resiko yang timbul menjadi tanggung jawab
                                pendaftar.</li>
                            <li>Saya bersedia dikenai potongan biaya yang telah dibayarkan jika melakukan pembatalan
                                keberangkatan secara sepihak sesuai ketentuan perusahaan.</li>
                            <li>Saya bersedia dikenai tambahan biaya untuk layanan fasilitas diluar harga paket
                                (exclude).</li>
                            <li>Saya bersedia dikenai tambahan biaya jika meminta paket khusus (request group) diluar
                                paket yang ada.</li>
                            <li>Saya bersedia dikenai tambahan biaya jika terjadi kenaikan kurs Dollar dari standar
                                harga yang telah ditentukan oleh perusahaan.</li>
                            <li>Saya bersedia dikenai denda/sanksi jika dengan sengaja melakukan over stay (melebihi
                                batas waktu tinggal) atau menyalahgunakan visa umroh yang dikeluarkan oleh pihak KBSA,
                                dimana semua resiko yang timbul akan dibebankan kepada pihak keluarga saya di tanah air.
                            </li>
                            <li>Kelalaian pribadi seperti kehilangan : tas, koper atau barang bawa'an dll.</li>
                        </ol>
                        Demikian formulir ini diisi dengan pernyataan yang sebenarnya dan diaggap setuju oleh pendaftar.
                        <p><b>Pembayaran melalui via transfer An rekening PT. NAJAH HURRAHMAN</b></p>

                        <div class="row">
                            <div class="col-12">
                                <ul>
                                    <li>
                                        <div class="row">
                                            <div class="col-4">Bank Mandiri Syariah</div>
                                            <div class="col-8">: No Rek 75454577</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-4">Bank BRI Rupiah</div>
                                            <div class="col-8">: No Rek 1806-01-000015-56-9</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-4">Bank Mandiri Rupiah</div>
                                            <div class="col-8">: No Rek 159-00-00-86046-9</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-4">Bank Muamalat Rupiah</div>
                                            <div class="col-8">: No Rek 634-000-3298</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-4">Bank Mandiri Dollar</div>
                                            <div class="col-8">: No Rek 159-00-0145716-6</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-4">Bank Muamalat Dollar</div>
                                            <div class="col-8">: No Rek 634-000-3299</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <p style="text-align: right">Tanggal :
                            ........................................</p>
                        <div class="text-center row">
                            <div class="col-5">
                                <b>Jamaah Umroh / Haji Khusus</b>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                ( {{ Str::title($data->nama) }})
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5">
                                <b>Hormat Kami,</b>
                                <br>
                                <br>
                                <br>
                                <br><br>
                                ( PT. Najah Hurrahman )
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
