<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
    @foreach ($result as $item)
    <div>
        <div>{{ $item->deadline}}</div>
        <div>{{ $item->name}}</div>
        <div>{{ $item->info}}</div>
        <div>{{ $item->amount}}</div>
    </div>
    @endforeach
</div>
