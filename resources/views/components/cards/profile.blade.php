<div class="flex items-center w-full justify-center mt-5">
    <div class="max-w-md">
        <div class="bg-white shadow-xl rounded-lg py-3">
            <div class="photo-wrapper p-2">
                <img class="w-52 h-52 rounded-full mx-auto" src="{{ $pfpUrl }}" alt="John Doe">
            </div>
            <div class="p-2">
                <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{ $name }}</h3>
                <div class="text-center text-gray-400 text-sm font-semibold">
                    <p>{{ $roles }}</p>
                </div>
                <table class="text-sm my-3">
                    <tbody>
                        @if ($grade)
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Madin</td>
                                <td class="px-2 py-2">{{ $grade }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Nomor</td>
                            <td class="px-2 py-2">{{ $phone }}</td>
                        </tr>
                        @if ($address)
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Alamat</td>
                                <td class="px-2 py-2">{{ $address }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
