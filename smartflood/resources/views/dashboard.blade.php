<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard SmartFlood
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-6">

        {{-- INFO ROLE --}}
        <div class="bg-white p-4 rounded shadow mb-6">
            <p>
                Login sebagai:
                <span class="font-semibold text-blue-600">
                    {{ auth()->user()->role }}
                </span>
            </p>
        </div>

        {{-- ADMIN --}}
        @if(auth()->user()->role === 'admin')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <a href="/lokasi"
                   class="block p-6 bg-blue-600 text-white rounded shadow hover:bg-blue-700">
                    <h3 class="text-lg font-semibold">Kelola Lokasi Sensor</h3>
                    <p class="text-sm mt-2">CRUD Lokasi Sensor (AJAX)</p>
                </a>

                <a href="/laporan"
                   class="block p-6 bg-red-600 text-white rounded shadow hover:bg-red-700">
                    <h3 class="text-lg font-semibold">Data Laporan Banjir</h3>
                    <p class="text-sm mt-2">Semua laporan dari user</p>
                </a>

            </div>
        @endif

        {{-- USER --}}
        @if(auth()->user()->role === 'user')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <a href="/laporan"
                   class="block p-6 bg-green-600 text-white rounded shadow hover:bg-green-700">
                    <h3 class="text-lg font-semibold">Buat Laporan Banjir</h3>
                    <p class="text-sm mt-2">Form laporan + upload bukti</p>
                </a>

                <div class="block p-6 bg-gray-100 rounded shadow">
                    <h3 class="text-lg font-semibold">Status Akun</h3>
                    <p class="text-sm mt-2">Akses terbatas sesuai laporan milik Anda</p>
                </div>

            </div>
        @endif

    </div>
</x-app-layout>
