<!-- Preloader -->
        <div class="site-preloader-wrap">
            <div class="cssload-loader"><img src="<?= URL; ?>/assets/img/preloader.gif" /></div>
        </div>
        <!-- End Preloader -->

<!-- Start Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <ul>
                            <li><a href="#"><i class="fas fa-user"></i> Lunes - Viernes: 7:30 - 20:30</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> <?php echo EMAIL; ?></a></li>
                            <li><a href="#"><i class="fa fa-phone"></i> <?php echo TELEFONO; ?></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="share-icons">
                            <ul>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Start Top Header Area -->

        <!-- Start Main Menu Area -->
        <div class="main-menu-area" data-spy="affix" data-offset-top="55">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="logo">
                            <a href="<?php echo URL; ?>/index"><img src="<?php echo URL; ?>/assets/img/logo.png" alt="Logo"></a>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar top-bar"></span>
                                    <span class="icon-bar middle-bar"></span>
                                    <span class="icon-bar bottom-bar"></span>
                                </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <div class="main-menu">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="<?php echo URL . '/index' ?>"><i class="fas fa-home"></i>  Inicio</a></li>
                                        <li><a href="<?php echo URL . '/c/empresa' ?>"><i class="fas fa-building"></i> Quiénes somos</a></li>
                                        <li><a href="<?php echo URL . '/servicios' ?>"><i class="fas fa-wrench"></i> Servicios</a></li>
                                        <li><a href="<?php echo URL . '/novedades' ?>"><i class="fas fa-newspaper"></i> Novedades</a></li>
                                        <li><a href="<?php echo URL . '/contacto' ?>"><i class="fas fa-envelope"></i> Contacto</a></li>
                                    </ul>
                                </div>
                            </div><!-- /.navbar-collapse -->
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Menu Area -->
