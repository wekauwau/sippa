<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-header>
                    <x-slot:title>
                        Pelanggaran
                        </x-slot>

                        <livewire:violation-table />
                </x-header>
            </div>
        </div>
    </div>
</x-app-layout>
