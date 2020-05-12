
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

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Busca na API City Bikes</strong>
                    </div>
                    <div class="card-body">
                        <form action="#" id="dados_form" type="get">        
                            <div class="row">
                                <div class="col-md-3">
                                <label for="search_name_lab" class="control-label mb-1">Nome</label>
                                        <div class="input-group">
                                        <input id="search_name" name="search_name" type="text" class="form-control cc-cvc" value="" autocomplete="off">
                                        <div class="input-group-addon">
                                        <span class="fa fa-address-card-o fa-lg" data-toggle="popover" data-container="body" data-html="true"></span>
                                        </div>
                                        </div>
                                </div>
                                <div class="col-md-3">
                                        <label for="city_search_lab" class="control-label mb-1">Cidade</label>
                                            <div class="input-group">
                                                <input id="search_city" name="search_city" type="text" class="form-control cc-cvc" value="" >
                                            <div class="input-group-addon">
                                                <span class="fa fa-map-o fa-lg" data-toggle="popover" data-container="body" data-html="true" data-title="Security Code" ></span>
                                            </div>
                                        </div>
                                </div>

                                <div class="col-md-3">
                                      <div class="dataTables_length" >
                                         <label>
                                            Ordernação 
                                            <select aria-controls="bootstrap-data-table-export" class="custom-select custom-select-sm form-control form-control-sm" name="ordenacao" id="ordenacao" onchange="muda_ordenacao(this.value)">
                                               <option value="3">Mais Proxímos</option>
                                               <option value="2">Nº Bikes</option>
                                               <option value="1">Local</option>
                                               <option value="0">Nome</option>
                                            </select>
                                         </label>
                                      </div>
                                   </div>
                                <div class="col-md-3" >
                                    <br>
                                    <div id='react_root'></div>                                              
                                </div>        
                            </div>
                            <input type='hidden' name='latitude' id='latitude' />
                            <input type='hidden' name='longitude' id='longitude' />
                            </div>
                        <br> 
                        <div class="row padding_tabela">
                            <div class="col-md-12">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Local</th>
                                            <th>Nº de Bikes disponíveis</th>
                                            <th>Distância em KM</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listagem_dados">
                                    <tr>
                                    <td  class='texto_buscar'>Clique no botão para buscar</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    </tr>                                  
                                    </tbody>
                                </table>
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


<div id="root"></div>

<!-- Chama os Js que contem as funcoes para esta pagina -->
<script type = "text/babel" src="{{ URL::asset('js/js_bike_city/scripts_api_bike_citys.js')}}"></script>
<script src="{{ URL::asset('js/react/react.js')}}"></script>
<script src="{{ URL::asset('js/react/react-dom.js')}}"></script>
<script src="{{ URL::asset('js/react/babel.min.js')}}"></script>
<script src="{{ URL::asset('js/jquery.dataTables.min.js')}}"></script>

<!-- Right Panel -->

<!-- footer do layout -->
@include('base_layout.footer')
<!-- footer do layout -->