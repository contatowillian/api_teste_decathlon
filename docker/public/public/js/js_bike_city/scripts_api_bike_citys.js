/************************ Class React que chama a API ****************************/
function ApiCityBike() {


    /**** Faz a chamada ajax da API */
    function chama_api_city_bike() {

        // Limpa a tabela de dados
        zera_tabela('tabela_carregando');
        $("#listagem_dados").html("");
        $("#listagem_dados").html("<tr align='center' ><td ><i class='fa fa-circle-o-notch fa-spin fa_carregando'></i></td><td></td><td></td><td></td></tr>" );

        var variaveis_busca = '?latitude='+ $("#latitude").val()+'&longitude='+ $("#longitude").val()+'&search_city='+ $("#search_city").val()+'&search_name='+$("#search_name").val();

        fetch('../sistema/Gera_json_api_CityBike'+variaveis_busca).then(
        function(response) {
        if (response.status !== 200) {
            zera_tabela('carregamento_concluido');
            $("#listagem_dados").html("<div class='alert alert-danger' >Falha ao executar função,Por favor faça o login novamente. Caso o erro persista Por favor informe ao adminstrador do sistema</div>");
            return false;
        }
        response.text().then(function(data) {
            
            /******************** Trata o retorno json da API ***********************/
            var obj = JSON.parse(data);
            var length = Object.keys(obj).length;
            var contador = 0;
            $("#listagem_dados").html("");
            
      
            $.each(obj.dados , function() {
                
                if(this.location.city === undefined){
                    var cidade = ''; 
                }else{
                    var cidade = this.location.city;
                }

                if(this.name === undefined){
                    var nome_empresa = ''; 
                }else{
                    var nome_empresa = this.name;
                }

                $.each(this.stations , function() {

                    if(this.free_bikes === undefined){
                    var bikes = ''; 
                    }else{
                        var bikes = this.free_bikes;
                    }

                    if(this.extra.address === undefined){
                         var endereco = ''; 
                    }else{
                        var endereco = this.extra.address;
                    }

                    if(this.distancia_em_km === undefined){
                         var distancia_em_km = ''; 
                    }else{
                        var distancia_em_km = this.distancia_em_km;
                    }

                    $("#listagem_dados").append("<tr>"+
                                                    "<td>"+nome_empresa+"</td>"+
                                                    "<td>"+endereco+' - '+cidade+"</td>"+
                                                    "<td>"+bikes+"</td>"+
                                                    "<td>"+distancia_em_km+"</td>"+
                                                "</tr>");
                    contador++;
                });
              
            });
        
            zera_tabela('carregamento_concluido');

            if(contador==0){
                $("#listagem_paginacao").html('');
                $("#listagem_dados").html("<tr><td class='texto_buscar'>Nenhum registro encontrado com o termo</td><td></td><td></td><td></td></tr>");
            }
            });
            /******************** Trata o retorno json da API ***********************/
        })  
    }
    return (
        <button type='button' id='botao_busca_api'  onClick={chama_api_city_bike} className="btn btn-dark bt_search" ><span id='icone_busca' className="fa fa-search fa-lg"  ></span></button>
         );
    }
    
    ReactDOM.render(
    <ApiCityBike />,
    document.getElementById('react_root')
    );

    //funcao que limpa a tabela antes de receber os dados
    function zera_tabela(tipo_acao){

        if(tipo_acao=='tabela_carregando'){
            $("#bootstrap-data-table-export").dataTable().fnDestroy();
            $("#icone_busca").removeClass("fa-search");
            $("#icone_busca").addClass("fa-circle-o-notch");
            $("#icone_busca").addClass("fa-spin");
            $("#listagem_paginacao").html('');
        }else if(tipo_acao=='carregamento_concluido'){
            $("#icone_busca").addClass("fa-search");
            $("#icone_busca").removeClass("fa-circle-o-notch");
            $("#icone_busca").removeClass("fa-spin");

            var ordenacao = $( "#ordenacao option:selected" ).val();

            $('#bootstrap-data-table-export').DataTable({
                paging: true,
                searching: true,
                export: true,
                dom: 'Bfrtip',
                "order": [[ ordenacao, "asc" ]],
                buttons: [
                        'colvis',
                        'excel',
                        'print'
                ]
            } );
        }
    }
    /************************ Class React que chama a API ****************************/
   
    $(document).ready(function() {
        $('input[type=text]').on('keydown', function(e) {
            if (e.which == 13) {
                $('#botao_busca_api').click();
            }
        });
        /*********** Chama a Geolocalizacao *******************/
        getLocation();
        $('#bootstrap-data-table-export').DataTable( { } );

     });
     
    /*********** Chama a Geolocalizacao *******************/
    function getLocation()
    {
    if (navigator.geolocation)
        {
        navigator.geolocation.getCurrentPosition(showPosition);
        }
    else{x.innerHTML="O seu navegador não suporta Geolocalização.";}
    }
    function showPosition(position)
    {
        document.getElementById("latitude").value = position.coords.latitude;
        document.getElementById("longitude").value = position.coords.longitude;
    }
    /*********** Chama a Geolocalizacao *******************/

    function muda_ordenacao(ordenacao){
        
        $(".sorting_asc").removeClass("sorting_asc").addClass("sorting");
        $('.sorting')[ordenacao].click();
    }
