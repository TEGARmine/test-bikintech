<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiSiswa;

class NilaiSiswaController extends Controller
{
    public function showForm()
    {
        $dataSiswa = NilaiSiswa::all();

        return view('default', compact('dataSiswa'));
    }

    public function simpanNilai(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tugas1' => 'required|numeric',
            'tugas2' => 'required|numeric',
            'tugas3' => 'required|numeric',
            'tugas4' => 'required|numeric',
            'tugas5' => 'required|numeric',
            'ujian1' => 'required|numeric',
            'ujian2' => 'required|numeric',
        ]);

        $nilaiAkhir = (($request->tugas1 + $request->tugas2 + $request->tugas3 + $request->tugas4 + $request->tugas5) / 5 * 60 / 100)
            + (($request->ujian1 + $request->ujian2) / 2 * 40 / 100);

        $grade = ($nilaiAkhir >= 81) ? 'A' : (($nilaiAkhir >= 71) ? 'B' : (($nilaiAkhir >= 61) ? 'C' : (($nilaiAkhir >= 51) ? 'D' : 'E')));

        NilaiSiswa::create([
            'nama' => $request->nama,
            'tugas1' => $request->tugas1,
            'tugas2' => $request->tugas2,
            'tugas3' => $request->tugas3,
            'tugas4' => $request->tugas4,
            'tugas5' => $request->tugas5,
            'ujian1' => $request->ujian1,
            'ujian2' => $request->ujian2,
            'nilai_akhir' => $nilaiAkhir,
            'grade' => $grade,
        ]);

        return redirect()->back()->with('success', 'Data nilai siswa berhasil disimpan');
    }
}
