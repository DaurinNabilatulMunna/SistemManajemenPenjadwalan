@extends('layouts.user')

@section('title', 'List Mata Kuliah')

@section('contents')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-6">
            <h1 class="font-bold text-2xl">List Mata Kuliah</h1>
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
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @forelse($matkuls as $index => $mk)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $index + 1 }}</td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $mk->id_matkul }}</td>
                            <td class="py-3 px-6 text-left">{{ $mk->nm_matkul }}</td>
                            <td class="py-3 px-6 text-left">{{ $mk->dosen }}</td>
                            <td class="py-3 px-6 text-left">{{ $mk->sks }}</td>
                            <td class="py-3 px-6 text-left">{{ $mk->keterangan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Tidak ada data matakuliah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
