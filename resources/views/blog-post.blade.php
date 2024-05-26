<x-app-layout>
    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Post Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <div class="bg-white flex flex-col justify-start p-6">
                    <img src="{{ route('image', [$post->image]) }}" class="mb-10">
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">
                        {{ $post->title }}
                    </a>
                    <p href="#" class="text-sm pb-8">
                        {{ $post->published_at }}
                    </p>
                    <p class="pb-3">
                        {{ $post->content }}
                    </p>
                </div>
            </article>

            <div class="w-full flex pt-6">
                <a href="{{ $prev['route'] }}"
                    class="{{ $prev['class'] }} w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                    <p class="text-lg text-blue-800 font-bold flex items-center">
                        <i class="fas fa-arrow-left pr-1"></i> Sebelumnya
                    </p>
                    <p class="pt-2">
                        {{ $prev['post']?->title }}
                    </p>
                </a>
                <a href="{{ $next['route'] }}"
                    class="{{ $next['class'] }} w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                    <p class="text-lg text-blue-800 font-bold flex items-center justify-end">
                        Selanjutnya <i class="fas fa-arrow-right pl-1"></i>
                    </p>
                    <p class="pt-2">
                        {{ $next['post']?->title }}
                    </p>
                </a>
            </div>

        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">About Us</p>
                <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio
                    sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
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
</x-app-layout>
