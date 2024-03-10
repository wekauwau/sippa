<div>
    @foreach ($result as $item)
    <div class="mb-5">
        <div>{{ $item->deadline}}</div>
        <div>{{ $item->name}}</div>
        <div class="whitespace-pre-wrap">{{ $item->info }}</div>
        <div>{{ $item->amount}}</div>
    </div>
    @endforeach
</div>
