@extends('layouts.app')
@section('title', 'Pembayaran Bulanan')

@section('subtitle')
    <p class="flex items-center space-x-px capitalize text-white">
        <span>User / Page / Pembayaran Bulanan</span>
    </p>
@endsection

@section('content')
    <div class="relative overflow-x-auto bg-white shadow-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="p-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bulan Pembayaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tahun Pembayaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah Pembayaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status Pembayaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Input
                    </th>
                </tr>
            </thead>
            @php
                $i = ($payments->currentPage() - 1) * $payments->perPage() + 1;
            @endphp
            <tbody>
                @forelse ($payments as $payment)
                    <tr class="bg-white border-b text-hitam">
                        <th class="p-4">
                            {{ $i++ }}.
                        </th>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $payment->month->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $payment->year }}
                        </td>
                        <td class="px-6 py-4">
                            Rp. {{ number_format($payment->price, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $payment->status }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($payment->created_at)->format('d-m-Y') }}
                        </td>
                    </tr>
                @empty
                    <caption class="caption-bottom my-3">
                        Belum terdapat pembayaran bulanan yang dilakukan.
                    </caption>
                @endforelse
            </tbody>
        </table>
    </div>

    <section class="w-full h-10 mt-3">
        {{ $payments->links() }}
    </section>
@endsection
