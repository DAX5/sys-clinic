<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Nome:</strong>
        <x-input type="text" name="name" class="form-control" placeholder="Nome" required value="{{ isset($user->name) ? $user->name : '' }}" />
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Email:</strong>
        <x-input type="email" name="email" class="form-control" placeholder="Email" required value="{{ isset($user->email) ? $user->email : '' }}" />
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Senha:</strong>
        <x-input type="password" name="password" id="password" placeholder="Senha" class="form-control" minlength="8" autocomplete="new-password" />
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Confirmação de senha:</strong>
        <x-input type="password" name="password_confirmation" id="password_confirmation" placeholder="Senha" class="form-control" minlength="8"/>
    </div>
</div>
