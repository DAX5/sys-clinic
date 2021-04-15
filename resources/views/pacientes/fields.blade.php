<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Nome:</strong>
        <input type="text" name="nome" class="form-control" placeholder="Nome" required value="{{ isset($paciente->nome) ? $paciente->nome : '' }}">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Email:</strong>
        <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ isset($paciente->email) ? $paciente->email : '' }}">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>CPF:</strong>
        <input type="text" name="cpf" class="form-control cpf" placeholder="CPF" maxlength="14" required value="{{ isset($paciente->cpf) ? $paciente->cpf : '' }}">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Fone:</strong>
        <input type="text" name="fone" class="form-control fone" placeholder="Fone" maxlength="15" required value="{{ isset($paciente->fone) ? $paciente->fone : '' }}">
    </div>
</div>
