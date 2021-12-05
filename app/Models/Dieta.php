<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    protected $table = "diete";
    protected $primaryKey = "idDiete";

    protected $fillable = [
        'ime'
    ];

    public $timestamps = false;
    public function recepti(){
        return $this->belongsToMany(Recept::class, 'receptidiete','idDiete','idRecepta');
    }
    use HasFactory;
}
