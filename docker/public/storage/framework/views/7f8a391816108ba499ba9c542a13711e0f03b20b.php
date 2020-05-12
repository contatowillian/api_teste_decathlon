
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
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Número de Produtos Ativos</div>
                                <div class="stat-digit"><?php echo e(count($retorno_view['qtd_produtos_ativos'])); ?></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
            
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-check-box text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Número de Produtos Inativos</div>
                                <div class="stat-digit"><?php echo e(count($retorno_view['qtd_produtos_inativo'])); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

            <div class="col-xl-12 col-lg-12"> 
               
                <div class="alert alert-success" role="alert">
                 Sistema que consome a API criado para os testes
                </div>
            </div>

            </div> <!-- .row -->
            </div><!-- .animated -->
.
        </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

<!-- footer do layout -->
<?php echo $__env->make('base_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<!-- footer do layout -->  <?php /**PATH /var/www/public/laravel_site_wbatista/resources/views/home.blade.php ENDPATH**/ ?>