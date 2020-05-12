<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FilaProduto extends Model
{
    use SoftDeletes;

    protected $table = 'fila_produtos';
    protected $primaryKey = 'fila_produtos_id';
    protected $fillable = ['string_linha_arquivo','categoria_produtos_id'];
    protected $dates = ['deleted_at'];
}
