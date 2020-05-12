
<!-- Chama o header do layout -->
<?php echo $__env->make('base_layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Chama o header do layout -->

<body>

    <!-- Chama o menu do sistema -->
    <?php echo $__env->make('base_layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Chama o menu do sistema -->
      

    <!-- Chama o barra que fica no topo do lado direito sistema -->
    <?php echo $__env->make('base_layout.barra_topo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Chama o barra que fica no topo do lado direito sistema -->


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Pesquisa histórico de jogadas</strong>
                            </div>

                            <div class="card-body">
                                <form action="#" id="dados_form" type="get">        
                                   <div class="row">
                                   <input type="hidden"  name="pagina" id="pagina" value="1"  >
                                   <div class="col-sm-12 col-md-8">
                                      <div id="bootstrap-data-table-export_filter" class="dataTables_filter col-md-12">Filtro:<input  onkeyup="busca()" type="search" class="form-control form-control-sm col-md-7" name="filtro" placeholder="Digite o nome do produto ou descrição para procurar" aria-controls="bootstrap-data-table-export"></div>
                                   </div>     
                                 

                                   <div class="col-sm-12 col-md-2">
                                      <div class="dataTables_length" >
                                         <label>
                                            Registros 
                                            <select aria-controls="bootstrap-data-table-export" class="custom-select custom-select-sm form-control form-control-sm" name="limite" id="limite" onchange="busca()">
                                               <option value="20">20</option>
                                               <option value="30">30</option>
                                               <option value="50">50</option>
                                               <option value="999999">Todos</option>
                                            </select>
                                         </label>
                                      </div>
                                   </div>
                                  </div>
                                <br>
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Data Hora</th>
                                            <th>Usuário</th>
                                            <th>Mensagem</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listagem_dados">                                        
                                    </tbody>
                                </table>
                                <div class="row card-body">
                                   <div class="col-sm-12 col-md-3">
                                      <div class="dataTables_info" id="bootstrap-data-table-export_info" role="status" aria-live="polite">Mostrando <span id="numero_registros">1-10 registros</span></div>
                                   </div>
                                   <div class="col-sm-12   col-md-9  ">
                                      <div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table-export_paginate ">
                                         <ul class="pagination float-right" id="listagem_paginacao">
                                            </div>
                                         </ul>
                                      </div>
                                   </div>
                                </div>
                            </div>

                          </form >

                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Chama os Js que contem as funcoes para esta pagina -->
    <script src="<?php echo e(URL::asset('js/js_jogo/js_pesquisa_historico_jogadas.js')); ?>"></script>

    <!-- Right Panel -->

<!-- footer do layout -->
<?php echo $__env->make('base_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- footer do layout --><?php /**PATH /var/www/public/laravel_site_wbatista/resources/views/jogo_velha/pesquisa_historico.blade.php ENDPATH**/ ?>