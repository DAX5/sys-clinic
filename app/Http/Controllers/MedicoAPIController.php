<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Medico;

class MedicoAPIController extends Controller
{
    /**
     * Display a listing of the Medicos.
     * GET|HEAD /medicos
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function get()
    {
        try {
            $medicos = Medico::get();
            
            return response(['message' => 'Médicos recuperados com sucesso!', 'data' => $medicos], 200);
        } catch (Exception $e) {
            return response(['error message' => $e->getMessage()], 500);
        }
    }
}
