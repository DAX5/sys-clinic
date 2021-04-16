<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Médico:</strong>
        <select name="medico_id" id="medico_id" class="form-control" required>
            <option value="">Selecione o médico</option>
            @if(isset($medicos))
            @foreach($medicos as $medico)
            <option value="{{ $medico->id }}" {{ isset($agendamento) && $agendamento->medico_id == $medico->id ? 'selected' : '' }}>{{ $medico->nome . ' - ' . $medico->especialidade }}</option>
            @endforeach
            @endif
        </select>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Paciente:</strong>
        <select name="paciente_id" id="paciente_id" class="form-control" required>
            <option value="">Selecione o paciente</option>
            @if(isset($pacientes))
            @foreach($pacientes as $paciente)
            <option value="{{ $paciente->id }}" {{ isset($agendamento) && $agendamento->paciente_id == $paciente->id ? 'selected' : '' }}>{{ $paciente->nome }}</option>
            @endforeach
            @endif
        </select>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Horário:</strong>
        <x-input type="datetime-local" name="horario" class="form-control" placeholder="horario" required value="{{ isset($agendamento) ? $agendamento->horario->format('Y-m-d\TH:i') : '' }}" />
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Status:</strong>
        <select name="status_id" id="status_id" class="form-control" required>
            <option value="">Selecione o status</option>
            @if(isset($status))
            @foreach($status as $s)
            <option value="{{ $s->id }}" {{ isset($agendamento) && $agendamento->status_id == $s->id ? 'selected' : '' }}>{{ $s->status }}</option>
            @endforeach
            @endif
        </select>
    </div>
</div>
