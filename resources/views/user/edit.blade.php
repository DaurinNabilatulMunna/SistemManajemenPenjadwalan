@extends('layouts.app')

@section('title', 'Edit user')

@section('contents')
<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Edit Data Pengguna</h1>
    <hr class="mb-6">

    <div class="bg-white shadow-sm rounded-lg p-6">
        <form action="{{ route('admin/users/update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-8">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <br>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Pengguna</label>
                    <input type="text" name="email" id="email" value="{{ $user->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
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
