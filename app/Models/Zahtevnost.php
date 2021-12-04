<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zahtevnost extends Model
{
    protected $table = "zahtevnosti";
    protected $primaryKey = "idzahtevnosti";

    public $timestamps = false;

    public function recepti(){
        return $this->hasMany(Recept::class);
    }

    use HasFactory;
}
