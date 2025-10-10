<div id="book-list">
    <div class="mt-3 mb-3 row justify-content-center">
        <div class="mt-3 col-md-5 col-10">
            <input type="text" id="search" class="form-control" placeholder="Ketik untuk mencari judul buku...">
        </div>
    </div>
    <div class="card" style="background: url('{{ asset('img/bg-book.jpg') }}') center repeat-y; background-size: 100%;">
        <div class="row">
            <center>
                <h2 class="p-2" style="background-color: #ffffffc6">Semua Buku</h2>
            </center>
            <div class="row justify-content-center">
                @foreach ($book as $bk)
                    <div class="m-2 border col-md-2 col-5 col-sm-3"
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
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // $(document).ready(function() {
    //     $('#search').on('keyup', function() {
    //         var query = $(this).val();

    //         $.ajax({
    //             url: "{{ url('/list-buku') }}",
    //             type: "GET",
    //             data: {
    //                 'search': query
    //             },
    //             success: function(data) {
    //                 $('#book-list').html(data);
    //             }
    //         });
    //     });
    // });
    $(document).ready(function() {
        let typingTimer; // timer penunda
        const delay = 1000; // jeda 500ms setelah berhenti mengetik

        $('#search').on('keyup', function() {
            clearTimeout(typingTimer); // reset timer setiap kali mengetik lagi

            const query = $(this).val();

            // mulai timer baru
            typingTimer = setTimeout(function() {
                $.ajax({
                    url: "{{ url('/list-buku') }}",
                    type: "GET",
                    data: {
                        search: query
                    },
                    success: function(data) {
                        $('#book-list').html(data);
                    }
                });
            }, delay);
        });
    });
</script>
