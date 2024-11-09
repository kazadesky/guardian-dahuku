<nav class="w-full md:min-h-16 text-white-text mt-5 mb-7">
    <section class="flex items-center justify-between w-full -mb-1">
        <div class="flex items-center max-md:space-x-1">
            <button type="button" onclick="showMenu(event)" class="outline-none sm:hidden">
                <span class="material-symbols-outlined max-md:text-2xl">
                    menu
                </span>
            </button>
            <h1 class="font-bold uppercase sm:text-2xl max-md:text-lg">{{ $title }}</h1>
        </div>
        <ul>
            <li class="mb-2">
                <button type="button" onclick="toggleDropdown(event)"
                    class="flex items-center md:space-x-3 max-md:space-x-1 outline-none">
                    <h1 class="uppercase font-bold text-sm max-md:hidden">{{ Auth::user()->name }}</h1>
                    <span class="material-symbols-outlined sm:hidden">
                        keyboard_arrow_down
                    </span>
                    <figure class="size-10 rounded-full overflow-hidden shadow-sm">
                        <img src="{{ !Auth::user()->profile ? asset('img/icon/user.png') : url('storage/profile/', Auth::user()->profile) }}"
                            alt="user-icon" class="w-full">
                    </figure>
                </button>
            </li>
            <ul id="dropdown-nav"
                class="animation-fade hidden absolute md:w-56 max-md:w-52 flex-col space-y-1 p-2 rounded-md shadow border border-black bg-hitam sm:right-5 max-md:right-3 z-30 max-md:text-sm">
                <section class="text-center text-sm pb-2">
                    <p class="text-base">{{ Auth::user()->name }}</p>
                    <p>{{ Auth::user()->nis }}</p>
                    <p class="capitalize">{{ Auth::user()->student->name }}</p>
                </section>
                {{-- <li class="border-y py-1">
                    <a href="{{ route('user.profile', Auth::user()->id) }}" onclick="return false"
                        class="outline-none w-full flex items-center px-3 h-10 rounded space-x-1 transition duration-300 {{ request()->routeIs('user.profile') ? 'bg-elf-green hover:bg-dark-elf focus:bg-dark-elf' : 'hover:bg-green-500/40' }}">
                        <span class="material-symbols-outlined text-[22px]">
                            Person
                        </span>
                        <span>Profil</span>
                    </a>
                </li> --}}
                <li class="pt-2 border-t">
                    <form action="{{ route('user.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="outline-none w-full h-10 rounded text-white-text bg-flush-mahogany flex items-center justify-center space-x-1 transition duration-300 hover:bg-dark-flush focus:bg-dark-flush">
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </ul>
    </section>
    <section class="flex-none block max-md:my-1 max-md:text-sm">
        @yield('subtitle')
    </section>
</nav>
