<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Progdi;
use App\Models\Pribadi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // ===========================
    // Tampilkan daftar mahasiswa
    // ===========================
    public function index()
    {
        $mahasiswa = DB::table('pribadis')
            ->leftJoin('mahasiswas', 'pribadis.id', '=', 'mahasiswas.id_pri')
            ->leftJoin('progdis', 'mahasiswas.id_pro', '=', 'progdis.id_progdi')
            ->select(
                'pribadis.id',
                'pribadis.nama_mahasiswa',
                'mahasiswas.id as id_mahasiswa',
                'mahasiswas.nim',
                'progdis.nm_progdi',
                'progdis.nm_fakultas'
            )
            ->orderBy('pribadis.id', 'desc')
            ->paginate(5);

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    // =============================
    // Halaman daftar mahasiswa baru
    // =============================
    public function daftar($id)
    {
        $pribadi = Pribadi::findOrFail($id);
        $progdi  = Progdi::all();

        return view('mahasiswa.daftar', compact('pribadi', 'progdi'));
    }

    // ===========================
    // Menyimpan mahasiswa baru DU
    // ===========================
    public function store(Request $request)
    {
        DB::table('mahasiswas')->insert([
            'nim'    => $request->nim,
            'id_pri' => $request->id,        // nama input id_pri diambil dari form daftar
            'id_pro' => $request->id_progdi
        ]);

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data Mahasiswa Baru Berhasil disimpan.');
    }

    // ===========================
    // Menampilkan detail mahasiswa
    // ===========================
    public function show($id)
    {
        $mahasiswa = DB::table('mahasiswas')
            ->join('pribadis', 'mahasiswas.id_pri', '=', 'pribadis.id')
            ->join('progdis', 'mahasiswas.id_pro', '=', 'progdis.id_progdi')
            ->select(
                'mahasiswas.id as id_mahasiswa',
                'mahasiswas.nim',
                'pribadis.nama_mahasiswa',
                'pribadis.nik',
                'pribadis.tempat_lahir',
                'pribadis.tanggal_lahir',
                'progdis.nm_progdi',
                'progdis.nm_fakultas'
            )
            ->where('mahasiswas.id', $id)
            ->first();

        if(!$mahasiswa){
            return redirect()->route('mahasiswa.index')
                             ->with('error', 'Data Mahasiswa tidak ditemukan');
        }

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    // ===========================
    // SEARCH Mahasiswa
    // ===========================
    public function search(Request $request)
    {
        $keyword = $request->search;

        $mahasiswa = DB::table('pribadis')
            ->leftJoin('mahasiswas', 'pribadis.id', '=', 'mahasiswas.id_pri')
            ->leftJoin('progdis', 'mahasiswas.id_pro', '=', 'progdis.id_progdi')
            ->select(
                'pribadis.id',
                'pribadis.nama_mahasiswa',
                'mahasiswas.id as id_mahasiswa',
                'mahasiswas.nim',
                'progdis.nm_progdi',
                'progdis.nm_fakultas'
            )
            ->where(function ($q) use ($keyword) {
                $q->where('pribadis.nama_mahasiswa', 'like', "%{$keyword}%")
                  ->orWhere('mahasiswas.nim', 'like', "%{$keyword}%")
                  ->orWhere('progdis.nm_progdi', 'like', "%{$keyword}%")
                  ->orWhere('progdis.nm_fakultas', 'like', "%{$keyword}%");
            })
            ->orderBy('pribadis.id', 'desc')
            ->paginate(5);

        return view('mahasiswa.index', compact('mahasiswa'))
            ->with('i', (request()->input('page',1) -1) * 5);
    }

}
