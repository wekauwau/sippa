<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img class="h-10 rounded-full" src="{{ route('image', ['logo.jpg']) }}">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 lg:space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        Beranda
                    </x-nav-link>
                    <x-nav-link href="{{ route('blog') }}" :active="request()->routeIs('blog')">
                        Warta
                    </x-nav-link>
                    @if (Auth::check())
                        <x-nav-link class="hidden lg:inline-flex" href="{{ route('madin') }}" :active="request()->routeIs('madin')">
                            Madin
                        </x-nav-link>
                        @if ($student)
                            <x-nav-link class="hidden lg:inline-flex" href="{{ route('finance') }}" :active="request()->routeIs('finance')">
                                Keuangan
                            </x-nav-link>
                            <x-nav-link class="hidden lg:inline-flex" href="{{ route('sick') }}" :active="request()->routeIs('sick')">
                                Kesehatan
                            </x-nav-link>
                            <x-nav-link class="hidden lg:inline-flex" href="{{ route('violation') }}" :active="request()->routeIs('violation')">
                                Pelanggaran
                            </x-nav-link>
                        @endif
                        @if ($student)
                            {{-- sm: show dropdown if student --}}
                            <x-nav-dropdown class="text-left hidden sm:inline-flex lg:hidden">
                                <x-slot name="trigger">
                                    Santri
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link href="{{ route('madin') }}">
                                        Madin
                                    </x-dropdown-link>
                                    <x-dropdown-link href="{{ route('finance') }}">
                                        Keuangan
                                    </x-dropdown-link>
                                    <x-dropdown-link href="{{ route('sick') }}">
                                        Kesehatan
                                    </x-dropdown-link>
                                    <x-dropdown-link href="{{ route('violation') }}">
                                        Pelanggaran
                                    </x-dropdown-link>
                                </x-slot>
                            </x-nav-dropdown>
                        @else
                            {{-- sm: show Madin only instead of dropdown if not student --}}
                            <x-nav-link class="inline-flex lg:hidden" href="{{ route('madin') }}" :active="request()->routeIs('madin')">
                                Madin
                            </x-nav-link>
                        @endif

                        <!-- Is a manager -->
                        @if ($division_name)
                            <x-nav-dropdown class="text-left inline-flex">
                                <x-slot name="trigger">
                                    Pengurus
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link href="{{ route('madin-data') }}">
                                        Data Madin
                                    </x-dropdown-link>
                                    <x-dropdown-link href="{{ route('student-data') }}">
                                        Data Santri
                                    </x-dropdown-link>
                                    <x-dropdown-link href="{{ route('finance-data') }}">
                                        Data Keuangan
                                    </x-dropdown-link>
                                    <x-dropdown-link href="{{ route('sick-data') }}">
                                        Data Kesehatan
                                    </x-dropdown-link>
                                    <x-dropdown-link href="{{ route('violation-data') }}">
                                        Data Pelanggaran
                                    </x-dropdown-link>
                                </x-slot>
                            </x-nav-dropdown>
                        @endif
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                @if (Auth::check())
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Kelola Akun
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                Profil
                            </x-dropdown-link>

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Not authenticated -->
            @if (!Auth::check())
                <div class="flex items-center">
                    <a href="{{ route('login') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold py-1 px-4 rounded">
                        Masuk
                    </a>
                </div>
            @endif

            <div class=" -me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                Beranda
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('blog') }}" :active="request()->routeIs('blog')">
                Warta
            </x-responsive-nav-link>
            @if (Auth::check())
                <x-responsive-nav-link href="{{ route('madin') }}" :active="request()->routeIs('madin')">
                    Madin
                </x-responsive-nav-link>
                @if ($student)
                    <x-responsive-nav-link href="{{ route('finance') }}" :active="request()->routeIs('finance')">
                        Keuangan
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('sick') }}" :active="request()->routeIs('')">
                        Kesehatan
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('violation') }}" :active="request()->routeIs('violation')">
                        Pelanggaran
                    </x-responsive-nav-link>
                @endif
                @if ($division_name)
                    <x-responsive-nav-link href="{{ route('madin-data') }}" :active="request()->routeIs('madin-data')">
                        Data Madin
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('student-data') }}" :active="request()->routeIs('student-data')">
                        Data Santri
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('finance-data') }}" :active="request()->routeIs('finance-data')">
                        Data Keuangan
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('sick-data') }}" :active="request()->routeIs('sick-data')">
                        Data Kesehatan
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('violation-data') }}" :active="request()->routeIs('violation-data')">
                        Data Pelanggaran
                    </x-responsive-nav-link>
                @endif
            @endif
        </div>

        @if (Auth::check())
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 me-3">
                            <img class="h-10 w-10 rounded-full object-cover"
                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endif
    </div>
</nav>
