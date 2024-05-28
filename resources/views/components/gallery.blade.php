<div class="w-full bg-white shadow flex flex-col my-4 p-6">
    <p class="text-xl font-semibold pb-5">Galeri</p>
    <div class="grid grid-cols-3 gap-3">
        @foreach ($images as $img)
            <img class="hover:opacity-75" src="{{ route('image', [$img->name]) }}" alt="{{ $img->alt }}">
        @endforeach
    </div>
    <a href="#"
        class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
        Lihat lebih
    </a>
</div>
