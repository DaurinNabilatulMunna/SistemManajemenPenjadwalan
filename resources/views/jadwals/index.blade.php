@extends('layouts.app')

@section('title', 'Home Jadwal List')

@section('contents')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center py-6">
        <h1 class="font-bold text-2xl">Home Jadwal List</h1>
        <a href="{{ route('admin/jadwals/create') }}" class="text-white bg-blue-700 hover:bg-blue-800 px-4 py-2 rounded-md font-medium text-sm">Tambah Jadwal</a>
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
                    <th class="py-3 px-6 text-left">Nama</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Nama Matakuliah</th>
                    <th class="py-3 px-6 text-left">Tanggal</th>
                    <th class="py-3 px-6 text-left">Start Time</th>
                    <th class="py-3 px-6 text-left">End Time</th>
                    <th class="py-3 px-6 text-left">Lokasi</th>
                    <th class="py-3 px-6 text-left">Kelas</th>
                    <th class="py-3 px-6 text-left">Jurusan</th>
                    <th class="py-3 px-6 text-left">Deskripsi</th>
                    <th class="py-3 px-6 text-left">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse($jadwal as $index => $rs)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $index + 1 }}</td>
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $rs->id }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->name}}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->email}}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->matkul->nm_matkul }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->tanggal }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->start_time }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->end_time }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->lokasi }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->kelas }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->jurusan }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->deskripsi }}</td>
                    <td class="py-3 px-6 text-left">
                        <a href="{{ route('admin/jadwals/edit', $rs->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a> |
                        <form action="{{ route('admin/jadwals/destroy', $rs->id) }}" method="POST" onsubmit="return confirm('Hapus?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center py-4">Tidak ada data jadwal.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
