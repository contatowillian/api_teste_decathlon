
  <!-- Este é o menu do site que é montado usando uma  session -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{ URL::asset('imagens/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{ URL::asset('imagens/logo2.png')}}" alt="Logo"></a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="active">
                     <a href="./"> <i class="menu-icon fa fa-home"></i>Home </a>
                  </li>
                  <h3 class="menu-title">Menu</h3>
                  <!-- /.menu-title -->
                  <!--Menu acesso do usuario feito com a sessao logada-->
                  <li class="menu-item-has-children dropdown">
                     <!--Este código evita as categorias repetidas-->
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bicycle "></i>API City Bikes</a>
                     <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-map-o"></i><a href="/sistema/city_bikes">Buscar por local</a></li>
                        <li><i class="fa fa-map-marker"></i><a href="/sistema/graficos_city_bike">Home</a></li>
                        <!--Menu acesso do usuario feito com a sessao logada-->
                     </ul>
                  </li>
               </ul>
            </div>
            </nav>
        </aside><!-- /#left-panel -->
        <!-- Left Panel -->
        <!-- Right Panel -->