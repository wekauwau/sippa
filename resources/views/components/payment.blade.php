@push('head')
<style>
    .btn-group>.btn {
        color: black;
    }
</style>
@endpush

<div>
    {{ $dataTable->table() }}
</div>

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
