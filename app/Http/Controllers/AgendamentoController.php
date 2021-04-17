<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Agendamento;
use Illuminate\Http\Request;
use App\Models\StatusAgendamento;
use Yajra\DataTables\Facades\DataTables;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agendamentos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::get();
        $pacientes = Paciente::get();
        $status = StatusAgendamento::get();

        return view('agendamentos.create', compact('medicos', 'pacientes', 'status'));
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
        ];

        $request->validate([
            'medico_id' => 'required',
            'paciente_id' => 'required',
            'horario' => 'required',
            'status_id' => 'required'
        ], $messages);
        
        Agendamento::create($request->all());

        return redirect()->route('agendamentos.index')
            ->with('success', 'Agendamento criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function show(Agendamento $agendamento)
    {
        return view('agendamentos.show', compact('agendamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Agendamento $agendamento)
    {
        $medicos = Medico::get();
        $pacientes = Paciente::get();
        $status = StatusAgendamento::get();

        return view('agendamentos.edit', compact('agendamento', 'medicos', 'pacientes', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agendamento $agendamento)
    {
        $messages = [
            'required' => 'O campo :attribute é obrigatório!',
        ];

        $request->validate([
            'medico_id' => 'required',
            'paciente_id' => 'required',
            'horario' => 'required',
            'status_id' => 'required'
        ], $messages);
        
        $agendamento->update($request->all());

        return redirect()->route('agendamentos.index')
            ->with('success', 'Agendamento atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agendamento $agendamento)
    {
        $agendamento->delete();

        return redirect()->route('agendamentos.index')
            ->with('success', 'Agendamento removido com sucesso.');
    }

    /**
     * Get agendamentos for DataTable list.
     *
     * @return Yajra\DataTables\Facades\DataTables
     */
    public function getAgendamentos(Request $request)
    {
        if ($request->ajax()) {
            $data = Agendamento::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('medico_nome', function($agendamento) {
                    return isset($agendamento->medico) ? $agendamento->medico->nome . ' - ' . $agendamento->medico->especialidade : 'Médico removido';
                })
                ->addColumn('paciente_nome', function($agendamento) {
                    return isset($agendamento->paciente) ? $agendamento->paciente->nome : 'Paciente removido';
                })
                ->editColumn('horario', function($agendamento) {
                    return $agendamento->horario->format('d/m/Y H:i:s');
                })
                ->addColumn('status', function($agendamento) {
                    return isset($agendamento->status) ? $agendamento->status->status : "Status removido";
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<form action="'. route('agendamentos.destroy', $row->id) .'" method="POST"> <a href="' . route('agendamentos.show', $row->id) . '" class="show btn btn-primary btn-sm" title="Mostrar"><i class="fa fa-eye"></i></a> <a href="' . route('agendamentos.edit', $row->id) . '" class="edit btn btn-success btn-sm" title="Editar"><i class="fa fa-edit"></i></a> '.csrf_field() .'<input type="hidden" name="_method" value="DELETE"><button type="submit" class="delete btn btn-danger btn-sm" title="Remover" onclick="return confirm(\'Tem certeza que deseja remover o agendamento?\')"><i class="fa fa-trash"></i></button> </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
