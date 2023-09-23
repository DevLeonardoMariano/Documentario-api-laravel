<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentario extends Model
{
   protected $appends = ['image_url'];

   protected $fillable = [
      'titulo',
       'autor',
        'imagem',
         'resumo'
      ];

      public function getImageUrlAttribute($size=null)
      {
          return asset('images/' . $this->imagem);
      }
}
