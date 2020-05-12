
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=0.5,user-scalable=no">
    <title>Em memória de José Carlos Domingos</title>
    <link rel="stylesheet" href="./album_familia/galeria/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="./album_familia/galeria/js/bootstrap.min.js"></script>
    <style>

        /* Demo styles */
        html,body{background:black;margin:0;}
        body{border-top:4px solid #eee;}
        .content{color:#777;font:12px/1.4 "helvetica neue",arial,sans-serif;max-width:820px;margin:20px auto;}
        h1{font-size:12px;font-weight:normal;color:#222;margin:0;}
        h2{color:white;}
        p{margin:0 0 20px}
        a {color:#22BCB9;text-decoration:none;}
        .galleria-info-description a { color: #bbb;}
        .cred{margin-top:20px;font-size:11px;}
        .galleria{ height: 432px; max-width:820px; }
        img { image-orientation: from-image;}

        .baixar_fotos { font-size: 18px; color: white }
        .Voltar{ font-size: 16px;color:red; margin-right: 5% }
        .paginacao {font-size: 25px;
            font-weight: bold;
            margin: 10px;}

            .fas{
                font-size:45px;
                color: white;
                margin-top: 25px;
                cursor: pointer;
            }

            .paginacao_video{
                    margin:0px auto;
                    text-align: center
                }
            
        </style>

        <!-- load jQuery -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
        
        <link href="./album_familia/galeria/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="./album_familia/galeria/fontawesome/css/brands.css" rel="stylesheet">
        <link href="./album_familia/galeria/fontawesome/css/solid.css" rel="stylesheet">

    </head>
    <body>
        <div class="content">
            <div class="row">
                <div class="row justify-content-md-center col-lg-12">
                    <div class="col col-lg-6">
                        <h2>Videos da Familia</h2>
                    </div>
                    <div class="col col-lg-6" style="text-align: right; cursor: pointer">
                        <a href="../album">
                            <img title="Voltar para Home"  src='./album_familia/galeria/src/icone_voltar.png' width="60">
                        </a>
                    </div> 
                </div>    
            </div>

            <div class="row">
                <div class="row justify-content-md-center col-lg-12 col-sm-12" style="text-align:center">

                    <?php if(isset($_GET['pagina'])){
                        $pagina= $_GET['pagina'];
                    }else{
                        $pagina= 1;
                    }

                    if($pagina==1){ 
                       ?>       
                       
                       <div class="col col-lg-12 col-sm-12" style="margin-top: 30px">
                         <iframe width="80%" height="315" src="https://www.youtube.com/embed/V1UUQUyQl8A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </div>
                     <div class="col col-lg-12 col-sm-12" style="margin-top: 30px">
                         <iframe width="80%" height="315" src="https://www.youtube.com/embed/pI6Fw31-4z0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </div>
                     <div class="col col-lg-12 col-sm-12" style="margin-top: 30px">
                         <iframe width="80%" height="315" src="https://www.youtube.com/embed/CQbD2Nibimk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </div>
                     <div class="col col-lg-12 col-sm-12" style="margin-top: 30px">
                         <iframe width="80%" height="315" src="https://www.youtube.com/embed/GQpFUzWmxiM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </div>
                     <div class="paginacao_video">
                     <a href='?pagina=2'><i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                 <?php } 
                 
                 if($pagina==2){ 

                    ?>

                    <div class="col col-lg-12  col-sm-12">
                     <iframe width="80%" height="315" src="https://www.youtube.com/embed/S_gbnpTMQpQ?fs=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media;fs; fullscreen ;gyroscope; picture-in-picture" allowfullscreen></iframe>
                 </div>
                 <div class="col col-lg-12 col-sm-12" style="margin-top: 30px">
                     <iframe width="80%" height="315" src="https://www.youtube.com/embed/XL1dWzeCSRw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                 </div>

                 
                 <div class="col col-lg-12 col-sm-12" style="margin-top: 30px">
                     <iframe width="80%" height="315" src="https://www.youtube.com/embed/i99jUzahcFk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                 </div>
                 <div class="col col-lg-12 col-sm-12" style="margin-top: 30px">
                     <iframe width="80%" height="315" src="https://www.youtube.com/embed/G6dCk3CPABg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                 </div>
                 
                 <div class="paginacao_video">
                 <a href='?pagina=1'><i class="fas fa-arrow-circle-left"> </i></a>    <a style="margin-left: 20px" href="?pagina=3"> <i class="fas fa-arrow-circle-right"></i></a>
                </div>
             <?php }  

             if($pagina==3){ 

                ?>
                <div class="col col-lg-12  col-sm-12">
                 <iframe width="80%" height="315" src="https://www.youtube.com/embed/eFlVqG8C5sE?fs=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media;fs; fullscreen ;gyroscope; picture-in-picture" allowfullscreen></iframe>
             </div>
             <div class="col col-lg-12 col-sm-12" style="margin-top: 30px">
                 <iframe width="80%" height="315" src="https://www.youtube.com/embed/I8QmOh05Mv4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
             </div>
	
<!--
             
             <div class="col col-lg-12 col-sm-12" style="margin-top: 30px">
                 <iframe width="80%" height="315" src="https://www.youtube.com/embed/1WJs_33R_WU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
             </div>

-->
             <div class="col col-lg-12 col-sm-12" style="margin-top: 30px">
                 <iframe width="80%" height="315" src="https://www.youtube.com/embed/G6dCk3CPABg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
             </div>
             
             <div class="paginacao_video">
             <a href='?pagina=2'><i class="fas fa-arrow-circle-left"> </i></a>    <a style="margin-left: 20px" href="?pagina=4"> <i class="fas fa-arrow-circle-right"></i></a>
         </div>

         <?php } 

            if($pagina==4){  ?>

   <div class="col col-lg-12  col-sm-12">
                 <iframe width="80%" height="315" src="https://www.youtube.com/embed/1WJs_33R_WU?fs=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media;fs; fullscreen ;gyroscope; picture-in-picture" allowfullscreen></iframe>
             </div>
             <div class="col col-lg-12 col-sm-12" style="margin-top: 30px">
                 <iframe width="80%" height="315" src="https://www.youtube.com/embed/AY1oymEiUzA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
             </div>

             
             <div class="col col-lg-12 col-sm-12" style="margin-top: 30px">
                 <iframe width="80%" height="315" src="https://www.youtube.com/embed/2ri_06EGkfY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
             </div>
             <div class="paginacao_video">
             <a href='?pagina=2'><i class="fas fa-arrow-circle-left"> </i></a>    <a style="margin-left: 20px" href="?pagina=4"> <i class="fas fa-arrow-circle-right"></i></a>
         </div>


         <?php }  ?>
         
     </div>    
 </div>
 
</div>

</body>
</html>
