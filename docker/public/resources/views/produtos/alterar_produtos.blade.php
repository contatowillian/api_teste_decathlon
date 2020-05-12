
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
 

        <div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">
                    <form id="form_cadastro_usuario" method="_post"  enctype="multipart/form-data" onsubmit="return false" >

                        <input type="hidden" name="id_registro" id="id_registro" value="<?php echo ( isset($_GET['id_registro'])? $_GET['id_registro'] : "" ); ?>">
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong><?php echo ( isset($_GET['id_registro'])? "Alterar produto" : "Cadastro de produto" ); ?> </strong>
                            </div>
                            <div class="card-body card-block ">

                                <div class="form-group col-lg-6">Nome *
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input maxlength="255" class="form-control" required="required" name="nome" id="nome" value="<?php echo ( isset($retorno_view['dados_produto']->nome) ? $retorno_view['dados_produto']->nome : "" ); ?>"  > 
                                    </div>
                                    <small class="form-text text-muted">Preencha o nome</small>
                                </div>


                                <div class="form-group col-lg-6">
                                    <label class=" form-control-label">Peso *</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-balance-scale"></i></div>
                                        <input maxlength="255" required="required"   name="peso" id="peso" class="form-control"
                                         value="<?php echo ( isset($retorno_view['dados_produto']->peso) ? $retorno_view['dados_produto']->peso : "" ); ?>">
                                    </div>
                                        <small class="form-text text-muted">100 gramas**</small>
                                </div>

                              
                                <div class="form-group col-lg-6">
                                    <label class=" form-control-label">Cor *</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-paint-brush"></i></div>
                                        <input  maxlength="255" required="required"  name="cor" id="cor" class="form-control" value="<?php echo ( isset($retorno_view['dados_produto']->cor) ? $retorno_view['dados_produto']->cor : "" ); ?>">
                                    </div>
                                    <small class="form-text text-muted">Vermelho</small>
                                </div>


                                <div class="form-group col-lg-6">
                                    <label class=" form-control-label">Descrição *</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-sticky-note "></i></div>
                                        <input  maxlength="255" required="required"  name="descricao" id="descricao" class="form-control" value="<?php echo ( isset($retorno_view['dados_produto']->descricao) ? $retorno_view['dados_produto']->descricao : "" ); ?>">
                                    </div>
                                    <small class="form-text text-muted">Descrição do produto</small>
                                </div>

                          
                                 <div class="col-lg-6 col-sm-6 padding_0">
                                    <div class="col col-md-12">
                                        <label for="select" class=" form-control-label">Categoria *</label>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <select  name="categoria_id"  required="required"  id="categoria_id" class="form-control">
                                           
                                            <?php foreach($retorno_view['lista_categorias'] as $array_categorias) {
                                              if($array_categorias->categoria_produtos_id==$retorno_view['dados_produto']->categoria_id){ $selected = 'selected '; }else{ $selected = '';  } ?>
                                                <option {{$selected}} value="{{ $array_categorias->categoria_produtos_id }}">{{ $array_categorias->nome }}
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            <div class="col col-md-12"><br></div>
                            <div class="col-lg-12 clear espaco_bt_acao">
                            <div class="form-group  alert alert-success col-lg-11 col-sm-9" role="alert" id="mensagem_retorno_funcao">
                                  Produto salvo com sucesso!!
                                </div>
                            </div>    
                            <div class="form-group  alert alert-danger col-lg-11 col-sm-9" role="alert" id="mensagem_erro_retorno_funcao">
                                </div>
                            </div>    
                                                        
                            <div class="form-group col-lg-8 espaco_bt_acao">
                                <div class="input-group">
                                    <!-- div class="input-group-addon"><i class="fa fa-save"></i></div> -->
                                    <button id="botao_acao" type="submit"  class="btn btn-success btn-sm col-lg-3">
                                    <i class="fa fa-save"></i> Alterar
                                    </button>
                                </div>
                            </div>
                            </br></br>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
            </div><!-- .animated -->
        </div><!-- .content -->

    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <!-- Chama os Js que contem as funcoes para esta pagina -->
    <script src="{{ URL::asset('js/js_produtos/js_cadastro_produtos.js')}}"></script>

<!-- footer do layout -->
@include('base_layout.footer')
<!-- footer do layout -->


