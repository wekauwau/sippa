<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-header>
                    <x-slot:title>
                        Tagihan
                        </x-slot>

                        <x-my-bill :userid="Auth::id()" />
                </x-header>

                <x-header>
                    <x-slot:title>
                        Riwayat Pembayaran
                        </x-slot>

                        <x-my-payment :userid="Auth::id()" />
                </x-header>
            </div>
        </div>
    </div>
</x-app-layout>
