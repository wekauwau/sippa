<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-header>
                    <x-slot:title>
                        Jadwal Mengajar Saya
                        </x-slot>

                        <x-my-madin-schedule :userid="Auth::id()" />
                </x-header>

                <x-header>
                    <x-slot:title>
                        Jadwal Madin
                        </x-slot>

                        <img class="w-full px-20" src="images/jadwal-madin.jpg">
                </x-header>
            </div>
        </div>
    </div>
</x-app-layout>
