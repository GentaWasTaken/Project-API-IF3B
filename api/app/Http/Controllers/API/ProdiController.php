<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdiController extends Controller
{
    public function index()
    {
        $fakultas = Prodi::with('fakultas')->get();
        $data['message'] = true;
        $data['result'] = $fakultas;
        return response()->json($data, Response::HTTP_OK);
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
}
