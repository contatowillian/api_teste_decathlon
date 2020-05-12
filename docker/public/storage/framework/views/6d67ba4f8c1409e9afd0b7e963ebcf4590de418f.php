
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=0.5,user-scalable=no">
        <title>Em memória de José Carlos Domingos</title>
             <link rel="stylesheet" href="./css/bootstrap.min.css" crossorigin="anonymous">
    <script src="./js/bootstrap.min.js"></script>
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

        </style>

        <!-- load jQuery -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
 
        <link href="./fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="./fontawesome/css/brands.css" rel="stylesheet">
        <link href="./fontawesome/css/solid.css" rel="stylesheet">


        <!-- load Galleria -->
        <script src="src/galleria.js"></script>

    </head>
<body>
    <div class="content">
        <div class="row">
            <div class="row justify-content-md-center col-lg-12">
                <div class="col col-lg-6">
                    <h2>Album: <?php echo ucfirst($_GET['pasta_fotos']) ?></h2>
                </div>
              <div class="col col-lg-6" style="text-align: right; cursor: pointer">
                <a href="../">
                <img title="Voltar para Home"  src='../album_familia/galeria/src/icone_voltar.png' width="60">
               </a>
               </div> 
            </div>    
        </div>
        <p class="baixar_fotos" style='display: none'><a href="baixar_zip.php?pasta_fotos=<?php echo $_GET['pasta_fotos']; ?>"><img src='./src/icone_baixar.ico' width="20"> Baixar as Fotos</a> </p>
        <div class="galleria">
            <?php


            function correctImageOrientation($filename) {
              if (function_exists('exif_read_data')) {
                $exif = exif_read_data($filename);
                if($exif && isset($exif['Orientation'])) {
                  $orientation = $exif['Orientation'];
                  if($orientation != 1){
                    $img = imagecreatefromjpeg($filename);
                    $deg = 0;
                    switch ($orientation) {
                      case 3:
                        $deg = 180;
                        break;
                      case 6:
                        $deg = 270;
                        break;
                      case 8:
                        $deg = 90;
                        break;
                    }
                    if ($deg) {
                      $img = imagerotate($img, $deg, 0);        
                    }
                    // then rewrite the rotated image back to the disk as $filename 
                    imagejpeg($img, $filename, 95);
                  } // if there is some rotation necessary
                } // if have the exif orientation info
              } // if function exists      
            }

        ini_set('display_errors',1);
        /* le os diretorios das pastas*/
        $path = "./album_familia/galeria/fotos/".$_GET['pasta_fotos'].'/';
        $diretorio = dir($path);
        $numero_fotos=1;

        if(isset($_GET['numero_fotos_maximo'])){
            $numero_fotos_maximo = $_GET['numero_fotos_maximo']; 
        }else{
            $numero_fotos_maximo = 20; 
        }

        if(isset($_GET['numero_fotos_minimo'])){
            $numero_fotos_minimo = $_GET['numero_fotos_minimo']; 
        }else{
            $numero_fotos_minimo = 0; 
        }
         
        while($arquivo = $diretorio -> read()){ 
            if($arquivo!='.' and $arquivo!='..' ){ 

             if( $numero_fotos  <=  $numero_fotos_maximo  and   $numero_fotos >= $numero_fotos_minimo  ){ 

                ?>

                <a href="<?php echo $path.$arquivo ?>">
                    <img 
                        src="<?php echo correctImageOrientation($path.$arquivo) ?>",
                        data-big="<?php echo $path.$arquivo ?>"
                        data-title=""
                        data-description="" >
                </a>
                

            <?php }
                $numero_fotos++;
            }
            
        }

        
        $diretorio -> close();

        ?>
        <!---->
        </div>

    <div > <span style="font-size: 16px">Paginas -<span> 
        <?php   $paginacao_html='';
                $paginacao_atual=1; 
                $quantidade_paginas= (int)$numero_fotos/20+1 ;

    
                while ($quantidade_paginas>= $paginacao_atual) {
                    $numero_fotos_maximo = $paginacao_atual*20;
                    $numero_fotos_minimo = $numero_fotos_maximo-20;

                    $paginacao_html .=  "<a class='paginacao' href='?pasta_fotos=".$_GET['pasta_fotos']."&numero_fotos_maximo=".$numero_fotos_maximo."&numero_fotos_minimo=".$numero_fotos_minimo."' >".$paginacao_atual."</a>-";
                    $paginacao_atual++;
                }

                echo substr($paginacao_html,0,-1);

        ?> </div>

    </div>
    <script>
    $(function() {
        // Load the Folio theme
        Galleria.loadTheme('galleria.folio.js');

        // Initialize Galleria
        Galleria.run('.galleria');
    });
    </script>
    </body>
</html>
<?php /**PATH /var/www/public/laravel_site_wbatista/resources/views/album_familia/galeria.blade.php ENDPATH**/ ?>