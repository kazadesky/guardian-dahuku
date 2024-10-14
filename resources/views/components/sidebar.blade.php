<aside id="sidebar"
    class="fixed sm:z-10 max-md:z-30 w-full max-md:-translate-x-[105%] [&.active]:max-md:translate-x-0 max-md:max-w-[67%] transition-all duration-300 ease-in-out sm:max-w-[18%] m-3 rounded-lg shadow-lg bg-hitam overflow-x-hidden p-5 text-white-text">
    <section class="w-full h-16 border-b border-abu-muda mb-5">
        <h1 class="font-poppins uppercase font-semibold text-xl max-md:text-lg -mb-px">
            Wali Santri
        </h1>
        <h1 class="font-poppins uppercase font-medium text-lg max-md:text-base max-md:capitalize">Darul Huda Kutacane
        </h1>
    </section>

    <button type="button" onclick="hideMenu()"
        class="md:hidden outline-none absolute top-2 right-2 -ml-10 bg-hitam size-10 rounded-full flex items-center justify-center">
        <span class="material-symbols-outlined text-[22px]">
            close
        </span>
    </button>

    <ul class="flex flex-col w-full max-md:text-sm">
        <span class="font-semibold uppercase text-[11px]">Dashboard</span>
        <li class="mt-2 mb-5">
            <a href="{{ route('user.dashboard') }}"
                class="
                    outline-none w-full h-10 flex items-center px-3 rounded space-x-1
                    {{ request()->routeIs('user.dashboard') ? 'bg-elf-green shadow-sm' : '' }}
                    ">
                <span class="material-symbols-outlined">
                    dashboard
                </span>
                <span>Dashboard</span>
            </a>
        </li>

        <span class="font-semibold uppercase text-[11px]">content</span>
        <li>
            <a href="{{ route('user.monthly-payment') }}"
                class="
                    outline-none w-full h-10 flex items-center px-3 rounded space-x-1
                    {{ request()->routeIs('user.monthly-payment') ? 'bg-elf-green shadow-sm' : '' }}
                    ">
                <span class="material-symbols-outlined">
                    Edit_Note
                </span>
                <span>Pembayaran</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user.student-achievement') }}"
                class="
                    outline-none w-full h-10 flex items-center px-3 rounded space-x-1
                    {{ request()->routeIs('user.student-achievement') ? 'bg-elf-green shadow-sm' : '' }}
                    ">
                <span class="material-symbols-outlined">
                    note_alt
                </span>
                <span>Pencapaian</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user.student-misconduct') }}"
                class="
                    outline-none w-full h-10 flex items-center px-3 rounded space-x-1
                    {{ request()->routeIs('user.student-misconduct') ? 'bg-elf-green shadow-sm' : '' }}
                    ">
                <span class="material-symbols-outlined">
                    note_alt
                </span>
                <span>Pelanggaran</span>
            </a>
        </li>
    </ul>
</aside>
