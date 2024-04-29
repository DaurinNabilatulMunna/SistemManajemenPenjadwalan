@extends('layouts.app')

@section('title', 'List Mata Kuliah')

@section('contents')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-6">
            <h1 class="font-bold text-2xl">List Mata Kuliah</h1>
            <a href="{{ route('admin/matkuls/create') }}" class="text-white bg-blue-700 hover:bg-blue-800 px-4 py-2 rounded-md font-medium text-sm">Tambah Mata Kuliah</a>
        </div>
        @if(Session::has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-xs leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Nama Matakuliah</th>
                        <th class="py-3 px-6 text-left">Dosen Pengampu</th>
                        <th class="py-3 px-6 text-left">Jumlah SKS</th>
                        <th class="py-3 px-6 text-left">Keterangan</th>
                        <th class="py-3 px-6 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @forelse($matkul as $index => $mk)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $index + 1 }}</td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $mk->id_matkul }}</td>
                            <td class="py-3 px-6 text-left">{{ $mk->nm_matkul }}</td>
                            <td class="py-3 px-6 text-left">{{ $mk->dosen }}</td>
                            <td class="py-3 px-6 text-left">{{ $mk->sks }}</td>
                            <td class="py-3 px-6 text-left">{{ $mk->keterangan }}</td>
                            <td class="py-3 px-6 text-left">
                                <a href="{{ route('admin/matkuls/edit', $mk->id_matkul)}}" class="text-blue-600 hover:text-blue-900">Edit</a> |
                                <form action="{{ route('admin/matkuls/destroy', $mk->id_matkul) }}" method="POST" onsubmit="return confirm('Hapus?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">Tidak ada data matakuliah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
