<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto flex flex-wrap py-6">
                    <!-- Posts Section -->
                    <livewire:blog-post />

                    <!-- Sidebar Section -->
                    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
                        <x-gallery />
                    </aside>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
