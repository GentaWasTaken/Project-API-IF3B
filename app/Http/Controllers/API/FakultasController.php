<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Models\Fakultas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FakultasController extends BaseController
{
    public function index()
    {
        $fakultas = Fakultas::all();
        if($fakultas) {
            return $this->sendSuccess($fakultas, "Data ditemukan!", Response::HTTP_OK);
        } else {
            return $this->sendSuccess($fakultas, "Data tidak ditemukan!", Response::HTTP_OK);
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
            'nama' => 'required|unique:fakultas'
        ]);
    
        $fakultas = Fakultas::create($validate);
        if($fakultas){
            return $this->sendSuccess($fakultas, "Fakultas berhasil ditambahkan!", Response::HTTP_CREATED);
        } else {
            return $this->sendError(null, "Data sudah ada!", Response::HTTP_OK);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakultas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);
    
        $result = Fakultas::where('id', $id)->update($validate);
        if($result){
            return $this->sendSuccess($result, "Fakultas berhasil di update!", Response::HTTP_CREATED);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = Fakultas::find($id);
        if($result){
            $result->delete();
            return $this->sendSuccess($result, "Fakultas berhasil di hapus!", Response::HTTP_CREATED);
        } else {
            return $this->sendError(null, "Data tidak ada!", Response::HTTP_OK);
        }
    }
}
