@extends('layouts.app')

@section('title', 'Edit Matkul')

@section('contents')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Edit Matakuliah</h1>
        <hr class="mb-6">

        <div class="bg-white shadow-sm rounded-lg p-6">
            <form action="{{ route('admin/matkuls/update', $matkul->id_matkul) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-8">
                    <div>
                        <label for="nm_matkul" class="block text-sm font-medium text-gray-700">Nama Matakuliah</label>
                        <input type="text" name="nm_matkul" id="nm_matkul" value="{{ $matkul->nm_matkul }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <br>
                    <div>
                        <label for="dosen" class="block text-sm font-medium text-gray-700">Dosen Pengampu</label>
                        <input type="text" name="dosen" id="dosen" value="{{ $matkul->dosen }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    

                    <div class="sm:col-span-2">
                        <label for="sks" class="block text-sm font-medium text-gray-700">Jumlah SKS</label>
                        <input type="text" name="sks" id="sks" value="{{ $matkul->sks }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                </div>
                <br>
                <div class="sm:col-span-2">
                    <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $matkul->keterangan }}</textarea>
                </div>

                <div class="mt-6">
                    <button type="submit" class="inline-flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
