@extends('layouts.app')

@section('title', 'Home')

@section('contents')
<div class="container mx-auto mt-8">
    <h1 class="font-bold text-2xl mb-4">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Card untuk Jadwal -->
        <a href="{{ route('jadwal.index') }}" class="bg-blue-100 shadow-md rounded-lg p-6 hover:bg-blue-200 transition duration-300 flex items-center justify-center">
            <svg class="w-12 h-12 text-blue-500 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h18M3 8h18M3 12h18M3 16h18M3 20h18"></path>
            </svg>
            <div>
                <h2 class="text-xl font-semibold mb-2">Jadwal</h2>
                <p class="text-gray-600">Kelola jadwal kuliah di sini</p>
            </div>
        </a>

        <!-- Card untuk Mata Kuliah -->
        <a href="{{ route('matkul.index') }}" class="bg-green-100 shadow-md rounded-lg p-6 hover:bg-green-200 transition duration-300 flex items-center justify-center">
            <svg class="w-12 h-12 text-green-500 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <div>
                <h2 class="text-xl font-semibold mb-2">Mata Kuliah</h2>
                <p class="text-gray-600">Kelola mata kuliah di sini</p>
            </div>
        </a>

        <!-- Card untuk Pengguna -->
        <a href="{{ route('admin/users') }}" class="bg-yellow-100 shadow-md rounded-lg p-6 hover:bg-yellow-200 transition duration-300 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-yellow-500 mr-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4zM4 10a6 6 0 1112 0 6 6 0 01-12 0zm14-6v2a6 6 0 01-3.33 5.39A4.001 4.001 0 0118 10V8a8 8 0 10-16 0v2c0 1.1.9 2 2 2h12a2 2 0 002-2V4h-2z"/>
            </svg>
            <div>
                <h2 class="text-xl font-semibold mb-2">Pengguna</h2>
                <p class="text-gray-600">Kelola pengguna di sini</p>
            </div>
        </a>
        
    </div>
</div>
@endsection
