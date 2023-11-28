<?php

namespace App\Http\Controllers;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }
    public function store(Request $request)
    {
       $image = $request->file('foto');
       $image->storeAs('public/anggota', $image->hashName());
       Anggota::create([
        'kode' => $request->kode,
        'nama' => $request->nama,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'jenis_kelamin' => $request->jenis_kelamin,
        'telpon' => $request->telpon,
        'alamat' => $request->alamat,
        'foto' => $image->hashName(),

       ]);
        return redirect('anggota') ->with('sukses', 'Data Berhasil Di Simpan');

  
    }

    public function create(){
        return view('anggota.create');
    }

    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();
        
        return redirect('anggota')->with('sukses', 'Data berhasil di hapus');
    }
    public function edit($id)
    {
        $anggota = Anggota::find($id);
        return view('anggota.edit',compact('anggota'));
    }

    public function update(Request $request , $id)
    {
        $anggota = Anggota::find($id);
        $anggota->kode = $request->kode;
        $anggota->nama = $request->nama;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->tempat_lahir = $request->tempat_lahir;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->telpon = $request->telpon;
        $anggota->alamat = $request->alamat;
        $anggota->foto = $request->foto;
        $anggota->update();


        return redirect('anggota')->with('sukses', 'Data berhasil di update');
    }
    public function show(anggota $anggota)
    {

    }
}
