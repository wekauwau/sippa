<section class="dark:bg-gray-800 dark:text-gray-100">
    <div class="container max-w-6xl p-6 mx-auto space-y-6 sm:space-y-12">
        <a rel="noopener noreferrer" href="{{ route('post', ['id' => $latest_post->id]) }}"
            class="block max-w-sm gap-3 mx-auto sm:max-w-full group hover:no-underline focus:no-underline lg:grid lg:grid-cols-12 dark:bg-gray-900">
            <img src="{{ route('image', [$latest_post->image]) }}" alt=""
                class="object-cover w-full h-64 rounded sm:h-96 lg:col-span-7 dark:bg-gray-500">
            <div class="p-6 space-y-2 lg:col-span-5">
                <h3 class="text-2xl font-semibold sm:text-4xl group-hover:underline group-focus:underline">
                    {{ $latest_post->title }}
                </h3>
                <span class="text-xs dark:text-gray-400">
                    {{ $latest_post->published_at }}
                </span>
                <p class="line-clamp-4 overflow-ellipsis">
                    {{ $latest_post->content }}
                </p>
            </div>
        </a>
        <div class="grid justify-center grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
                <a rel="noopener noreferrer" href="{{ route('post', ['id' => $post->id]) }}"
                    class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900">
                    <img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500"
                        src="{{ route('image', [$post->image]) }}">
                    <div class="p-6 space-y-2">
                        <h3 class="text-2xl font-semibold group-hover:underline group-focus:underline">
                            {{ $post->title }}
                        </h3>
                        <span class="text-xs dark:text-gray-400">
                            {{ $post->published_at }}
                        </span>
                        <p class="line-clamp-3 overflow-ellipsis">
                            {{ $post->content }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="flex justify-center">
            <a href="{{ route('blog') }}"
                class="px-6 py-3 text-sm rounded-md hover:underline dark:bg-gray-900 dark:text-gray-400">
                Lihat lebih banyak
            </a>
        </div>
    </div>
</section>
