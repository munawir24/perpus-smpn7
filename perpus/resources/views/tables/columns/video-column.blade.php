@if ($getRecord()->tipe === 'video')
    <video class="w-32 mx-auto rounded-lg shadow sm:w-40" controls>
        <source src="{{ asset('perpus/smpn7/' . $getRecord()->file) }}" type="video/mp4">
        Browser kamu tidak mendukung video tag.
    </video>
@elseif ($getRecord()->tipe === 'img')
    <img src="{{ asset('perpus/smpn7/' . $getRecord()->file) }}" class="object-cover w-16 h-16 mx-auto rounded-md shadow">
@else
    <span class="italic text-gray-500">Tidak ada preview</span>
@endif
