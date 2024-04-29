@extends('layouts.user')
 
@section('title', 'Home')
 
@section('contents')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Home
        </h1>
    </div>
</header>
<hr />
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <!-- Card untuk menampilkan jadwal mata kuliah -->
            <div class="bg-green-200 rounded-lg p-6">
                <h2 class="text-xl font-bold mb-4">Daftar Mata Kuliah</h2>
                <p class="text-gray-700 mb-4">Lihat Daftar Mata Kuliah.</p>
                <a href="{{ route('user/pengguna/ShowMatkul') }}" class="flex items-center justify-center bg-green-500 text-white rounded-lg py-2 px-4 hover:bg-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    Lihat Jadwal
                </a>
            </div>
            <!-- Card untuk menampilkan jadwal -->
            <div class="bg-blue-200 rounded-lg p-6">
                <h2 class="text-xl font-bold mb-4">Kelola Jadwal</h2>
                <p class="text-gray-700 mb-4">Kelola Jadwal Mata Kuliah</p>
                <a href="{{ route('user/pengguna/IndexJadwal') }}" class="flex items-center justify-center bg-blue-500 text-white rounded-lg py-2 px-4 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    Lihat Jadwal
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
