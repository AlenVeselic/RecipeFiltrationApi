<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    protected $table = "diete";
    protected $primaryKey = "iddiete";

    public $timestamps = false;
    public function recepti(){
        return $this->belongsToMany(Recept::class, 'receptidiete');
    }
    use HasFactory;
}
