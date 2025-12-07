<?php

namespace App\Http\Controllers;

use App\Models\Pribadi;
use Illuminate\Http\Request;

class PribadiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pribadi = Pribadi::orderBy('id','desc')->paginate(5);
        return view('pribadi.index', compact('pribadi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pribadi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik'            => 'required',
            'nama_mahasiswa' => 'required',
            'tempat_lahir'   => 'required',
            'tanggal_lahir'  => 'required',
        ]);

        Pribadi::create($request->post());

        return redirect()->route('pribadi.index')
                         ->with('success','Data Mahasiswa berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pribadi $pribadi)
    {
        return view('pribadi.edit', compact('pribadi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pribadi $pribadi)
    {
        $request->validate([
            'nik'            => 'required',
            'nama_mahasiswa' => 'required',
            'tempat_lahir'   => 'required',
            'tanggal_lahir'  => 'required',
        ]);

        $pribadi->fill($request->post())->save();

        return redirect()->route('pribadi.index')
                         ->with('success', 'Data Pribadi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pribadi $pribadi)
    {
        $pribadi->delete();

        return redirect()->route('pribadi.index')
                         ->with('success','Data Pribadi berhasil dihapus.');
    }
}
