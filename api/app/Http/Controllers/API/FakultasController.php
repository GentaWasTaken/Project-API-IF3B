<?php

namespace App\Http\Controllers\API;

use App\Models\Fakultas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
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
