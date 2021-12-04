<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sestavina extends Model
{
    protected $table = "sestavine";
    protected $primaryKey = "idsestavine";

    public $timestamps = false;

    public function recepti(){
        return $this->belongsToMany(Recept::class, 'receptisestavine');
    }

    use HasFactory;
}
