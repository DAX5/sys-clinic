<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medicos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicos.create');
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
            'cpf' => 'O :attribute inserido é inválido!',
            'min' => 'O :attribute inserido é inválido!'
        ];

        $request->validate([
            'nome' => 'required',
            'email' => 'required|unique:medicos',
            'cpf' => 'required|min:14|unique:medicos|cpf',
            'fone' => 'required|min:13'
        ], $messages);
        
        Medico::create($request->all());

        return redirect()->route('medicos.index')
            ->with('success', 'Médico criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show(Medico $medico)
    {
        return view('medicos.show', compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico)
    {
        return view('medicos.edit', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {
        $messages = [
            'required' => 'O campo :attribute é obrigatório!',
            'unique' => 'O :attribute inserido já existe!',
            'cpf' => 'O :attribute inserido é inválido!',
            'min' => 'O :attribute inserido é inválido!'
        ];

        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'cpf' => 'required|min:14|cpf',
            'fone' => 'required|min:13'
        ], $messages);
        
        $medico->update($request->all());

        return redirect()->route('medicos.index')
            ->with('success', 'Médico atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medico $medico)
    {
        $medico->delete();

        return redirect()->route('medicos.index')
            ->with('success', 'Médico removido com sucesso.');
    }

    /**
     * Get medicos for DataTable list.
     *
     * @return Yajra\DataTables\Facades\DataTables
     */
    public function getMedicos(Request $request)
    {
        if ($request->ajax()) {
            $data = Medico::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<form action="'. route('medicos.destroy', $row->id) .'" method="POST"> <a href="' . route('medicos.show', $row->id) . '" class="show btn btn-primary btn-sm" title="Mostrar"><i class="fa fa-eye"></i></a> <a href="' . route('medicos.edit', $row->id) . '" class="edit btn btn-success btn-sm" title="Editar"><i class="fa fa-edit"></i></a> '.csrf_field() .'<input type="hidden" name="_method" value="DELETE"><button type="submit" class="delete btn btn-danger btn-sm" title="Remover" onclick="return confirm(\'Tem certeza que deseja remover o médico '. $row->nome .'?\')"><i class="fa fa-trash"></i></button> </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
