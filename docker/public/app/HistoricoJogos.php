<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoricoJogos extends Model
{


   protected $table = 'historico_mensagens';
   protected $primaryKey = 'id_historico_mensagens';
   protected $fillable = ['mensagem'];
   protected $dates = ['data_hora'];
}
