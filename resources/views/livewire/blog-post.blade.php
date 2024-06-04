<section class="w-full md:w-2/3 flex flex-col items-center px-3">

    <article class="flex flex-col shadow my-4">
        <!-- Article Image -->
        <div class="bg-white flex flex-col justify-start p-6">
            <img src="{{ route('image', [$post->image]) }}" class="mb-10">
            <div class="text-3xl font-bold pb-4">
                {{ $post->title }}
            </div>
            <p href="#" class="text-sm pb-8">
                {{ $post->published_at }}
            </p>
            <p class="pb-3">
                {{ $post->content }}
            </p>
        </div>
    </article>

    <div class="w-full flex pt-6">
        <div x-data @click="window.scrollTo({top: 0, behavior: 'smooth'})" wire:click="prev"
            class="{{ $prev['class'] }} cursor-pointer w-1/2 bg-white shadow hover:shadow-md text-left p-6">
            <p class="text-lg text-blue-800 font-bold flex items-center">
                <i class="fas fa-arrow-left pr-1"></i> Sebelumnya
            </p>
            <p class="pt-2">
                {{ $prev['post']?->title }}
            </p>
        </div>
        <div x-data @click="window.scrollTo({top: 0, behavior: 'smooth'})" wire:click="next"
            class="{{ $next['class'] }} cursor-pointer w-1/2 bg-white shadow hover:shadow-md text-right p-6">
            <p class="text-lg text-blue-800 font-bold flex items-center justify-end">
                Selanjutnya <i class="fas fa-arrow-right pl-1"></i>
            </p>
            <p class="pt-2">
                {{ $next['post']?->title }}
            </p>
        </div>
    </div>

</section>
