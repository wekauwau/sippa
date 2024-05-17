<div>
    @foreach ($result as $item)
    <div class="mb-5">
        <div class="text-lg font-semibold">{{ $item->day }}</div>
        <div>{{ $item->grade->name }} - {{ $item->madin_room->name }}</div>
        <div>{{ $item->lesson->name }}</div>
    </div>
    @endforeach
</div>
