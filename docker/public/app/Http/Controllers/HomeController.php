<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
use App\Especialidades;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['AlbumFamilia','GaleriaVideos','index','galeria']]);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $retorno = '';

        return view('site_portifolio_willian.index',compact('retorno'));
    }

    public function index_sistema()
    {
       $retorno = '';

        return view('jogo_velha.jogo',compact('retorno'));
    }

    public function AlbumFamilia()
    {
       $retorno = '';

        return view('album_familia.album',compact('retorno'));
    }

    public function galeria()
    {
       $retorno = '';

        return view('album_familia.galeria',compact('retorno'));
    }

    public function GaleriaVideos()
    {
       $retorno = '';

        return view('album_familia.videos_familia',compact('retorno'));
    }
    

    
}
