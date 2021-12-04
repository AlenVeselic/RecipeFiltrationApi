<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priprava extends Model
{
    protected $table = "priprave";
    protected $primaryKey = "idpriprave";

    public $timestamps = false;

    protected $fillable = [
        'naziv'
    ];

    public function recepti(){
        return $this->belongsToMany(Recept::class, 'receptipriprave');
    }

    use HasFactory;


}
