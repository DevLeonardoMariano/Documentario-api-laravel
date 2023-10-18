<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documentario;

class Avaliacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'nota',
        'documentario_id'
    ];

    protected $with = [
        'documentario'
    ];


    protected $table = 'avaliacoes';
    
    public function documentario(){

        return $this->hasOne(Documentario::class,'id','documentario_id');
    }


}
