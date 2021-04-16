<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Nome:</strong>
        <x-input type="text" name="nome" class="form-control" placeholder="Nome" required value="{{ isset($medico->nome) ? $medico->nome : '' }}" />
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Email:</strong>
        <x-input type="email" name="email" class="form-control" placeholder="Email" required value="{{ isset($medico->email) ? $medico->email : '' }}" />
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>CPF:</strong>
        <x-input type="text" name="cpf" class="form-control cpf" placeholder="CPF" maxlength="14" required value="{{ isset($medico->cpf) ? $medico->cpf : '' }}" />
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Fone:</strong>
        <x-input type="text" name="fone" class="form-control fone" placeholder="Fone" maxlength="15" required value="{{ isset($medico->fone) ? $medico->fone : '' }}" />
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Especialidade:</strong>
        <x-input type="text" name="especialidade" class="form-control" placeholder="Especialidade" maxlength="15" required value="{{ isset($medico->especialidade) ? $medico->especialidade : '' }}" />
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>CRM:</strong>
        <x-input type="text" name="crm" class="form-control crm" placeholder="CRM" maxlength="15" required value="{{ isset($medico->crm) ? $medico->crm : '' }}" />
    </div>
</div>
