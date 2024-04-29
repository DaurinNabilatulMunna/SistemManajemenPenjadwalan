<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matkul;
use App\Models\Jadwal;
use Carbon\Carbon;


class PenggunaController extends Controller
{
    public function checkStartTime($startTime)
    {
        $currentTime = Carbon::now();
        $startTime = Carbon::parse($startTime);
        $differenceInMinutes = $startTime->diffInMinutes($currentTime);

        return $differenceInMinutes <= 1;
    }

    public function ShowMatkul()
    {
        $matkuls = Matkul::all();
        return view('pengguna.ShowMatkul', compact('matkuls'));
    }

    public function IndexJadwal()
    {
        $jadwals = Jadwal::orderBy('created_at', 'DESC')->get();

        $jadwals->each(function ($jadwal) {
            $jadwal->isNearStart = $this->checkStartTime($jadwal->start_time);
        });

        return view('pengguna.IndexJadwal', compact('jadwals'));
    }

    public function CreateJadwal()
    {
        $matkuls = Matkul::all(); // Ambil semua data dari model Matkul
        return view('pengguna.CreateJadwal', compact('matkuls'));
    }

    public function StoreJadwal(Request $request)
    {
        Jadwal::create($request->all());

        return redirect()->route('user/pengguna')->with('success', 'jadwal added successfully');
    }

    public function EditJadwal(string $id)
    {
        $matkuls = Matkul::all(); // Ambil semua data dari model Matkul
        $jadwal = Jadwal::findOrFail($id);

        return view('pengguna.EditJadwal', compact('matkuls', 'jadwal'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function UpdateJadwal(Request $request, string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update($request->all());

        return redirect()->route('user/pengguna')->with('success', 'jadwal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function DestroyJadwal(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect()->route('user/pengguna')->with('success', 'jadwal deleted successfully');
    }
    public function SearchJadwal(Request $request)
{
    $search = $request->input('search');
    $tanggal = $request->input('tanggal');

    $query = Jadwal::query()->leftJoin('matkuls', 'jadwals.id_matkul', '=', 'matkuls.id_matkul');

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('matkuls.nm_matkul', 'like', "%$search%")
                ->orWhere('jadwals.start_time', 'like', "%$search%")
                ->orWhere('jadwals.lokasi', 'like', "%$search%");
        });
    }

    if ($tanggal) {
        $query->whereDate('jadwals.tanggal', $tanggal);
    }

    $jadwals = $query->orderBy('jadwals.created_at', 'DESC')->get();

    return view('pengguna.IndexJadwal', compact('jadwals'));
}
}
