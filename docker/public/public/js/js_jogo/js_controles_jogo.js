
        /*------------ Funcões que controlam o jogo ---------------
        Criada por: Willian Batista
        Data: 26/04/2020
        Objetivo: Teste para a L5 Networks   
        ---------------*/
        function jogada(valor){
            
            var verifica_campo_livre =  $(".quadro_"+valor).html();
            var nivel_jogo =  $("#nivel_jogo").val();
            var situacao_jogo =  $("#situacao_jogo").val();
            var quantidades_jogadas =  parseInt($("#quantidades_jogadas").val());
            var possiveis_jogos_vitoria = [['1', '2', '3'],['4', '5', '6'],['7', '8', '9'],['1', '4', '7'],['2', '5', '8'],['3', '6', '9'],['1', '5', '9'],['3', '5', '7']];
 
         
            /**************** Verifica se o campo já foi escolhido **************/
             if (verifica_campo_livre!='') {
 
                 if(situacao_jogo=='aberto'){ 
                     var msg_alert = 'Este campo já foi escolhido !';
                 }else{
                     var msg_alert = 'Este jogo já acabou!';
                 }
                 console.log(quantidades_jogadas);
                 /******************** grava no historico ******************/
                 historico_jogo("danger",msg_alert);
                 return false;
                 
            }else{
 
                 if(situacao_jogo=='aberto'){
 
                     //Adiciona a quantidade de jogadas
                     $("#quantidades_jogadas").val(quantidades_jogadas+1);
                     $(".quadro_"+valor).html("X");
 
                     /**************** Verifica se houve vencedor *******************/
                     if(verifica_se_ja_existe_vencedor("X",possiveis_jogos_vitoria)){
                         var situacao_jogo =  $("#situacao_jogo").val();
                         if(situacao_jogo=='aberto'){
                           zera_jogo("O jogo acabou você venceu :) !");
                         }
                         return false;
 
                     }
                   
                 }else{
                     /******************** grava no historico ******************/
                     historico_jogo("danger",'Este jogo já acabou!');
                     return false;
                 }
                 
                 if(nivel_jogo==1){
                     realiza_jogada_aleatoria_computador();
                 }else if(nivel_jogo==2){
 
                     var chance_de_jogada_inteligente_nivel2 = Math.floor((Math.random() * 2) + 1);
                     console.log(chance_de_jogada_inteligente_nivel2);
                     if(chance_de_jogada_inteligente_nivel2==1){
                         realiza_jogada_aleatoria_computador();
                     }else{
                         realiza_jogada_inteligente_computador(possiveis_jogos_vitoria);
                     }
 
                 }else if(nivel_jogo==3){
                     realiza_jogada_inteligente_computador(possiveis_jogos_vitoria);
                 }
                 
 
                  /**************** Verifica se houve vencedor *******************/
                  if(verifica_se_ja_existe_vencedor("0",possiveis_jogos_vitoria)){
                     $("#quantidades_jogadas").val('0');
                     zera_jogo("O jogo acabou PC venceu :) !");
                     return false;
                  }
                  /******************** grava no historico ******************/
                  historico_jogo("info","Sua vez de jogar");
 
            }
         }
         
         /**************** Faz a jogada Aleatoria do PC **************/
         function realiza_jogada_aleatoria_computador(){
             var pc_jogou = 0;
             $('.Tabela_jogo_velha tr').each(function() {
                 $.each(this.cells, function(){
 
                    if($(this).html()==''){
                     if(pc_jogou==0){
                         $(this).html("0");
                         pc_jogou = 1;
                         /******************** grava no historico ******************/
                         historico_jogo("info","PC fez sua jogada");
                     }
                     
                    }
                 });
             });
 
         }
 
 
          /**************** Faz a jogada inteligente do PC **************/
          function realiza_jogada_inteligente_computador(possiveis_jogos_vitoria){
            
             var possibilidade_player_vencer= 0;
            
             for(i=0;possiveis_jogos_vitoria[i];i++){
                 var quantidade_de_jogadas_nos_campos = 0;
                 for(j=0;possiveis_jogos_vitoria[i][j];j++){
                     var campo_atual = possiveis_jogos_vitoria[i][j];
                     var nome_campo =  $(".quadro_"+campo_atual).html();
                     
                     if(nome_campo=="X"){
                         quantidade_de_jogadas_nos_campos++;
                     };
                    
                     if(quantidade_de_jogadas_nos_campos==1 && possibilidade_player_vencer==0){
                         possibilidade_player_vencer =1;
                     }
                     if(quantidade_de_jogadas_nos_campos==2 ){
                         if(nome_campo==''){
                             $(".quadro_"+campo_atual).html("0");
                             return false;
                         }
                         possibilidade_player_vencer =2;
                        
                     }
                 }
                 quantidade_de_jogadas_nos_campos = 0;
             }
 
             // Se o player não tiver chance de vencer faz uma jogada aleatoria
             realiza_jogada_aleatoria_computador();
             
 
         }
 
 
 
         /**************** Verifica se o jogo ja acabou**************/
         function verifica_se_ja_existe_vencedor(simbolo_jogador,possiveis_jogos_vitoria){
 
             var tem_vencedor = 0 ;
 
             var situacao_jogo = $("#situacao_jogo").val();
 
             for(i=0;possiveis_jogos_vitoria[i];i++){
                 var quantidade_de_jogadas_nos_campos = 0;
                 for(j=0;possiveis_jogos_vitoria[i][j];j++){
                     var campo_atual = possiveis_jogos_vitoria[i][j];
                     var nome_campo =  $(".quadro_"+campo_atual).html();
                     
                     if(nome_campo==simbolo_jogador){
                         quantidade_de_jogadas_nos_campos++;
                     };
                    
                     if(quantidade_de_jogadas_nos_campos==3){
                         return true;
                         tem_vencedor = 1;
                     }
                 }
                 quantidade_de_jogadas_nos_campos = 0;
             }
 
             var quantidade_jogadas =  $("#quantidades_jogadas").val();
 
             if(quantidade_jogadas>=5 && tem_vencedor==0 && situacao_jogo=='aberto'){
                 $("#situacao_jogo").val('finalizado');
                 $("#quantidades_jogadas").val('0');
                 zera_jogo("O Jogo acabou, deu Velha !");
                 
                 return true;
             }
 
          return false;
 
         }
 
         /**************** Finaliza o jogo **************/
         function zera_jogo(mensagem_final_jogo){
             $("#quantidades_jogadas").val('0');
             $("#jogada_atual").html(mensagem_final_jogo);
             /******************** grava no historico ******************/
             historico_jogo("success",mensagem_final_jogo);
             $("#situacao_jogo").val('finalizado');
                 
         }
 
         /**************** Reinicia o jogo **************/
         function reiniciar_jogo(){
 
              /******************************************** Zera o historico  ********************************************************/
              $( "#historico_mensagens" ).html("");
              $( "#historico_mensagens" ).append( "<div class='form-group  alert alert-info  col-lg-11 col-sm-6' >Faça uma jogada para iniciar o jogo!</div>" );
              $("#situacao_jogo").val("aberto");
              $("#numero_jogadas").val(0);
 
 
             /**************** Vare a tabela e zera ela  **************/
             $('.Tabela_jogo_velha tr').each(function() {
                 $.each(this.cells, function(){
                    $(this).html("");
                 });
             });
 
             
         }
 
         /**************** Funcao que envia as jogadas pro historico **************/
         function historico_jogo(tipo_alerta,mensagem){
 
             // Obtém a data/hora atual
             var data = new Date();
             var dia     = data.getDate();           // 1-31
             var dia_sem = data.getDay();            // 0-6 (zero=domingo)
             var mes     = data.getMonth();          // 0-11 (zero=janeiro)
             var ano4    = data.getFullYear();       // 4 dígitos
             var hora    = data.getHours();          // 0-23
             var min     = data.getMinutes();        // 0-59
 
             // Formata a data e a hora (note o mês + 1)
             var str_data = dia + '/' + (mes+1) + '/' + ano4;
             var str_hora = hora + ':' + min ;
 
             $( "#historico_mensagens" ).append( "<div class='form-group  alert alert-"+tipo_alerta+" col-lg-11 col-sm-6' >"+str_data+" - "+str_hora+" - "+mensagem+"</div>" );
             
             /*** chama funcao que envia pro controller via ajax */
             envia_historico_banco(mensagem);
         }
 
 
 
         function envia_historico_banco(mensagem){
 
             /* Faz a configuração necessaria do laravel antes de enviar */
             $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
              var url = './historico_jogo_velha';
          
              $.ajax({
                 method: "POST",
                 url: url,
                 data: { texto_msg: mensagem}
                 })
                 .done(function( msg ) {
                 //alert( "Data Saved: " + msg );
             });
             
         }
 
 
         /*------------ Funcões que controlam o jogo ---------------*/