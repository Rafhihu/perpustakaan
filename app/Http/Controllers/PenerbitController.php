<?php

namespace App\Http\Controllers;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();
        return view('penerbit.index', compact('penerbit'));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $penerbit = new penerbit;
        $penerbit->kode = $request->kode;
        $penerbit->nama = $request->nama;

        $penerbit->save();

        return redirect('penerbit')->with('sukses', 'Data berhasil di simpan');   
    }
    public function edit($id)
    {
        $penerbit = penerbit::find($id);
        return view('penerbit.edit',compact('penerbit'));
    }

    public function update(Request $request , $id)
    {
        $penerbit = penerbit::find($id);
        $penerbit->kode = $request->kode;
        $penerbit->nama = $request->nama;
        $penerbit->update();


        return redirect('penerbit')->with('sukses', 'Data berhasil di update');
    }
    public function destroy($id)
    {
        $penerbit = penerbit::find($id);
        $penerbit->delete();
        
        return redirect('penerbit')->with('sukses', 'Data berhasil di hapus');
    }
}
