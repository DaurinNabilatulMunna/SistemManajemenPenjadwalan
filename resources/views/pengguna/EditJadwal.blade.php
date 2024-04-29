@extends('layouts.user')

@section('title', 'Edit Jadwal')

@section('contents')
<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Edit Jadwal</h1>
    <hr class="mb-6">

    <div class="bg-white shadow-sm rounded-lg p-6">
        <form action="{{ route('user/pengguna/UpdateJadwal', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-8">
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input id="name" name="name" type="text" value="{{ $jadwal->name }}" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ $jadwal->email }}" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                </div>

                <div class="mb-6">
                    <label for="id_matkul" class="block text-sm font-medium text-gray-700">Matakuliah</label>
                    <select name="id_matkul" id="id_matkul" class="form-select mt-1 block w-full border-gray-300 rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach($matkuls as $matkul)
                            <option value="{{ $matkul->id_matkul }}" @if($matkul->id_matkul == $jadwal->id_matkul) selected @endif>{{ $matkul->nm_matkul }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" value="{{ $jadwal->tanggal }}" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="mb-6">
                    <label for="start_time" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                    <input type="time" name="start_time" id="start_time" value="{{ $jadwal->start_time }}" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="mb-6">
                    <label for="end_time" class="block text-sm font-medium text-gray-700">Waktu Selesai</label>
                    <input type="time" name="end_time" id="end_time" value="{{ $jadwal->end_time }}" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="mb-6">
                    <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                    <select id="kelas" name="kelas" class="form-select mt-1 block w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        <option value="A" @if($jadwal->kelas == 'A') selected @endif>A</option>
                        <option value="B" @if($jadwal->kelas == 'B') selected @endif>B</option>
                        <option value="C" @if($jadwal->kelas == 'C') selected @endif>C</option>
                        <option value="D" @if($jadwal->kelas == 'D') selected @endif>D</option>
                        <option value="E" @if($jadwal->kelas == 'E') selected @endif>E</option>
                        <option value="F" @if($jadwal->kelas == 'F') selected @endif>F</option>
                        <option value="G" @if($jadwal->kelas == 'G') selected @endif>G</option>
                        <option value="H" @if($jadwal->kelas == 'H') selected @endif>H</option>
                        <option value="I" @if($jadwal->kelas == 'I') selected @endif>I</option>
                        <option value="J" @if($jadwal->kelas == 'J') selected @endif>J</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                    <input id="lokasi" name="lokasi" type="text" value="{{ $jadwal->lokasi }}" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                </div>

                <div class="mb-6">
                    <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                    <select id="jurusan" name="jurusan" class="form-select mt-1 block w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        <option value="Teknik Informatika" @if($jadwal->jurusan == 'Teknik Informatika') selected @endif>Teknik Informatika</option>
                    </select>
                </div>  

                <div class="mb-6">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-textarea mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $jadwal->deskripsi }}</textarea>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="inline-flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
