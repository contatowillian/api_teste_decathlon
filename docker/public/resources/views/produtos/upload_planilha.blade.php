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
            <form id="form_acao" class="col-xs-12 col-sm-12 col-lg-12" method="_post"  enctype="multipart/form-data" onsubmit="return false" >
               <div class="col-xs-12 col-sm-12 col-lg-12">
                  <div class="card">
                     <div class="card-header">
                        <strong>Upload Planilha de produtos</strong>
                     </div>
                     <div class="card-body card-block ">
                        <div class="form-group col-lg-7 " id="quadro_status">
                           Escolha um arquivo csv para fazer a atualização dos produtos
                           <div class="input-group">
                              <input accept=".csv" max-size=2154  name="arquivo_base"  required="required" type="file"   id="arquivo_base" class="form-control espaco_file_up">
                           </div>
                           <small class="exemplo_base form-text text-muted">
                            <a href="{{ URL::asset('lista_produtos_exemplo.csv')}}" style='font-size:18px;'><strong><i class="menu-icon fa fa-file-excel-o"></i> - Baixar exemplo de base de Produtos</strong></small></a>
                        </div>
                        <div class="col-lg-12 clear"></div>
                   
                        <div class="col-lg-12 clear "></div>
                        <div class="form-group  alert alert-success col-lg-11 col-sm-9" role="alert" id="mensagem_retorno_funcao">
                           Produtos salvo com sucesso!!
                        </div>
                        <div class="form-group  alert alert-danger col-lg-11 col-sm-9" role="alert" id="mensagem_erro_retorno_funcao">
                         </div>
                        <!---------------------- Progresso do arquivo -------------------------------v-->
                            <div class="col-lg-12 clear margin_carregando "></div>
                            <div class="  col-lg-1 "  id="quadro_bt_carregando">
                               <i id='fa_carregando_upload' class='fa fa-circle-o-notch fa-spin fa_carregando fa_carregando_verde'></i>
                            </div>
                            <div id="progressbar_upload" class="progress mb-3 col-lg-6">
                               <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" id="barra_progresso" style="width: 1%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                        <!---------------------- Progresso do arquivo -------------------------------v-->

                        <div class="col-lg-8 " id="quadro_bt_acao">
                           <div class="input-group">
                              <div class="input-group-addon">
                                 <i class="fa fa-save"></i>
                              </div>
                              <button id="botao_acao" type="submit"  class="btn btn-success btn-sm col-lg-3">
                              <i class="fa fa-dot-circle-o"></i> Upload
                              </button>
                           </div>
                        </div>

                        <div class="col-lg-12 clear"></div>
                        <div class="card-body col-lg-12"  id="resultado_importacao">

                                <p class="text-muted m-b-15">Resultado da importação</p>
                                <button onclick="abre_importados()" type="button" class=" info_button_importacao btn btn-success off m-l-10 m-b-10 col-lg-3 "><span class="badge badge-light" id="quantidade_sucesso">0</span> - Adicionados a fila para inserção <i class="fa fa-search-plus"></i></button>
                                </br>
                                <div class="form-group  alert alert-success col-lg-11 col-sm-9" role="alert" id="lista_importados"></div>
                                <button  onclick="abre_atualizados()"  type="button" class=" info_button_importacao btn btn-info m-l-10 m-b-10 col-lg-3"><span  class="badge badge-light" id="quantidade_atualizado">0</span> - Adicionados a fila para atualização  <i class="fa fa-search-plus"></i></button>
                                <div  class="form-group  alert alert-info col-lg-11 col-sm-9" role="alert" id="lista_atualizados"></div>
                                </br>
                                <button onclick="abre_erros_importacao()" type="button" class=" info_button_importacao btn btn-danger m-l-10 m-b-10 col-lg-3 "><span class="badge badge-light" id="quantidade_erros">0</span> - Erros <i class="fa fa-search-plus"></i></button>
                                <div class="form-group  alert alert-danger col-lg-11 col-sm-9" role="alert" id="lista_erros_importacao"></div>

                        </div>

                        </br>
                        </br>
                     </div>
                  </div>
               </div>
         </div>
         </form>
      </div>
      <!-- .animated -->
   </div>
   <!-- .content -->
   </div><!-- /#right-panel -->
   <!-- Right Panel -->
   <!-- Chama os Js que contem as funcoes para esta pagina -->
   <script src="{{ URL::asset('js/js_produtos/upload_produtos.js')}}"></script>
   <!-- footer do layout -->
   @include('base_layout.footer')
   <!-- footer do layout -->