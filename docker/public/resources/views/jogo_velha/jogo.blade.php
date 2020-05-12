
<!-- Chama o header do layout -->
@include('base_layout.head')
<!-- Chama o header do layout -->

<body> 

    <!-- Chama o menu do sistema -->
    @include('base_layout.menu')
    <!-- Chama o menu do sistema -->

    <!-- Chama o barra que fica no topo do lado direito sistema -->
    @include('base_layout.barra_topo')
    <!-- Chama o barra que fica no topo do lado direito sistema -->
 

        <div class="content mt-3 col-xs-12 col-sm-12 col-lg-12">
            <div class="animated fadeIn">

                <div class="row">

                    <form id="form_cadastro_usuario" method="_post"  enctype="multipart/form-data" onsubmit="return false" >

                        <!---------------------------- Variaveis do jogo --------------------------------->
                        <input type="hidden" name="simbolo_jogada_atual" id="simbolo_jogada_atual" value="X">
                        <input type="hidden" name="situacao_jogo" id="situacao_jogo" value="aberto">
                        <input type="hidden" name="quantidades_jogadas" id="quantidades_jogadas" value='0'>
                        <!---------------------------- Variaveis do jogo --------------------------------->        
                       
                        <div class=" col-lg-6 div_Tabela">                
                            <div class="card">
                                <div class="card-header">
                                    <strong>Jogo da Velha</strong>
                                </div>
                                </br>
                                
                                <div class="col-xs-12 col-sm-12 col-lg-12 div_legenda_layers">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card">
                                            <div class="card-body p-0 clearfix">
                                                <i class="fa fa-user bg-info p-4  tamanho_padding_icone_player font-2xl mr-3 float-left text-light"> - X</i>
                                                <div class="text-muted texto-legenda-jogada text-uppercase font-weight-bold font-xs small">Player 1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card">
                                            <div class="card-body p-0 clearfix">
                                                <i class="fa fa-laptop bg-info p-4 tamanho_padding_icone_player font-2xl mr-3 float-left text-light">- O</i>
                                                <div class="text-muted texto-legenda-jogada text-uppercase font-weight-bold font-xs small">Computador</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4">
                                    
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-gamepad"></i></div>
                                        <select  name="nivel_jogo"  required="required"  id="nivel_jogo" class="form-control">
                                            <option value="1">Nível 1 - Fácil</option>
                                            <option value="2">Nível 2 - Médio</option>
                                            <option value="3">Nível 3 - Difícil</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <!------------------ Jogo da Velha ------------------------>
                                <table class="Tabela_jogo_velha">
                                    <tr class='linha_1'>
                                        <td class='quadro_1' onclick="jogada(1)"></td>
                                        <td class='quadro_2' onclick="jogada(2)"></td>
                                        <td class='quadro_3' onclick="jogada(3)"></td>
                                    </tr>
                                    <tr class='linha_2'>
                                        <td class='quadro_4' onclick="jogada(4)"></td>
                                        <td class='quadro_5' onclick="jogada(5)"></td>
                                        <td class='quadro_6' onclick="jogada(6)"></td>
                                    </tr>
                                    <tr  class='linha_3'>
                                        <td class='quadro_7' onclick="jogada(7)"></td>
                                        <td class='quadro_8' onclick="jogada(8)"></td>
                                        <td class='quadro_9' onclick="jogada(9)"></td>
                                    </tr>
                                </table>
                                <!------------------ Jogo da Velha ------------------------>
                            
                                <div class="col col-md-12"><br></div>
                                <div class="col-lg-12 clear espaco_bt_acao">
                                <button class="btn btn-danger btn-sm" onclick="reiniciar_jogo()"><i class="fa fa-refresh"></i> Reiniciar Jogo</button>
                                </div>    
                                <br>
                            </div>
                        </div>


                        <div class="col-xs-6 col-sm-6 col-lg-6 ">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Histórico Jogo da Velha</strong>
                                </div>
                                </br>
                                <div id="historico_mensagens">
                                    <div class="form-group  alert alert-info col-lg-11 col-sm-6" role="alert" >
                                        Faça uma jogada para iniciar o jogo!
                                    </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
            </form>
            </div><!-- .animated -->
        </div><!-- .content -->

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script>

    </script>

    <!-- Chama os Js que contem as funcoes para esta pagina -->
    <script src="{{ URL::asset('js/js_jogo/js_controles_jogo.js')}}"></script>

    <!-- footer do layout -->
    @include('base_layout.footer')
    <!-- footer do layout -->




