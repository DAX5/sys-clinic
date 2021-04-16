<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agendamento extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'agendamentos';
    public $timestamps = true;

    protected $casts = [
        'paciente_id' => 'integer',
        'medico_id' => 'integer',
        'status_id' => 'integer',
        'horario' => 'datetime',
    ];
    
    protected $fillable = [
        'paciente_id',
        'medico_id',
        'status_id',
        'horario',
    ];

    /**
     * Get the paciente that owns the agendamento.
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    /**
     * Get the medico that owns the agendamento.
     */
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    /**
     * Get the status that of the agendamento.
     */
    public function status()
    {
        return $this->belongsTo(StatusAgendamento::class);
    }
}
