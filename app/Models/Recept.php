<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recept extends Model
{
    protected $table = "recepti";
    protected $primaryKey = "idrecepta";

    protected $fillable = [
        'ime',
        'opis',
        'velikostjedi',
        'navodila',
        'caspriprave',
        'idZahtevnosti'
    ];

    protected $casts = [
        'velikostjedi' => 'integer',
        'caspriprave' => 'integer',
        'idZahtevnosti' => 'integer'
    ];

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
        return $this->belongsToMany(Sestavina::class, 'receptisestavine')
        ->withPivot('kolicina', 'enota');
    }

    public function attachSestavina($sestavina){
        $this->sestavine()->attach($sestavina, ['kolicina' => 69, 'enota' => 'keeloh']);
    }

    use HasFactory;
}
