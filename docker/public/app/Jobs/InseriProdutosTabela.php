<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Produtos;
use App\CategoriaProdutos;
use DB;
use App\FilaProduto;

class InseriProdutosTabela implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


        $varre_lista_produtos_pendentes = DB::table('fila_produtos')->where('processado',0)->get();

        foreach($varre_lista_produtos_pendentes as $linha_lista_produtos_pendentes){
            
            
            $dados_linha_arquivo = explode(',',$linha_lista_produtos_pendentes->string_linha_arquivo) ;

            /* Caso de certo salva na tabela */
            $post = new Produtos;
            $post->nome = $dados_linha_arquivo[0];
            $post->peso = $dados_linha_arquivo[1];
            $post->cor = $dados_linha_arquivo[2];
            $post->descricao = $dados_linha_arquivo[3];
            $post->categoria_id = $linha_lista_produtos_pendentes->categoria_produtos_id;
            /*verifica se ja existe*/
            $get_nome_produto = DB::table('produtos')->where('nome',$dados_linha_arquivo[0])->get();
            $array_produto_existe = json_decode(json_encode($get_nome_produto), true);
            if(isset($array_produto_existe[0]['produto_id'])){
                $post->exists = true;
                $post->produto_id = $array_produto_existe[0]['produto_id'];
                $texto_log = "Produto $dados_linha_arquivo[0] Atualizado com sucesso ";
            }else{
                $texto_log = "Produto $dados_linha_arquivo[0] Inserido com sucesso ";
            }

            if($post->save()){
                /* Caso de certo coloca como processado */
                $fila_produtos = new FilaProduto;
                $fila_produtos->processado = '1';
                $fila_produtos->log_importacao = $texto_log;
                $fila_produtos->fila_produtos_id = $linha_lista_produtos_pendentes->fila_produtos_id;
                $fila_produtos->exists = true;

                
                $fila_produtos->save();
            }

        }
           

    }
}
