<x-full-container>
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

    @if (Auth::user()->student)
        <x-header>
            <x-slot:title>
                Ketidakhadiran
            </x-slot>

            <livewire:absent-table />
        </x-header>
    @endif
</x-full-container>
