<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaProdutos extends Model
{
    use SoftDeletes;

   protected $table = 'categoria_produtos';
   protected $primaryKey = 'categoria_produtos_id';
   protected $fillable = ['nome'];
   protected $dates = ['deleted_at'];
}
