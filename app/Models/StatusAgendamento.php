<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusAgendamento extends Model
{
    use HasFactory;

    protected $table = 'status_agendamentos';

    protected $casts = [
        'status' => 'string',
    ];
    
    protected $fillable = [
        'status',
    ];

    /**
     * Get the agendamentos for the status.
     */
    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
}
