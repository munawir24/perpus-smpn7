<div id="book-list">
    {{-- 🔹 Navigasi kategori --}}
    <div class="mt-3 mb-3 row justify-content-center">
        <div class="mt-2 mb-2 text-center col-12">
            <div id="category-nav" class="flex-wrap gap-2 d-flex justify-content-center">
                <button class="btn btn-sm btn-primary category-btn active" data-category="">Semua</button>
                @foreach ($categories as $cat)
                    <button class="btn btn-sm btn-light category-btn" data-category="{{ $cat->id }}">
                        {{ Str::upper($cat->name) }}
                    </button>
                @endforeach
            </div>
        </div>

        {{-- 🔍 Input pencarian --}}
        <div class="mt-2 col-md-5 col-10">
            <input type="text" id="search" class="form-control" placeholder="Ketik untuk mencari judul buku..."
                value="{{ $query == null ? '' : $query }}">
        </div>
    </div>

    {{-- 🔹 Daftar buku --}}
    <div class="card"
        style="background: url('{{ asset('img/bg-book.jpg') }}') center repeat-y; background-size: 100%;">
        <div class="row">
            <center>
                <h2 class="p-2" style="background-color: #ffffffc6">Semua Buku</h2>
            </center>
            <div class="row justify-content-center" id="book-container">
                @foreach ($book as $bk)
                    <div class="m-2 border col-md-2 col-5 col-sm-3 position-relative"
                        style="border-radius: 10px; background-color: #ffffffc6; overflow: hidden; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">

                        {{-- Badge kategori --}}
                        <span class="top-0 px-2 py-1 m-1 position-absolute start-0"
                            style="background-color: #2563eb; color: white; font-size: 11px; border-radius: 0 5px 5px 0;">
                            {{ Str::upper($bk->category->name ?? '-') }}
                        </span>

                        <a href="{{ url('/baca-buku', $bk->id) }}" target="_blank"
                            style="text-decoration: none; color: black; font-weight: bold; display: block;">
                            <img src="{{ asset('perpus/smpn7/' . $bk->cover) }}" alt="{{ $bk->cover }}"
                                style="width: 100%; border-radius: 10px; padding-top: 25px;">
                            <div class="mt-1 mb-2 text-center" style="font-size: 13px; min-height: 40px;">
                                {{ Str::upper($bk->judul) }}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let typingTimer;
        const delay = 1000;

        // 🔹 Filter berdasarkan pencarian
        $('#search').on('keyup', function() {
            clearTimeout(typingTimer);
            const query = $(this).val();
            const category = $('.category-btn.active').data('category');

            typingTimer = setTimeout(function() {
                loadBooks(category, query);
            }, delay);
        });

        // 🔹 Filter berdasarkan kategori
        $('.category-btn').on('click', function() {
            $('.category-btn').removeClass('active btn-primary').addClass('btn-light');
            $(this).addClass('active btn-primary').removeClass('btn-light');

            const category = $(this).data('category');
            const query = $('#search').val();

            loadBooks(category, query);
        });

        // 🔹 Fungsi untuk memuat daftar buku saja
        function loadBooks(category = '', query = '') {
            $.ajax({
                url: "{{ url('/list-buku') }}",
                type: "GET",
                data: { search: query, category: category },
                success: function(data) {
                    // Ambil hanya isi book-container dari response
                    const newBooks = $(data).find('#book-container').html();
                    $('#book-container').html(newBooks);
                }
            });
        }
    });
</script>

