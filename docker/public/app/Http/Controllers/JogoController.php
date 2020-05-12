<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
use App\HistoricoJogos;
use DB;
use Illuminate\Support\Facades\Auth;


class JogoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function jogo_velha()
    {
        $retorno = '';
        return view('jogo_velha.jogo',compact('retorno'));
    }

    public function pesquisa_historico_jogo()
    {
        $retorno = '';
        return view('jogo_velha.pesquisa_historico',compact('retorno'));
    }

    
    public function historico_jogo_velha(Request $request)
    {
      // pega os dados do Post
      $dados = $request->all();
        
      if(isset($dados['texto_msg'])){
        
        $id_usuario = Auth::id();

        $post = new HistoricoJogos;
        $post->id_usuario = $id_usuario;
        $post->mensagem = $dados['texto_msg'];
        $post->save();
      }
      
    }


    /**
	  * Exibir uma listagem dos registros
	  *
	  * @return Response
	  */
	public function request_lista_jogo(Request $request, $id = null) {
	     
        /**********faz os filtros condicionais**********************/
        $dados = $request->all();
  
      
        if(!isset($dados['filtro'])){
            $filtro = '';
        }else{
            $filtro = $dados['filtro'];
        }
  
        if(!isset($dados['limite'])){
            $limite = '9999999999999';
        }else{
            $limite = $dados['limite'];
        }
  
        if(!isset($dados['pagina'])){
            $pagina = '1';
        }else{
            $pagina = $dados['pagina'];
        }
       
        $pagina = $pagina-1;
        $offset = $pagina * $limite;
        /**********faz os filtros condicionais**********************/
  
  
        /******* comeca a montar a query **************************/
        $query = new HistoricoJogos;
  
         //monta a query
         $lista_produtos['lista'] = $query->select('historico_mensagens.data_hora','historico_mensagens.mensagem', 'users.name' )
                                             ->join('users', 'users.id', '=', 'historico_mensagens.id_usuario')
                                          ->orderBy('historico_mensagens.data_hora', 'desc')
                                          /*->Where('tb_usuarios.status', '=', $status)*/
                                          ->Where('historico_mensagens.data_hora','like', '%' .$filtro. '%')
                                          ->orWhere('historico_mensagens.mensagem','like', '%' .$filtro. '%')
                                          ->orWhere('users.name','like', '%' .$filtro. '%')
                                          ->offset($offset)
                                          ->limit($limite)
                                            ->get();
  
  
          //Faz a mesma query de cima mas somente o count	      				    
          $lista_produtos['qtd_registros'] =   count( $query->select('historico_mensagens.data_hora','historico_mensagens.mensagem')
                                        ->join('users', 'users.id', '=', 'historico_mensagens.id_usuario')
                                          /*->Where('tb_usuarios.status', '=', $status)*/
                                          ->Where('historico_mensagens.data_hora','like', '%' .$filtro. '%')
                                          ->orWhere('historico_mensagens.mensagem','like', '%' .$filtro. '%')
                                          ->orWhere('users.name','like', '%' .$filtro. '%')
                                            ->get());
  
          print_r(json_encode($lista_produtos)); 		
      }
       
    
}
