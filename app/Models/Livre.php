<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Livre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'annee_publication',
        'nombre_pages',
        'auteur_id',
    ];

    public function auteur(): BelongsTo
    {
        return $this->belongsTo(Auteur::class);
    }

    public function emprunts(): HasMany
    {
        return $this->hasMany(Emprunt::class);
    }
}
