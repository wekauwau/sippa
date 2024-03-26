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
            <div class="container text-dark">
                <div class="card">
                    <div class="card-header text-xl">Kesehatan</div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-app-layout>
