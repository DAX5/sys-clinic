<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pacientes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'O campo :attribute é obrigatório!',
            'unique' => 'O :attribute inserido já existe!',
            'min|cpf' => 'O :attribute inserido é inválido!'
        ];

        $request->validate([
            'nome' => 'required',
            'email' => 'required|unique:pacientes',
            'cpf' => 'required|min:14|unique:pacientes|cpf',
            'fone' => 'required|min:13'
        ], $messages);
        
        Paciente::create($request->all());

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {        
        return view('pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $messages = [
            'required' => 'O campo :attribute é obrigatório!',
            'unique' => 'O :attribute inserido já existe!',
            'min|cpf' => 'O :attribute inserido é inválido!',
        ];

        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'cpf' => 'required|min:14|cpf',
            'fone' => 'required|min:13'
        ], $messages);
        
        $paciente->update($request->all());

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente removido com sucesso.');
    }

    /**
     * Get pacientes for DataTable list.
     *
     * @return Yajra\DataTables\Facades\DataTables
     */
    public function getPacientes(Request $request)
    {
        if ($request->ajax()) {
            $data = Paciente::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<form action="'. route('pacientes.destroy', $row->id) .'" method="POST"> <a href="' . route('pacientes.show', $row->id) . '" class="show btn btn-primary btn-sm" title="Mostrar"><i class="fa fa-eye"></i></a> <a href="' . route('pacientes.edit', $row->id) . '" class="edit btn btn-success btn-sm" title="Editar"><i class="fa fa-edit"></i></a> '.csrf_field() .'<input type="hidden" name="_method" value="DELETE"><button type="submit" class="delete btn btn-danger btn-sm" title="Remover" onclick="return confirm(\'Tem certeza que deseja remover o paciente '. $row->nome .'?\')"><i class="fa fa-trash"></i></button> </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
