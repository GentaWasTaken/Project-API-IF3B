<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class MahasiswaController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Mahasiswa::with('prodis')->get();
        if($results) {
            return $this->sendSuccess($results, "Data berhasil ditemukan!", Response::HTTP_OK);
        } else {
            return $this->sendError(null, "Data tidak berhasil ditemukan!", Response::HTTP_OK);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'npm' => 'required|unique:mahasiswas',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'prodi_id' => 'required',
        ]);
    
        $fakultas = Mahasiswa::create($validate);
        if($fakultas){
            return $this->sendSuccess($fakultas, "Mahasiswa berhasil ditambahkan.", Response::HTTP_CREATED);
        } else {
            return $this->sendError(null, "Data sudah ada!", Response::HTTP_OK);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
