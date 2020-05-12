
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
<script type="text/javascript" src="<?php echo e(URL::asset('js/js_bike_city/scripts_api_bike_citys_home.js')); ?>"></script>


<!-- Right Panel -->

<!-- footer do layout -->
<?php echo $__env->make('base_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- footer do layout --><?php /**PATH /var/www/public/laravel_site_wbatista/resources/views/api_bike_city/graficos_home.blade.php ENDPATH**/ ?>