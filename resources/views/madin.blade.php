<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (Auth::user()->teacher)
                    <x-header>
                        <x-slot:title>
                            Jadwal Mengajar Saya
                        </x-slot>

                        <x-my-madin-schedule />
                    </x-header>
                @endif

                <x-header>
                    <x-slot:title>
                        Jadwal Madin
                    </x-slot>

                    <livewire:madin-table />
                </x-header>

                <x-header>
                    <x-slot:title>
                        Ketidakhadiran
                    </x-slot>

                    <livewire:absent-table />
                </x-header>
            </div>
        </div>
    </div>
</x-app-layout>
