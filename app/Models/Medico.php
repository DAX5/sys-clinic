<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medico extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'medicos';
    public $timestamps = true;

    protected $casts = [
        'nome' => 'string',
        'email' => 'string',
        'cpf' => 'string',
        'fone' => 'string',
        'especialidade' => 'string',
        'crm' => 'int',
    ];
    
    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'fone',
        'especialidade',
        'crm',
    ];

    /**
     * Get the agendamentos for the medico.
     */
    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
}
