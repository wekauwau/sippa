<div>
    @foreach ($result as $item)
    <div class="mb-5">
        <div>{{ $item->day }}</div>
        <div>{{ $item->grade }} - {{ $item->madin_room }}</div>
        <div>{{$item->lesson }}</div>
    </div>
    @endforeach
</div>
