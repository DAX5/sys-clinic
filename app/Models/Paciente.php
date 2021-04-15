<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paciente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pacientes';
    public $timestamps = true;

    protected $casts = [
        'nome' => 'string',
        'email' => 'string',
        'cpf' => 'string',
        'fone' => 'string',
    ];
    
    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'fone',
    ];    
}