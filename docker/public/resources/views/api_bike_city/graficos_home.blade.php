
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
                <strong class="card-title">Pontos de City Bike</strong>
            </div>
            <div class="card-body">
             <div id="map_canvas" style="width:100%; height:500px"></div>
        </div>
    </div>
</div>
</div><!-- .animated -->
</div><!-- .content -->
</div><!-- /#right-panel -->


<div id="root"></div>

<!-- Chama os Js que contem as funcoes para esta pagina -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGx_tg3gcmolJY0lnlovszRXQ0GEOhZB0"></script>
<script type="text/javascript" src="{{ URL::asset('js/js_bike_city/scripts_api_bike_citys_home.js')}}"></script>


<!-- Right Panel -->

<!-- footer do layout -->
@include('base_layout.footer')
<!-- footer do layout -->