<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recept extends Model
{
    protected $table = "recepti";
    protected $primaryKey = "idrecepta";

    public function zahtevnost(){
        return $this->belongsTo(Zahtevnost::class, 'idZahtevnosti');
    }

    public function priprave(){
        return $this->belongsToMany(Priprava::class, 'receptipriprave');
    }

    public function attachRelation($type, $priprave){
        
        $this->priprave()->attach($priprave);
    }

    public function diete(){
        return $this->belongsToMany(Dieta::class, "receptidiete");
    }

    public function sestavine(){
        return $this-belongsToMany(Sestavina::class, 'receptisestavine');
    }
    use HasFactory;
}
