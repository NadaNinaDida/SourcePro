<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationEnseignant extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_enseignant',
        'id_cours',
        'prix_heure',
    ];

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'id_enseignant');
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'id_cours');
    }

}
