@extends('layouts.app')
@section('title', 'Pencapaian Santri')

@section('subtitle')
    <p class="flex items-center space-x-px capitalize text-white">
        <span>User / Page / Pencapaian Santri</span>
    </p>
@endsection

@section('content')
    <div class="relative overflow-x-auto bg-white shadow-lg max-md:text-sm">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="p-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Guru
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pencapaian
                    </th>
                </tr>
            </thead>
            @php
                $i = ($achievements->currentPage() - 1) * $achievements->perPage() + 1;
            @endphp
            <tbody>
                @forelse ($achievements as $achievement)
                    <tr class="bg-white border-b text-hitam">
                        <th class="p-4">
                            {{ $i++ }}.
                        </th>
                        <td class="px-6 py-4">
                            {{ $achievement->teacher->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($achievement->created_at)->format('d-m-Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $achievement->achievement }}
                        </td>
                    </tr>
                @empty
                    <caption class="caption-bottom my-3">
                        Belum ada pencapaian santri yang terdaftar.
                    </caption>
                @endforelse
            </tbody>
        </table>
    </div>

    <section class="w-full h-10 mt-3">
        {{ $achievements->links() }}
    </section>
@endsection
