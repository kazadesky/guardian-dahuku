@extends('layouts.app')
@section('title', 'Dashboard')

@section('subtitle')
    <p class="flex items-center space-x-px capitalize text-white">
        <span>User / Page / Dashboard</span>
    </p>
@endsection

@section('content')
    <div class="realtive w-full p-5 rounded-lg shadow-lg border bg-white font-poppins max-md:text-sm overflow-hidden">
        <section class="w-full md:h-10 max-md:h-9 flex items-center">
            <p class="font-medium md:text-base max-md:text-xs text-gray-700">
                <span>Selamat datang diakun anda </span>
                <span class="italic">{{ Auth::user()->name }}.</span>
            </p>
        </section>
        <section class="w-full overflow-hidden md:px-5 max-md:px-3 mt-3 md:pb-5 max-md:pb-3">
            <p class="font-medium md:text-lg">Profil Santri :</p>
            <div class="max-md:overflow-x-auto md:mt-3 max-md:mt-2">
                <p class="flex items-center md:py-4 max-md:py-3 border-b-2">
                    <span class="flex flex-none md:w-40 max-md:w-32 font-medium">Nama Santri</span>
                    <span class="flex flex-none w-5 font-medium">:</span>
                    <span>{{ $studentGuardian->student->name }}</span>
                </p>
                <p class="flex items-center md:py-4 max-md:py-3 border-b-2">
                    <span class="flex flex-none md:w-40 max-md:w-32 font-medium">NIS</span>
                    <span class="flex flex-none w-5 font-medium">:</span>
                    <span>{{ $studentGuardian->student->nis }}</span>
                </p>
                <p class="flex items-center md:py-4 max-md:py-3 border-b-2">
                    <span class="flex flex-none md:w-40 max-md:w-32 font-medium">NISN</span>
                    <span class="flex flex-none w-5 font-medium">:</span>
                    <span>{{ $studentGuardian->student->nisn }}</span>
                </p>
                <p class="flex items-center md:py-4 max-md:py-3 border-b-2">
                    <span class="flex flex-none md:w-40 max-md:w-32 font-medium">Kelas</span>
                    <span class="flex flex-none w-5 font-medium">:</span>
                    <span>{{ $studentGuardian->student->classRoom->name }}</span>
                </p>
                <p class="flex items-center md:py-4 max-md:py-3 border-b-2">
                    <span class="flex flex-none md:w-40 max-md:w-32 font-medium">Tempat Lahir</span>
                    <span class="flex flex-none w-5 font-medium">:</span>
                    <span>{{ $studentGuardian->student->place_of_birth }}</span>
                </p>
                <p class="flex items-center md:py-4 max-md:py-3 border-b-2">
                    <span class="flex flex-none md:w-40 max-md:w-32 font-medium">Tanggal Lahir</span>
                    <span class="flex flex-none w-5 font-medium">:</span>
                    <span>{{ $studentGuardian->student->date_of_birth }}</span>
                </p>
                <p class="flex items-center md:py-4 max-md:py-3 border-b-2">
                    <span class="flex flex-none md:w-40 max-md:w-32 font-medium">Jenis Kelamin</span>
                    <span class="flex flex-none w-5 font-medium">:</span>
                    <span>{{ $studentGuardian->student->gender }}</span>
                </p>
                <p class="flex md:items-center max-md:items-start md:py-4 max-md:py-3 border-b-2">
                    <span class="flex flex-none md:w-40 max-md:w-32 font-medium">Alamat</span>
                    <span class="flex flex-none w-5 font-medium">:</span>
                    <span>{{ $studentGuardian->student->address }}</span>
                </p>
            </div>
        </section>
    </div>
@endsection
