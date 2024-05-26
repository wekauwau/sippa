<div class="container mx-auto flex flex-wrap py-6">
    <!-- Posts Section -->
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

    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">About Us</p>
            <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis
                est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea
                dictumst.</p>
            <a href="#"
                class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                Get to know us
            </a>
        </div>

        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">Instagram</p>
            <div class="grid grid-cols-3 gap-3">
                <img class="hover:opacity-75" src="#">
                <img class="hover:opacity-75" src="#">
                <img class="hover:opacity-75" src="#">
                <img class="hover:opacity-75" src="#">
                <img class="hover:opacity-75" src="#">
                <img class="hover:opacity-75" src="#">
                <img class="hover:opacity-75" src="#">
                <img class="hover:opacity-75" src="#">
                <img class="hover:opacity-75" src="#">
            </div>
            <a href="#"
                class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                <i class="fab fa-instagram mr-2"></i> Follow @dgrzyb
            </a>
        </div>

    </aside>

</div>
