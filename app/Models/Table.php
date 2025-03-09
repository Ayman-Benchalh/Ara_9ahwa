<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = ['numero', 'qr_code'];

    // Relation : Une table peut avoir plusieurs commandes
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
