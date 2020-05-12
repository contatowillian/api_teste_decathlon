<?php

/**
 * Classe criada por: Willian Batista
 * Data: 09/05/2020
 * Motivo : Teste para a Decathlon
 *
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp;
use GuzzleHttp\Client;


class ApiBikeCityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $url_api;
    protected $client;
    protected $headers;

    public function __construct(Client $client)
    {
        $this->middleware('auth', ['except' => ['Gera_json_api_CityBike']]);
        $this->url_api = 'http://api.citybik.es/v2/networks';
        $this->client= $client;
        $this->headers = [
            'cache-control' => 'no-cache',
            'content-type' => 'application/x-www-form-urlencoded'
        ];

    }

    /**** Classe que chama a pagina de interface do usuario ***/
    public function index()
    {
        return view('api_bike_city.busca_bikes');
    }

    /**** Classe que chama os graficos da home***/
    public function Graficos_City_Bike()
    {   
        return view('api_bike_city.graficos_home');
    }


    /*** Classe que calcula distancia em KM usando latitude e longitude ***/
    function calcula_distancia_em_Km_lat_long($lat1, $lon1, $lat2, $lon2) {

        /** Recebe os dados */
        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);
        $lon1 = deg2rad($lon1);
        $lon2 = deg2rad($lon2);

        // Faz o calculo com os dados
        $dist = (6371 * acos( cos( $lat1 ) * cos( $lat2 ) * cos( $lon2 - $lon1 ) + sin( $lat1 ) * sin($lat2) ) );
        $dist = number_format($dist, 2, '.', '');

        // Retorna a distância
        return $dist;
    }


    /***** Classe que gera o json da api que é chamada pelo front end *******/
    public function Gera_json_api_CityBike(Request $request)
    {
        /**********Pega as variaveis enviadas pelo http**********************/
        $dados = $request->all();
       
        /********** Url base da API **********************/
        $url_da_api_city_bike = $this->url_api;
        
        /***************Chama a API e pega o status e os dados json***************/
        $resposta_api = $this->chamada_generica_api($url_da_api_city_bike); 
        $resposta_em_json = json_decode($resposta_api['resposta_api']);
        $status = $resposta_api['status'];
        /***************Chama a API e paga o status e os dados json***************/

        return  $this->VerificaDadosRetorno($resposta_api,$status,$resposta_em_json,$url_da_api_city_bike,$dados);

    }

     /******** Classe que faz a chamada generica pra qualquer API ****************/
    public function chamada_generica_api($url_da_api_city_bike)
    {   
        $retorn_funcao_api = array();

        $request = $this->client->get($url_da_api_city_bike, [
            'http_errors'     => true
        ]);
        
        /***************************** Pega o retorno e o status da função **********/
        $retorn_funcao_api['status'] = $request ? $request->getStatusCode() : 500;
        $retorn_funcao_api['resposta_api'] = $request ? $request->getBody()->getContents() : null;

        return  $retorn_funcao_api;
        
    }

  
    /**Classe que varre o array dos dados ***/
    public function VerificaDadosRetorno($resposta_api,$status,$resposta_em_json,$url_da_api_city_bike,$dados)
    {   

    /**********filtros condicionais**********************/
    $search_city =  isset($dados['search_city']) ? $dados['search_city'] : '';	
    $search_name =  isset($dados['search_name']) ? $dados['search_name'] : '';	
    $latitude    =  isset($dados['latitude']) ? $dados['latitude'] : '';
    $longitude   =  isset($dados['longitude']) ? $dados['longitude'] : '';
    /**********filtros condicionais**********************/

    // Verifica o status  da resposta da API
    if ($resposta_api && $status === 200 && $resposta_api !== 'null') {

        $resposta_em_json_br= array();
        $contador=0;
            
        /***************************************** Varre o array de retorno  *****************************************/
        foreach($resposta_em_json->networks as $linha_resposta_api){

            if($linha_resposta_api->location->country=='BR'){
                
                $resposta_api_2 = $this->chamada_generica_api($url_da_api_city_bike.'/'.$linha_resposta_api->id); 
                $resposta_em_json_2 = json_decode($resposta_api_2['resposta_api']);

                /****************************************** Calcula a latitude e longitude  *************************************/
                foreach($resposta_em_json_2->network->stations as $linha_stations){

                    if($latitude!='' and $longitude!='' and isset($linha_stations->latitude) and isset($linha_stations->longitude)){
                        $linha_stations->distancia_em_km = $this->calcula_distancia_em_Km_lat_long($latitude,$longitude,$linha_stations->latitude,$linha_stations->longitude);
                    }else{
                        $linha_stations->distancia_em_km = 'Localização não informada';
                    }

                }

                /***************************************** Verifica se os filtros foram enviadas  *****************************************/
                if($search_city=='' && $search_name==''){
                    $resposta_em_json_br['dados'][$contador] = $resposta_em_json_2->network;
                    $contador++;
                }else if ($search_city!='' && isset($resposta_em_json_2->network->location->city) and strpos( $resposta_em_json_2->network->location->city, $search_city) !== false) {
                    $resposta_em_json_br['dados'][$contador] = $resposta_em_json_2->network;
                    $contador++;
                }else if ( $search_name!='' && isset($resposta_em_json_2->network->name) and   strpos( $resposta_em_json_2->network->name, $search_name) !== false ) {
                    $resposta_em_json_br['dados'][$contador] = $resposta_em_json_2->network;
                    $contador++;
                }
            }
            }
            return response()->json($resposta_em_json_br);

            // Se a resposta do status for diferente e 200 exibe o erro    
            }else{
                return response('Erro ao retornar api', 500)->header('Content-Type', 'text/plain');
            }
    }

}
