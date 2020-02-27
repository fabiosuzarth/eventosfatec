<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>FATEC</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <link type="text/css" href="<?php echo base_url('assets/css/app.css'); ?>" rel="stylesheet"/>


    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/datetime/css/jquery.datetimepicker.css') ?>">
    <link href="<?php echo base_url('assets/vendors/airdatepicker/css/datepicker.min.css') ?>" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url('assets/vendors/iCheck/css/all.css') ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/gridforms/css/gridforms.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/form_layouts.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/datepicker.css') ?>">


    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/bootstrap-table/css/bootstrap-table.min.css') ?>">    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom_css/bootstrap_tables.css') ?>">





</head>

<body class="skin-coreplus">
<div class="preloader">
    <div class="loader_img"><img src="<?php echo base_url('assets/img/loader.gif') ?>" alt="loading..." height="64" width="64"></div>
</div>

<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="index-2.html" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <img src="https://www.fatecararas.com.br/site/images/Logo-Araras.png"  style="max-width: 40%; !important" alt="logo"/>
        </a>
        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw fa-bars"></i>
            </a>
        </div>
     
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar-->
        <section class="sidebar">
            <div id="menu" role="navigation">
              
                <ul class="navigation">
                    <li>
                        <a href="<?php echo base_url('/home') ?>">
                            <i class="menu-icon fa fa-fw fa-home"></i>
                            <span class="mm-text ">Home</span>
                        </a>
                    </li>
               
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon fa fa-check-square"></i>
                            <span>Cadastros</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?php echo base_url('evento/novo') ?>">
                                    <i class="fa fa-fw fa-fire"></i> Evento
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('atividades/novo') ?>">
                                    <i class="fa fa-fw fa-fire"></i> Atividade
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('pessoa/novo') ?>">
                                    <i class="fa fa-fw fa-fire"></i> Pessoa
                                </a>
                            </li>
                            
                        </ul>
                    </li>

                    


                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon fa fa-check-square"></i>
                            <span>Listagem</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?php echo base_url('evento/lista') ?>">
                                    <i class="fa fa-fw fa-fire"></i> Evento
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('atividades/listagem') ?>">
                                    <i class="fa fa-fw fa-fire"></i> Atividade
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('pessoa/lista') ?>">
                                    <i class="fa fa-fw fa-fire"></i> Pessoa
                                </a>
                            </li>
                            

                             <li>
                                <a href="<?php echo base_url('inscricao/lista') ?>">
                                    <i class="fa fa-fw fa-fire"></i> Inscritos
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo base_url('/evento/sorteio') ?>">
                            <i class="menu-icon fa fa-fw fa-star"></i>
                            <span class="mm-text ">Sorteio</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('/admin/sair') ?>">
                            <i class="menu-icon fa fa-fw fa-close"></i>
                            <span class="mm-text ">Sair do Sistema</span>
                        </a>
                    </li>                    
            
                </ul>
                <!-- / .navigation -->
            </div>
            <!-- menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <aside class="right-side">
        <!-- Content Header (Page header) -->

        <?php echo $contents; ?>
       
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div>
<!-- /.right-side -->
<!-- ./wrapper -->
<!-- global js -->


<script src="<?php echo base_url('assets/js/app.js') ?>" type="text/javascript"></script>


<script src="<?php echo base_url('assets/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.all.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/trumbowyg/js/trumbowyg.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('assets/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/vendors/summernote/summernote.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/custom_js/form_editors.js') ?>" type="text/javascript"></script>


<script src="<?php echo base_url('assets/vendors/iCheck/js/icheck.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/custom_js/form_layouts.js') ?>" type="text/javascript"></script>


<script src="<?php echo base_url('assets/vendors/moment/js/moment.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/datetime/js/jquery.datetimepicker.full.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/airdatepicker/js/datepicker.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/airdatepicker/js/datepicker.en.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/custom_js/advanceddate_pickers.js') ?>"></script>


<script type="text/javascript" src="<?php echo base_url('assets/vendors/editable-table/js/mindmup-editabletable.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/vendors/bootstrap-table/js/bootstrap-table.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/vendors/tableExport.jquery.plugin/tableExport.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/custom_js/bootstrap_tables.js') ?>" type="text/javascript"></script>



<!-- end of page level js -->
</body>

<style>
.fixed-table-container {
    position: relative !important;
    clear: both !important;
    border: 0px solid #ddd !important; 
    border-radius: 4px !important;
    -webkit-border-radius: 4px !important;
    font-size: 11px !important;
    -moz-border-radius: 4px !important;
}

</style>    

</html>