<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'nbr_heure',
        'prix_heure',
    ];
    public function Adherants()
{
    return $this->belongsToMany(Adherant::class, 'adherent_formation')
                ->withPivot('date_debut', 'prix_heure');
}
}
