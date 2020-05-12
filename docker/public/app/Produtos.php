<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produtos extends Model
{
   use SoftDeletes;

   protected $table = 'produtos';
   protected $primaryKey = 'produto_id';
   protected $fillable = ['nome','peso','cor','descricao'];
   protected $dates = ['deleted_at'];

}
