<?php

namespace App\Http\Controllers;

use App\Models\Progdi;
use Illuminate\Http\Request;

class ProgdiController extends Controller
{
    public function index()
    {
        $progdi = Progdi::orderBy('id_progdi', 'desc')->paginate(5);
        return view('progdi.index', compact('progdi'));
    }

    public function create()
    {
        return view('progdi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_fakultas' => 'required',
            'nm_progdi' => 'required',
        ]);

        Progdi::create($request->all());

        return redirect()->route('progdi.index')
            ->with('success','Data Program Studi Berhasil disimpan.');
    }

    public function edit(Progdi $progdi)
    {
        return view('progdi.edit',compact('progdi'));
    }

    public function update(Request $request, Progdi $progdi)
    {
        $request->validate([
            'nm_fakultas' => 'required',
            'nm_progdi' => 'required',
        ]);

        $progdi->update($request->all());
        
        return redirect()->route('progdi.index')
            ->with('success','Data Program Studi Berhasil diperbarui.');
    }

    public function destroy(Progdi $progdi)
    {
        $progdi->delete();

        return redirect()->route('progdi.index')
            ->with('success','Data Program Studi Berhasil dihapus.');
    }
}
