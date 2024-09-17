<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdiController extends BaseController
{
    public function index()
    {
        $prodi = Prodi::with('fakultas')->get();
        if($prodi) {
            return $this->sendSuccess($prodi, "Data berhasil ditemukan!", Response::HTTP_OK);
        } else {
            return $this->sendError(null, "Data tidak berhasil ditemukan!", Response::HTTP_OK);
        }
        // if ($fakultas->isEmpty()) {
        //     $response['message'] = 'Tidak ada fakultas yang ditemukan.';
        //     $response['success'] = false;
        //     return response()->json($response, Response::HTTP_NOT_FOUND);
        // }

        // $response['success'] = true;
        // $response['message'] = 'Fakultas ditemukan.';
        // $response['data'] = $fakultas;
        // return response()->json($response, Response::HTTP_OK);
        // atau
        // return response()->json($response, 200);
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
            'nama' => 'required|unique:prodis',
            'fakultas_id' => 'required'
        ]);
    
        $fakultas = Prodi::create($validate);
        if($fakultas){
            return $this->sendSuccess($fakultas, "Prodi berhasil ditambahkan.", Response::HTTP_CREATED);
        } else {
            return $this->sendError(null, "Data sudah ada!", Response::HTTP_OK);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $fakultas)
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
    
        $result = Prodi::where('id', $id)->update($validate);
        if($result){
            return $this->sendSuccess($result, "Prodi berhasil di update!", Response::HTTP_CREATED);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = Prodi::find($id);
        if($result){
            $result->delete();
            return $this->sendSuccess($result, "Prodi berhasil di hapus!", Response::HTTP_CREATED);
        } else {
            return $this->sendError(null, "Data tidak ada!", Response::HTTP_OK);
        }
    }
}
