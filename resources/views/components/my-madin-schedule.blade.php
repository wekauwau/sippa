<div>
    @foreach ($madins as $madin)
        <div class="mb-5">
            <div class="text-lg font-semibold">{{ $madin->day }}</div>
            <div>{{ $madin->grade->name }} - {{ $madin->madin_room->name }}</div>
            <div>{{ $madin->lesson->name }}</div>
        </div>
    @endforeach
</div>
