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

                    <input type="hidden" name="quantidade_importada" id="quantidade_importada" value="0"> 

                    <input type="hidden" name="quantidade_arquivos" id="quantidade_arquivos" value="0">  
                       
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Upload Pv</strong>
                            </div>
                            <div class="card-body card-block ">

                            <!------------------ Esse é o quadro que tenho o upload do arquivo --------------><div class="col-lg-12 " id="quadro_bt_acao">
                                <div class="form-group col-lg-6 " id="quadro_status">Status *
                                    <div class="input-group">
                                           <input multiple required="required" accept="" max-size=3154  name="arquivo_base"  type="file"   id="arquivo_base" class="form-control">
                                    </div>
                                    <small class="form-text text-muted">Escolha um arquivo .xls ou .xlsx de no máximo 2MB</small>
                                </div>

                                 <div class="col-lg-8 clear espaco_bt_acao">
                                    <div class="form-group  alert alert-danger col-lg-11 col-sm-9" role="alert" id="mensagem_retorno_upload_arquivo">
                                          
                                    </div>
                                </div>
                               <div id="progressbar_upload" class="progress mb-3 col-lg-6">
                               <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" id="barra_progresso" style="width: 1%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                               </div>


                                <div class="card-body col-lg-12"  id="resultado_importacao">

                                <p class="text-muted m-b-15"><strong>Resultado da importação</strong></p>

                                <button onclick="abre_importados()" type="button" class=" info_button_importacao btn btn-success off m-l-10 m-b-10 col-lg-4 "><span class="badge badge-light" id="quantidade_sucesso">0</span> - Adicionados a fila para inserção <i class="fa fa-search-plus"></i></button>
                                </br>

                                <div class="form-group  alert alert-success col-lg-11 col-sm-9" role="alert" id="lista_importados"></div>


                                 <button  onclick="abre_atualizados()"  type="button" class=" info_button_importacao btn btn-warning m-l-10 m-b-10 col-lg-4"><span  class="badge badge-light" id="quantidade_atualizado">0</span> - Adicionados a fila para atualização <i class="fa fa-search-plus"></i></button>

                                <div  class="form-group  alert alert-warning col-lg-11 col-sm-9" role="alert" id="lista_atualizados"></div>

                                 </br>
                                <button  onclick="abre_erros_importacao()" type="button" class=" info_button_importacao btn btn-danger m-l-10 m-b-10 col-lg-4 "><span class="badge badge-light" id="quantidade_erros">0</span> - Erros <i class="fa fa-search-plus"></i></button>

                                <div class="form-group  alert alert-danger col-lg-11 col-sm-9" role="alert" id="lista_erros_importacao"></div>
                                </div>
                            </div>
                            </div>
                            </div>
                         
                            <!------------------ Esse é o quadro que tenho o upload do arquivo -------------->
                        </div>
                     </div>
                     </form>
                     <!------------------ Aqui vai abrir o quadros para cada arquivo  -------------->
                      <div id="quadro_arquivos">
                      </div>
                      <!------------------ Aqui vai abrir o quadros para cada arquivo -------------->
                </div>
           
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->

    <!-- Chama os Js que contem as funcoes para esta pagina -->

    <script src="{{ URL::asset('js/xlsx.core.min.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.ui.widget.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.iframe-transport.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.fileupload.js')}}"></script>
    <script src="{{ URL::asset('js/js_pv/upload_pv.js')}}"></script>

<!-- footer do layout -->
@include('base_layout.footer')
<!-- footer do layout -->