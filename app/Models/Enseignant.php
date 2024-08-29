<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'adresse',
        'email',
        'qualification',
    ];
    public function formations()
{
    return $this->hasMany(FormationEnseignant::class, 'id_enseignant');
}

}
