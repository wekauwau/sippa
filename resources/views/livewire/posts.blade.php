<section class="w-full md:w-2/3 flex flex-col items-center px-3">

    @foreach ($posts as $post)
        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="{{ route('post', [$post->id]) }}" class="h-96 overflow-y-hidden hover:opacity-75">
                <img src="{{ route('image', [$post->image]) }}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="{{ route('post', [$post->id]) }}" class="text-3xl font-bold hover:text-gray-700 pb-4">
                    {{ $post->title }}
                </a>
                <p class="text-sm pb-3">
                    {{ $post->published_at }}
                </p>
                <p class="mb-6 overflow-hidden line-clamp-3 overflow-ellipsis">
                    {{ $post->content }}
                </p>
                <a href="{{ route('post', [$post->id]) }}" class="uppercase text-gray-800 hover:text-black">
                    lanjutkan membaca <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </article>
    @endforeach

    {{ $posts->links() }}

</section>
