@extends('layouts.app')
 
@section('title', 'Create matkul')
 
@section('contents')
<div class="mx-auto max-w-2xl">
    <h1 class="text-3xl font-bold mb-8">Add Matkul</h1>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-8">
            <form action="{{ route('admin/matkuls/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
 
                <div class="mb-6">
                    <label for="nm_matkul" class="block text-sm font-medium text-gray-700">Nama Matkul</label>
                    <input id="nm_matkul" name="nm_matkul" type="text" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                </div>
                <div class="mb-6">
                    <label for="dosen" class="block text-sm font-medium text-gray-700">Dosen</label>
                    <input id="dosen" name="dosen" type="text" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="sks" class="block text-sm font-medium text-gray-700">SKS</label>
                    <input id="sks" name="sks" type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Tambahkan SKS dalam bentuk angka">                    
                </div>
                <div class="mb-6">
                    <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="3" class="form-textarea mt-1 block w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="Tambahkan keterangan"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
