@extends('layouts.user')

@section('title', 'Home Jadwal List')

@section('contents')
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 9999; /* Pastikan z-index lebih tinggi dari konten lainnya */
        top: 20px; /* Atur jarak dari atas */
        right: 20px; /* Atur jarak dari kanan */
        background-color: #4caf50; /* Warna latar belakang hijau */
        padding: 20px; /* Padding untuk konten modal */
        border-radius: 5px; /* Border radius untuk sudut */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Tambahkan bayangan */
    }

    .modal-content {
        color: white; /* Warna teks putih */
    }

    .close {
        color: white;
        float: right;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover {
        color: #f44336; /* Warna teks merah saat dihover */
    }
</style>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center py-6">
        <h1 class="font-bold text-2xl">Kelola Jadwal Mata Kuliah</h1>
        <form action="{{ route('user/pengguna/SearchJadwal') }}" method="GET" class="mb-4">
        </div>
    @if(Session::has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50">
        {{ Session::get('success') }}
    </div>
    @endif
    <!-- Form untuk pencarian dan penyaringan -->
    
    <form action="{{ route('user/pengguna/IndexJadwal') }}" method="GET" class="mb-4">
        <div class="flex items-center mb-2">
            <input type="text" name="search" placeholder="Cari berdasarkan Mata Kuliah, Waktu, atau Lokasi" class="px-4 py-2 border rounded-md flex-1 mr-2">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 px-4 py-2 rounded-md font-medium">Cari</button>
        </div>
        <div class="flex items-center">
            <input type="date" name="tanggal" class="px-4 py-2 border rounded-md mr-2">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 px-4 py-2 rounded-md font-medium">Cari</button>
        </div>
        <div class="text-right">
            <a href="{{ route('user/pengguna/CreateJadwal') }}" class="text-white bg-blue-700 hover:bg-blue-800 px-4 py-2 rounded-md font-medium text-sm">Tambah Jadwal</a>
        </div>        
    </form>
    <br>
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
                @forelse($jadwals as $index => $rs)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $index + 1 }}</td>
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $rs->id }}</td>
                    <td class="py-3 px-6 text-left">{{ auth()->user()->name }}</td>
                    <td class="py-3 px-6 text-left">{{ auth()->user()->email }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->matkul->nm_matkul }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->tanggal }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->start_time }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->end_time }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->lokasi }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->kelas }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->jurusan }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->deskripsi }}</td>
                    <td class="py-3 px-6 text-left">
                        <a href="{{ route('user/pengguna/EditJadwal', $rs->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a> |
                        <form action="{{ route('user/pengguna/DestroyJadwal', $rs->id) }}" method="POST" onsubmit="return confirm('Hapus?')" class="inline">
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

<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="warningMessage"></p>
    </div>
</div>

<script>
function parseDateTime(dateTimeString) {
    const [datePart, timePart] = dateTimeString.split(' ');
    const [year, month, day] = datePart.split('-').map(Number);
    const [hour, minute, second] = timePart.split(':').map(Number);

    // Buat objek Date dengan parameter tahun, bulan (0-11), hari, jam, menit, dan detik
    const parsedDate = new Date(year, month - 1, day, hour, minute, second);

    return parsedDate;
}

function extractDatesFromTable(tableSelector) {
    const table = document.querySelector(tableSelector);
    if (!table) {
        console.error('Tabel tidak ditemukan.');
        return [];
    }

    const rows = table.querySelectorAll('tbody tr');
    const datesArray = [];

    rows.forEach((row) => {
        const columns = row.querySelectorAll('td');
        if (columns.length >= 7) {
            const dateTimeString = `${columns[5].textContent} ${columns[6].textContent}`;
            const parsedDate = parseDateTime(dateTimeString);
            datesArray.push(parsedDate);
        }
    });

    return datesArray;
}

function checkTimeDifference(tableSelector) {
    const dates = extractDatesFromTable(tableSelector);
    const currentTime = new Date();

    let index = -1;

    dates.some((date, i) => {
        const timeDifference = Math.abs(currentTime - date);
        const minutesDifference = timeDifference / (1000 * 60); // Convert milliseconds to minutes

        if (Math.floor(minutesDifference) <= 1) {
            index = i;
            return true; // Stop looping
        }
        return false;
    });

    if (index !== -1) {
        const tableRows = document.querySelector(tableSelector).querySelectorAll('tbody tr');
        const targetRow = tableRows[index];
        const eventName = targetRow.querySelectorAll('td')[4].textContent;
        return { row: targetRow, eventName: eventName };
    }

    return null;
}
// Fungsi untuk menutup modal saat tombol close diklik
document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('myModal').style.display = 'none';
});

// Fungsi untuk menampilkan modal dengan pesan peringatan
function displayWarningMessage(message) {
    const modal = document.getElementById('myModal');
    const warningMessage = document.getElementById('warningMessage');
    warningMessage.textContent = message;
    modal.style.display = 'block';
}

// Fungsi untuk memeriksa perbedaan waktu dan menampilkan pesan peringatan dalam modal
function checkAndDisplayWarningMessage() {
    const nmmtkl = checkTimeDifference('table');
    if (nmmtkl) {
        const remainingTime = 'Mata Kuliah ' + nmmtkl.eventName + ' akan dimulai dalam 1 menit';
        displayWarningMessage(remainingTime);
    }
}

// Panggil fungsi checkAndDisplayWarningMessage saat halaman dimuat
window.onload = function() {
    checkAndDisplayWarningMessage();
    // Perbarui pesan peringatan setiap detik
    setInterval(checkAndDisplayWarningMessage, 1000);
};
</script>

@endsection
