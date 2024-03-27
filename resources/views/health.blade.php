<x-app-layout>
    @push('head')
    <style>
        .btn-group>.btn {
            color: black;
        }
    </style>
    @endpush
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-header>
                <x-slot:title>
                    Riwayat Sakit
                    </x-slot>

                    {{ $dataTable->table() }}
            </x-header>
        </div>
    </div>
    @push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-app-layout>
