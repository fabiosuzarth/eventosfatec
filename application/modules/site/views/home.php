<?php
//print_r($_SESSION['atividades']);

// if(in_array(46,$_SESSION['atividades'])){
//     echo "tem";
// }


// exit;

//print_r($eventos[0]['evento']);

// echo $eventos[0]['evento']->nome;

// exit;
// foreach($todos as $datas){
// print_r($datas);
//    echo $datas['evento']->nome;
//    foreach ($datas as $ev) {
//         foreach ($ev->data as $a) {
//             foreach ($a['atividade'] as $at) {
//                 if($at->palestrante_nome <> ''){
//                 echo $at->palestrante_nome."<br>";
//                 }
//             }
//         }
//     }
// }
// exit;
?>

<?php
$total_palestrante = 0;
foreach ($eventos as $datas) {
    foreach ($datas as $ev) {
        if (isset($ev->data)) {
            foreach ($ev->data as $a) {
                foreach ($a['atividade'] as $at) {
                    if ($at->palestrante_nome <> '') {
                        $total_palestrante = $total_palestrante + 1;
                    }
                }
            }
        }
    }
}
?>



<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>

    <title>Eventos FATEC</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Eventos Fatec">
    <meta name="author" content="FATEC">

    <!-- viewport settings -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">


    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('evento/css/bootstrap.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('evento/css/pe-icon-7-stroke.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('evento/css/helper.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('evento/css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('evento/css/font-awesome.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('evento/css/font.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('evento/css/salvattore.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('evento/css/jquery.countdown.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('evento/css/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('evento/css/jquery.mCustomScrollbar.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('evento/css/owl.carousel.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('evento/css/owl.theme.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('evento/css/owl.transitions.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('evento/css/revolution.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('evento/css/revolution-extralayers.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('evento/css/main.css') ?>">

    <!-- Font -->
    <link href='<?php echo base_url('evento/fonts/css5c0a.css?family=Open+Sans:400,300') ?>' rel='stylesheet' type='text/css'>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('evento/img/favicon.ico') ?>">

    <script src="<?php echo base_url('evento/js/jquery-1.11.1.min.js') ?>"></script>
    <!--<script src="<?php echo base_url('assets/site/src/jquery.3.4.1.min.js') ?>"></script>-->
    <script src="<?php echo base_url('assets/site/src/utl.js') ?>"></script>
    <script src="<?php echo base_url('assets/site/src/bootbox.all.5.2.0.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/site/src/app.js') ?>"></script>
    <script src="<?php echo base_url('assets/site/src/programacao.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</head>

<body>

    <!-- PRELOADING -->
    <div id="preload">
        <div class="preload">
            <div class="spinner"></div>
        </div>
    </div>



    <!-- NAVIGATION -->
    <nav id="nav-primary" class="navbar navbar-custom" role="navigation">
        <div class="container">
            <div class="navbar-header"  style="padding: 10px">
                <div class="navbar-brand">
                    <span id="navbar-id">EVENTOS <strong> FATEC </strong> </span>
                </div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a href="index-2.html"><img src="<?php echo base_url('evento/img/logo.png') ?>" alt="logo"></a> -->
            </div>

            <div class="collapse navbar-collapse" id="nav">

                
                <ul class="nav navbar-nav navbar-right uppercase" style="padding: 10px">


                    <li><a data-toggle="elementscroll" href="#info">Sobre</a></li>
                    <?php if ($total_palestrante > 0) {
                        ?>
                        <li><a data-toggle="elementscroll" href="#speakers">Palestrantes</a></li>
                    <?php } ?>
                    <li><a data-toggle="elementscroll" href="#program">Programação</a></li>
                    <li><a data-toggle="elementscroll" href="#venue">Local</a></li>
                   
                    <!-- <li><a data-toggle="elementscroll" href="#gallery">Galeria</a></li> -->
                    <li><a data-toggle="elementscroll" href="#sponsors">Parceiros</a></li>
                    <li><a data-toggle="elementscroll" href="#footer">Contato</a></li>
                    <?php
                    if (!isset($_SESSION['logado'])) {
                        ?>
                        <li><a data-toggle="elementscroll" href="#register"> Registrar / Login</a></li>
                    <?php } else { ?>
                        <li><a data-toggle="elementscroll" href="#activity"> Minhas Atividades</a></li>
                        <li><a data-toggle="elementscroll" href="<?php echo base_url('/usuario/sair') ?>"> Logout</a></li>

                    <?php
                    }
                    ?>
                </ul>
            </div>

        </div>
    </nav>





    <!-- FULLSCREEN SLIDER -->
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <!-- SLIDE 1 -->
                <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000" data-thumb="<?php echo base_url('evento/img/source.gif') ?>" sytle="opacity: 0.4 !important;" data-saveperformance="off" data-title="Slide">
                    <!-- MAIN IMAGE -->
                    <img src="<?php echo base_url('evento/img/source.gif') ?>" sytle="opacity: 0.4 !important;" alt="fullslide1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption light_heavy_70_shadowed lfb ltt tp-resizeme" data-x="center" data-hoffset="250" data-y="center" data-voffset="-90" data-speed="600" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.1" data-endspeed="500" data-endeasing="Power4.easeIn" style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap; color: black;  text-shadow: white 0.1em 0.1em 0.2em ">
                        <?php echo $eventos[0]['evento']->nome; ?>
                    </div>

                    <div class="tp-caption light_heavy_75_shadowed lfb ltt tp-resizeme" data-x="center" data-hoffset="250" data-y="center" data-voffset="-5" data-speed="600" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.1" data-endspeed="500" data-endeasing="Power4.easeIn" style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap; color: black;  text-shadow: white 0.1em 0.1em 0.2em ">
                        <?php echo  date('d/m/Y', strtotime($eventos[0]['evento']->datahora_inicio)); ?> -
                        <?php echo  date('d/m/Y', strtotime($eventos[0]['evento']->datahora_fim)); ?>
                    </div>

                    <div class="tp-caption light_heavy_80_shadowed lfb ltt tp-resizeme" data-x="center" data-hoffset="250" data-y="center" data-voffset="50" data-speed="600" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.1" data-endspeed="500" data-endeasing="Power4.easeIn" style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap; color: black;  text-shadow: white 0.1em 0.1em 0.2em ">
                        <?php if (!isset($_SESSION['logado'])) { ?>
                            <!-- <a id="link-seinscrever" data-toggle="elementscroll" href="#register">SE INSCREVA!</a> -->
                            <!-- <button>teste</button> -->
                        <?php } ?>
                    </div>

                    <!-- LAYER NR. 2
                        <div class="tp-caption light_medium_30_shadowed lfb ltt tp-resizeme"
                            data-x="center" data-hoffset="200"
                            data-y="center" data-voffset="-10"
                            data-speed="600"
                            data-start="900"
                            data-easing="Power4.easeOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.1"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap; color: black; text-shadow: white 0.1em 0.1em 0.2em">
                         
                           
                            <b><?php echo  date('d/m/Y', strtotime($eventos[0]['evento']->datahora_inicio)); ?> -
                            <?php echo  date('d/m/Y', strtotime($eventos[0]['evento']->datahora_fim)); ?></b>


                        </div> -->

                </li>


            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>

    <!-- HIGHLIGHT -->
    <section id="highlight">
        <div class="container-fluid">
            <div class="row">

                <div id="left" class="left col-lg-9 col-md-8 text-right">
                    <h2>Estamos quase lá</h2>
                    <p>Faltam apenas</p>
                </div>

                <div id="right" class="col-lg-3 col-md-4 text-left">
                    <div id="countdown"></div>
                </div>

            </div>
        </div>
    </section>

    <!-- INFO -->
    <section id="info">
        <div class="container container-logo-evento">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img width="100%" src="<?php echo base_url('evento/img/logo_evento-min.png') ?>" />
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row-eq-height">
                        <div class="col-lg-12">
                            <h2 class="uppercase">SOBRE</h2>
                            <p class="lead">Fique por dentro do Evento.</p>

                            <p class="lead">
                                <?php echo $eventos[0]['evento']->descricao; ?>
                            </p>
                        </div>
                        <!-- <div class="col-lg-4 text-center mt-2">                                
                                <img width="80%" src="<?php echo base_url('evento/img/logo_fatec_araras-min.png') ?>" />                                
                            </div> -->
                    </div>
                </div>

                <!--<div class="col-lg-4">
                        <img width="20%" src="<?php echo base_url('evento/img/logo_fatec_araras-min.png') ?>" />
                    </div>-->

                <!-- <div class="col-lg-10 col-lg-offset-1 col-md-12 text-center">
                        <div class="row">
                        
                            <div class="feature col-lg-4 col-md-4 col-sm-4">
                                <i class="pe-4x pe-7s-refresh-2"></i>
                                <h4>New Topics</h4>
                                <p>Sed facilisis justo risus viverra vulputate. Mauris vel ipsum diam condimentum tempus purus.</p>
                            </div>
                            
                            <div class="feature col-lg-4 col-md-4 col-sm-4">
                                <i class="pe-4x pe-7s-micro"></i>
                                <h4>2 Keynote Speakers</h4>
                                <p>Sed facilisis justo risus viverra vulputate. Mauris vel ipsum diam condimentum tempus purus.</p>
                            </div>
                            
                            <div class="feature col-lg-4 col-md-4 col-sm-4">
                                <i class="pe-4x pe-7s-headphones"></i>
                                <h4>Multilingual Support</h4>
                                <p>Sed facilisis justo risus viverra vulputate. Mauris vel ipsum diam condimentum tempus purus.</p>
                            </div>
                                                        
                        </div>
                    </div> -->

            </div>
        </div>
    </section>


    <?php if ($total_palestrante > 0) { ?>
        <!-- SPEAKERS -->
        <section id="speakers">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <h2 class="uppercase">Palestrantes</h2>
                        <p class="lead">Conheça cada um de nossos palestrantes.</p>
                    </div>

                    <ul id="list-speaker" class="list-unstyled">

                        <?php
                            foreach ($eventos as $datas) {
                                foreach ($datas as $ev) {
                                    foreach ($ev->data as $a) {
                                        foreach ($a['atividade'] as $at) {
                                            if ($at->palestrante_nome <> '' && $at->status_id != 4) {

                                                $palestrante_nome = explode(" ", $at->palestrante_nome);

                                                ?>

                                            <li class="col-lg-3 col-md-3 col-sm-4">
                                                <div class="speaker">
                                                    <figure class="effect-ming">
                                                        <img class="img-responsive" src="<?php echo base_url() . $at->palestrante_img ?>" alt=""/>
                                                        <figcaption>
                                                            <span><a class="html-popup" href="<?php echo base_url() . 'site/palestrante/' . $at->palestrante_pessoa_id ?>"><img class="img-responsive" src="<?php echo base_url('evento/img/plus.png') ?>" alt=""></a></span>
                                                        </figcaption>
                                                    </figure>

                                                    <div class="caption text-center">
                                                        <h4><?php echo limitar_texto($palestrante_nome[0], 20); ?></h4>
                                                        <p class="company"><?php echo  date('d/m/Y', strtotime($at->datahora_inicio)); ?></p>
                                                        <p class="company"><?php echo  exibirDiaDaSemana(date('Y-m-d', strtotime($at->datahora_inicio))); ?></p>
                                                        <p class="company"><?php echo limitar_texto($at->nome, 20); ?></p>
                                                    </div>
                                                </div>
                                            </li>



                        <?php    }
                                        }
                                    }
                                }
                            }
                            ?>
                            
                        <!-- SEGUNDO PALESTRANTE DA ATVIDADE METODOS DE VISAO COMPUTACIONAL -->
                        
                        <li class="col-lg-3 col-md-3 col-sm-4">
                            <div class="speaker">
                                <figure class="effect-ming">
                                    <img class="img-responsive" src="<?php echo base_url() . 'img/fotos/011_Lucas_P._Valem.jpg' ?>" alt=""/>
                                    <figcaption>
                                        <span><a class="html-popup" href="<?php echo base_url() . 'site/palestrante/17'  ?>"><img class="img-responsive" src="<?php echo base_url('evento/img/plus.png') ?>" alt=""></a></span>
                                    </figcaption>
                                </figure>

                                <div class="caption text-center">
                                    <h4>Lucas</h4>
                                    <p class="company">23/10/2019</p>
                                    <p class="company">QUARTA-FEIRA</p>
                                    <p class="company">MÉTODOS DE VISÃO C...</p>
                                </div>
                            </div>
                        </li>

                        <!-- SEGUNDO PALESTRANTE DA ATVIDADE METODOS DE VISAO COMPUTACIONAL -->




                    </ul>


                </div>
            </div>
        </section>

    <?php } ?>

    <section id="program">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <?php
                    $status_evento = "";
                    if ($ev->status_id == 1) $status_evento = '<span class="badge badge-info">Se prepare!</span>';
                    else if ($ev->status_id == 2) $status_evento = '<span class="badge badge-secondary">Encerrado</span>';
                    else if ($ev->status_id == 4) $status_evento = '<span class="badge badge-secondary">Inscrições Encerradas</span>';
                    else if ($ev->status_id == 5) $status_evento = '<span class="badge badge-secondary">Evento Cancelado</span>';
                    ?>
                    <h2 class="uppercase">PROGRAMAÇÃO</h2>
                    <h3> <?php echo $eventos[0]['evento']->nome; ?> </h3>
                    <p style="color: #352b2b !important;">Tenha a agenda do evento sempre com você! <a href="https://play.google.com/store/apps/details?id=br.dsicari.appeventosfatecararas">Baixe nosso app</a></p>
                    <span><a href="https://play.google.com/store/apps/details?id=br.dsicari.appeventosfatecararas"><img id="badge-google" style="border: none !important;" width="15%" src="<?php echo base_url() . 'evento/img/disponivel-google-play.png' ?>" /></a></span><br><br>
                    <span class="badge badge-info">Saiba mais selecionando o dia e clicando na atividade</span>                    
                    <ul id="myTab" class="nav nav-tabs" role="tablist">

                        <?php
                        $count = 1;
                        foreach ($eventos as $datas) {
                            foreach ($datas as $ev) {
                                if (isset($ev->data)) {
                                    foreach ($ev->data as $a) {
                                        $data_evento =  date('d/m/Y', strtotime($a['devento']));
                                        ?>
                                        <li role="presentation">
                                            <a style = "cursor:pointer" href="#day<?php echo $count; ?>" id="day<?php echo $count; ?>-tab" role="tab" data-toggle="tab" aria-controls="day<?php echo $count; ?>" aria-expanded="true">
                                                <?php echo $data_evento; ?></a>
                                        </li>
                        <?php $count++;
                                    }
                                }
                            }
                        }

                        ?>





                    </ul>



                    <!-- CONTENT -->
                    <div id="myTabContent" class="tab-content">

                        <?php
                        $count = 1;
                        foreach ($eventos as $datas) {
                            foreach ($datas as $ev) {
                                if (isset($ev->data)) {
                                    foreach ($ev->data as $a) {
                                        $data_evento =  date('d/m/Y', strtotime($a['devento']));
                                        ?>


                                        <div role="tabpanel" class="tab-pane fade in <?php if ($count == 1) {
                                                                                                            echo "active";
                                                                                                        } ?>" id="day<?php echo $count; ?>" aria-labelledby="day<?php echo $count; ?>-tab">
                                            <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">

                                                <?php

                                                    foreach ($a['atividade'] as $at) {
                                                        // SE ATIVIDADE ESTIVER CANCELADA, NAO MOSTRAR
                                                        if($at->status_id == 4) continue;

                                                        $data_ev =  date('H:i', strtotime($at->datahora_inicio));
                                                        ?>

                                                    <div class="panel panel-default">

                                                        <!-- Program Heading -->
                                                        <div class="panel-heading" role="tab" id="heading<?php echo $at->id; ?>">

                                                            <div class="row">
                                                                <div class="col-lg-1 col-md-1 col-sm-1">
                                                                    <p class="date"><?php echo $data_ev; ?></p>
                                                                </div>
                                                                <?php
                                                                    $status_atividade = "";
                                                                    $btn_inscricao = "";

                                                                    // Se evento NAO estiver com inscricoes abertas ou atividade nao necessitar inscricao
                                                                    if ($ev->status_id != 3 || $ev->status_id == 5) {
                                                                        $btn_inscricao = '';
                                                                        $status_atividade = '';
                                                                    } 
                                                                    else {
                                                                        // Se tiver pelo menos 1 vaga e atividade esteja com status_id=1 inscricoes abertas
                                                                        if ($at->vagasRestantes > 0 && $at->status_id == 1) {
                                                                            $btn_inscricao = "<button type='button' class='btn btn-primary btn-sm' id='btn-inscrever-login' 
                                                                                                data-id='" . $at->id . "' 
                                                                                                onclick='ShowModal_InscreverAtividade(\"" . $at->id . "\", \"" . $at->nome . "\", \"" . $at->datahora_inicio . "\", \"" . $at->datahora_fim . "\", \"" . $at->evento_id . "\")'>Inscrever</button>";
                                                                            //$btn_inscricao="<button type='button' class='btn btn-primary btn-sm' id='btn-inscrever' data-id='" .$at->id. "'>Inscrever</button>";     
                                                                            $status_atividade = "<span class='badge badge-success card-top-corner' style='background-color: green !important;'>Há vagas</span>";
                                                                        }
                                                                        // atividade esteja com status_id=2 inscricoes encerradas
                                                                        else if ($at->status_id == 2) {
                                                                            $btn_inscricao = '';
                                                                            $status_atividade = "<span class='badge badge-secondary card-top-corner'>Inscrições Encerradas</span>";
                                                                        }
                                                                        // atividade esteja com status_id=3 vagas esgotadas ou vagas < 0
                                                                        else if ($at->vagasRestantes <= 0 || $at->status_id == 3) {
                                                                            $btn_inscricao = '';
                                                                            $status_atividade = "<span class='badge badge-danger card-top-corner' style='background-color: red !important;'>Esgotado</span>";
                                                                        }
                                                                        // atividade esteja com status_id=4 atividade cancelada
                                                                        else if ($at->status_id == 4) {
                                                                            $btn_inscricao = '';
                                                                            $status_atividade = "<span class='badge badge-dark card-top-corner'>Cancelado</span>";
                                                                        }

                                                                        //Se estiver logado, deixar cancelar qualquer atividade que usuario ja tenha se inscrito
                                                                        if (isset($_SESSION['logado'])) {
                                                                            //print_r($_SESSION);
                                                                            //echo('<br>atividades count='.count($_SESSION['atividades']).'<br>empty='.empty($_SESSION['atividades']).'<br>');
                                                                            if (!empty($_SESSION['atividades'])) {
                                                                                foreach ($_SESSION['atividades'] as $r) {
                                                                                    //echo('<br>recebido at->id='.$at->id.' comparado com='.$r->atividade_id);
                                                                                    if ($r == $at->id) {
                                                                                        $btn_inscricao = "<button type='button' class='btn btn-danger btn-sm' id='btn-inscrever-login' 
                                                                        data-id='" . $at->id . "' 
                                                                        onclick='ShowModal_CancelarAtividade(\"" . $at->id . "\", \"" . $at->nome . "\", \"" . $at->datahora_inicio . "\", \"" . $at->datahora_fim . "\", \"" . $at->evento_id . "\")'>Cancelar Inscrição</button>";
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                        // se clicar inscrever sem estar logado, vai tentar inscrever e vai dropar erro pois n possui login, nao tratara essa excecao                                   
                                                                        else {
                                                                            //echo('nao logado');
                                                                        }
                                                                    }
                                                                    ?>

                                                                <div class="col-lg-10 col-md-10 col-sm-10">

                                                                    <h4 class='panel-title'>
                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#Program<?php echo $at->id; ?>" aria-expanded="true" aria-controls="Program<?php echo $at->id; ?>">
                                                                            <?php
                                                                                                echo $at->nome;
                                                                                                ?>

                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div id="Program<?php echo $at->id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $at->id; ?>">
                                                            <!-- Program Content -->
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-lg-2 col-md-2 col-sm-2">
                                                                        <img class="img-responsive img-circle" src="<?php echo ($at->palestrante_nome == "") ? base_url('evento/img/semimagem.jpeg') : base_url() . $at->palestrante_img ?>" alt="">
                                                                    </div>

                                                                    <div class="col-lg-7 col-md-7 col-sm-10">
                                                                        <?php echo $status_atividade; ?><br><br>
                                                                        <p class="speaker-name uppercase"><?php echo $at->palestrante_nome; ?></p>
                                                                        <h4><?php echo $at->nome; ?></h4>
                                                                        <p style="color: black"><?php echo $at->descricao; ?></p>
                                                                        <br>
                                                                        <p><i class="fa fa-lg fa-map-marker"></i> <span class="small"><?php echo $at->localizacao; ?></span></p>
                                                                        <?php echo ($btn_inscricao); ?>
                                                                        <!-- <button type="button" class="btn btn-primary btn-sm" id="btn-inscrever-login" 
                                                            data-id="<?php echo $at->id; ?>" 
                                                            onclick='ShowModal_InscreverAtividade("<?php echo $at->id; ?>", "<?php echo $at->nome; ?>", "<?php echo $at->datahora_inicio; ?>", "<?php echo $at->datahora_fim; ?>", "<?php echo $at->evento_id; ?>")'>Inscrever</button> -->
                                                                    </div>
                                                                    <?php if ($at->palestrante_nome <> "") { ?>
                                                                        <div class="col-lg-3 col-md-3 col-sm-10">
                                                                            <h5>Sobre <?php echo $at->palestrante_nome; ?></h5>
                                                                            <p class="small" style="color: #352b2b"><?php echo $at->palestrante_observacao ?></p>

                                                                        </div>
                                                                    <?php } ?>

                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>


                                                <?php  } ?>


                                            </div>
                                        </div>


                        <?php $count++;
                                    }
                                }
                            }
                        }

                        ?>




                    </div>

                </div>
            </div>

        </div>



        <!-- CONTENT -->


        </div>

        </div>
        </div>
    </section>

    <!-- DOWNLOAD -->
    <section id="download">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-lg-offset-2">
                    <div class="row">

                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <img class="img-responsive" src="img/download.png" alt="">
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-9">
                            <h3>Baixe a programação completa</h3>
                            <a class="button button-small button-line-dark" href="<?php echo base_url() . 'evento/FATEC ARARAS - III Semana Ciencia e Tecnologia.pdf' ?>">download pdf</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- VENUE -->
    <section id="venue">

        <div class="venue">
            <div class="venue-inner">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <h2 class="uppercase">FATEC ARARAS</h2>
                            <p class="lead">Antônio Brambilla</p>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <i class="pe-4x pe-7s-map-2"></i>
                            <h4 class="uppercase">Endereço</h4>
                            <p>Rua Jarbas Leme de Godoy 875<br>
                                Bairro: Jose Ometto II<br>
                                Cidade: Araras - São Paulo<br>
                                CEP: 13606389</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </section>


    <link href="https://fonts.googleapis.com/css?family=Signika+Negative:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="<?php echo base_url('login/style_site.css') ?>" rel="stylesheet">


    <?php if (isset($_SESSION['logado'])) {  ?>
        <section id="activity">
            <div class="container">
                <div class="row" id="formularioevento">
                    <div class="col-lg-12">
                        <h2 class="uppercase">Minhas Atividades</h2>
                        <!-- <p class="lead">Veja o que você já participou ou está participando</p> -->
                    </div>
                    <div class="col-lg-12">
                        <?php                            
                            //print_r($atividadesUsuario);                            
                            if (!empty($atividadesUsuario)) {
                                foreach ($eventos as $datas)
                                    foreach ($datas as $ev)
                                        echo "<hr>";                                        
                                        if (isset($ev->data))
                                            foreach ($ev->data as $a)   
                                                foreach ($a['atividade'] as $at) 
                                                    foreach ($atividadesUsuario as $atUser){
                                                        if($atUser->atividade_id == $at->id){      
                                                            $btn_cancelar = "";
                                                            $certificado = "";
                                                            //echo "<h4>Evento: " .$ev->nome. "</h4>";
                                                            echo "<p><strong>" .$at->nome. "</strong><br>";
                                                            echo $atUser->status_nome. "</p>";

                                                            // Se status inscricao for INSCRITO, deixar cancelar inscricao atividade
                                                            if($atUser->status_id == 1){
                                                                $btn_cancelar = "<button type='button' class='btn btn-danger btn-sm' id='btn-inscrever-login' 
                                                                                data-id='" . $at->id . "' 
                                                                                onclick='ShowModal_CancelarAtividade(\"" . $at->id . "\", \"" . $at->nome . "\", \"" . $at->datahora_inicio . "\", \"" . $at->datahora_fim . "\", \"" . $at->evento_id . "\")'>Cancelar Inscrição</button>";
                                                            }
                                                            // Se status inscricao for COMPARECEU
                                                            else if($atUser->status_id == 2){
                                                                //$certificado="<a href='" . base_url() . 'inscricao/validarcertificado/' . $atUser->sign_cert + "'>Visualizar Certificado</a>";
                                                                $certificado="<a target='_blank' href='" . base_url(). 'inscricao/validarcertificado/' . $atUser->sign_cert . "'>Visualizar Certificado</a>";
                                                            }
                                                            
                                                            echo $btn_cancelar.$certificado;
                                                            echo "<hr>";
                                                        }
                                                    }
                            } else {
                                echo "Você não possui nenhuma inscrição";
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </section>
    <?php  } ?>

    <!-- REGISTER -->
    <section id="register">
        <div class="container">



            <div class="row" id="formulariocadastro">

                <div class="col-lg-12">

                    <form name="formPessoa" id="formPessoa">
                        <div class="col-lg-12">
                            <h2 class="uppercase text-center">Dados Basicos</h2>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome Completo</label>
                                    <input type="text" class="form-control" name="nome" id="nome" data="obrigatorio" msg="Campo é obrigatório"   placeholder="Ex: Danilo da Silva " required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nome">CPF</label>
                                    <input type="text" class="form-control" name="cpfcnpj" id="cpfcnpj"  data="obrigatorio" msg="Campo é obrigatório" placeholder="Ex: 99999999999" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nome">Data de Nascimento</label>
                                    <input type="text" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Ex: 99/99/9999"  data="obrigatorio" msg="Campo é obrigatório" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nome">CEP</label>
                                    <input type="text" class="form-control" name="cep" id="cep"  data="obrigatorio" msg="Campo é obrigatório"  placeholder="Ex: 13600000" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nome">Numero da Residência</label>
                                    <input type="text" class="form-control" name="numero" id="numero"   data="obrigatorio" msg="Campo é obrigatório"placeholder="Ex: 999" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Rua</label>
                                    <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Ex: Avenida Brasil"   data="obrigatorio" msg="Campo é obrigatório">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Ex: Warley Colombini"   data="obrigatorio" msg="Campo é obrigatório" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nome">Cidade</label>
                                    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Ex: Araras"   data="obrigatorio" msg="Campo é obrigatório" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nome">Estado</label>
                                    <input type="text" class="form-control" name="estado" id="estado" placeholder="Ex: SP"  data="obrigatorio" msg="Campo é obrigatório" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nome">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Ex: Perto da venda do Paulo">
                                </div>
                            </div>
                        </div><br>
                        <div class="col-lg-12">
                            <h2 class="uppercase text-center">Dados Cadastrais</h2>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Ex: 19999999999"  data="obrigatorio" msg="Campo é obrigatório" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">E-mail</label>
                                    <!-- <input type="text" class="form-control" name="email" id="email" value="" placeholder="Ex: batman@fatec.sp.gov.br" required autocomplete="off"  role="presentation" > -->
                                    <input class="form-control" id="email" name="email" readonly type="text"  data="obrigatorio" msg="Campo é obrigatório" onfocus="if (this.hasAttribute('readonly')) {
                            this.removeAttribute('readonly');
                            this.blur();    this.focus();  }" />

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Senha</label>
                                    <input type="password" class="form-control senha1" name="senha"   data="obrigatorio" msg="Campo é obrigatório">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Confirmar senha</label>
                                    <input type="password" class="form-control senha2" name="senha"  data="obrigatorio" msg="Campo é obrigatório">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nome">Observacao</label>
                                    <input type="text" class="form-control" name="observacao" id="observacao" placeholder="Ex: Sou aluno da escola Alberto Feres">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Tipo de cadastro</label>

                                    <select class="form-control" name="tipo_id" id="tipo_id"  data="obrigatorio" msg="Campo é obrigatório">
                                        <option value="">Selecione</option>
                                        <?php foreach ($tipopessoa as $pes) { ?>
                                            <option value="<?php echo $pes->id ?>"><?php echo $pes->nome ?></option>
                                        <?php } ?>

                                    </select>


                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Escolaridade</label>
                                    <select class="form-control" name="escolaridade_id" id="escolaridade_id"  data="obrigatorio" msg="Campo é obrigatório">
                                        <option value="">Selecione</option>
                                        <?php foreach ($escolaridade as $es) { ?>
                                            <option value="<?php echo $es->id ?>"><?php echo $es->nome ?></option>
                                        <?php } ?>

                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="button button-small button-line-dark">Cadastrar</button><br><br>
                            <button type="submit" class="button button-small button-line-dark" id="cancelarregistro">Cancelar Registro</button>
                         </div>
                    </form>
                </div>
            </div>
            <div class="row" id="formlogin">

                <div class="col-lg-12">
                    <div class="col-lg-6">

                        <div class="col-lg-12">
                            <h2 class="uppercase text-center">Registre-se</h2>
                               <p class="lead text-center">Registre para ter acesso a nossas platestras e novos eventos.</p>
                        </div>


                        <div class="col-lg-12 text-center">
                            <input type="button" class="button button-small button-line-dark" id="registrar" value="registre agora"><br>
                        </div>

                    </div>
                    <div class="col-lg-6 text-center">


                        <div class="col-lg-12">
                            <h2 class="uppercase text-center">ACESSAR</h2>
                            <p class="lead text-center">se você já é cadastrado faça seu login.</p>
                        </div>



                        <div class="login-form-wrapper">


                            <div id="emailInputWrapper">
                                <label for="email">Email </label>
                                <input id="emaillogin" type="text" name="emaillogin" value="">
                            </div>


                            <div id="emailInputWrapper">
                                <label for="email">Senha </label>
                                <input id="passwordlogin" type="password" name="passwordlogin" value="" style="font-size: 16px;
    font-family: inherit;
    width: 100%;
    min-height: 30px;
    padding: 12px 10px;
    text-transform: uppercase;
    border: 0;
    border: 1px solid #999999;
    margin-bottom: 20px;
    outline: none;">
                            </div>

                            <div id="submit-wrapper">

                                <input type="button" class="button button-small button-line-dark col-lg-12 " id="fazerlogin" value="ACESSAR">
                                <!-- <a href="#">Esqueceu sua senha?</a> -->
                            </div>

                        </div>
                    </div>
                </div>







                <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>




            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <!--
        <section id="gallery">
            <div class="container">
                <div class="row">
                
                    <div class="col-lg-12">
                        <h2 class="uppercase">EVENTOS ANTERIORES</h2>
                        <p class="lead">Veja o que já rolou anteriormente</p>
                        
                        <div id="timeline" data-columns>

                            <?php foreach ($fotos as $ft) { ?>
                                # code...
                          
                            
                            <div class="item wrap">
                                <img class="img-responsive" src="<?php echo base_url() . $ft->caminho ?>" alt="">
                                <div class="overlay"></div>
                                <div class="icon">
                                    <a class="image-popup" href="<?php echo base_url() . $ft->caminho ?>" title="<?php echo  $ft->nome ?>"><i class="pe-3x pe-7s-plus"></i></a>
                                </div>
                            </div>
                            
                      <?php  } ?>
                            
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        -->

    <!-- SPONSORS -->
    <section id="sponsors">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="uppercase">Parceiros</h2>
                    <p class="lead">Quem está nos apoiando</p>

                    <div id="sponsors-carousel">

                        <div class="sponsor">
                            <img class="img-responsive" src="<?php echo base_url() . 'evento/img/parceiros/kabum_2.png' ?>" alt="">
                        </div>                        

                        <div class="sponsor">
                            <img class="img-responsive" src="<?php echo base_url() . 'evento/img/parceiros/dextra_2.png' ?>" alt="">
                        </div>

                        <div class="sponsor">
                            <img class="img-responsive" src="<?php echo base_url() . 'evento/img/parceiros/fabweb.png' ?>" alt="">
                        </div>

                        <div class="sponsor">
                            <img class="img-responsive" src="<?php echo base_url() . 'evento/img/parceiros/tstech.png' ?>" alt="">
                        </div>

                        <div class="sponsor">
                            <img class="img-responsive" src="<?php echo base_url() . 'evento/img/parceiros/3xbit_2.png' ?>" alt="">
                        </div>

                        <div class="sponsor">
                            <img class="img-responsive" src="<?php echo base_url() . 'evento/img/parceiros/devcoffee_2.png' ?>" alt="">
                        </div>                        

                        <div class="sponsor">
                            <img class="img-responsive" src="<?php echo base_url() . 'evento/img/parceiros/grafimec_2.png' ?>" alt="">
                        </div>

                        <div class="sponsor">
                            <img class="img-responsive" src="<?php echo base_url() . 'evento/img/parceiros/integra.jpg' ?>" alt="">
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- google map -->
    <!-- <div id="gmap_canvas"></div> -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.9526839151295!2d-47.336429885044474!3d-22.35541538529494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c87088f9dce1f9%3A0xe913168c6d55ff4c!2sR.%20Jarbas%20Leme%20de%20Godoy%2C%20875%20-%20Jardim%20Jose%20Ometto%20II%2C%20Araras%20-%20SP%2C%2013606-380!5e0!3m2!1spt-BR!2sbr!4v1569860843030!5m2!1spt-BR!2sbr" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

    <!-- FOOTER -->
    <footer id="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-612">
                    <h4 class="uppercase">VAMOS CONVERSAR?</h4>
                    <p class="small">
                        Direção: Marco Prezotto - f290dir@cps.sp.gov.br<br>
                        Secretaria Acadêmica: f290acad@cps.sp.gov.br<br>
                        Diretoria Administrativa: f290dir@cps.sp.gov.br<br>
                        Gestão Empresarial - coordenação: Zenaide M. Gianini - zenaide.gianini@fatec.sp.gov.br<br>
                        Sistemas para Internet - coordenação: Nilton C. Sacco - nilton.sacco@fatec.sp.gov.br<br>
                        <br>
                        Dúvidas e sugestões: (19) 3541-3004<br>
                        <p>

                            <ul class="list-unstyled list-inline uppercase">
                                <li><a href="https://www.facebook.com/fatec.araras"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.instagram.com/fatec.araras"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                </div>






            </div>
        </div>
    </footer>

    <!-- SUBFOOTER -->
    <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Desenvolvido com <i class="fa fa-heart"></i> pelos alunos do curso Sistemas para Internet - FATEC ARARAS © (
                    <a href="https://github.com/dsicari">Danilo</a> / <a href="https://github.com/fernandazbarreto">Fernanda</a> / <a href="https://github.com/fabiosuzarth">Fabio</a> / <a href="https://github.com/pauloamigoni">Paulo</a> / <a href="https://github.com/silviarosa">Silvia</a>)
                </div>
                <!-- <div class="col-lg-12">
                        <ul class="list-unstyled list-inline pull-right uppercase">
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Press Kit</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div> -->

            </div>
        </div>
    </div>



    <!--<script src="<?php echo base_url('evento/js/jquery-1.11.1.min.js') ?>"></script>-->
    <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
    <script src="<?php echo base_url('evento/js/jquery.themepunch.tools.min.js"') ?>></script>
        <script src=" <?php echo base_url('evento/js/jquery.themepunch.revolution.min.js') ?>"></script>
    <script src="<?php echo base_url('evento/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('evento/js/jquery.sticky.js') ?>"></script>
    <script src="<?php echo base_url('evento/js/jquery.magnific-popup.min.js') ?>"></script>
    <script src="<?php echo base_url('evento/js/salvattore.js') ?>"></script>
    <script src="<?php echo base_url('evento/js/jquery.countdown.js') ?>"></script>
    <script src="<?php echo base_url('evento/js/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
    <script src="<?php echo base_url('evento/js/waypoints.min.js') ?>"></script>
    <script src="<?php echo base_url('evento/js/jquery.counterup.min.js') ?>"></script>
    <script src="<?php echo base_url('evento/js/owl.carousel.min.js') ?>"></script>
    <script src="<?php echo base_url('evento/js/retina.js') ?>"></script>

    <script src="<?php echo base_url('assets/site/src/maskedinput.js') ?>"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery("#fazerlogin").on('click', function() {
                var formData = {
                    'usuario': $('#emaillogin').val(),
                    'senha': $('#passwordlogin').val()
                };

                $.ajax({
                    url: '<?php echo base_url(); ?>usuario/logar',
                    data: formData,
                    type: 'post',
                    dataType: "json",
                    beforeSend: function() {
                        Swal.fire({
                            title: "Aguarde, verificando usuário!",
                            type: "warning",
                            timer: 50000,
                            showConfirmButton: false
                        });
                    },
                    success: function(data) {
                        var info="";
                        if(data.mensagem.includes("Usuário não encontrado")){
                            info=". Se estiver tendo dificuldades para realizar o login, entre em contato pelo whatsapp: (15) 99747 7091 ou eventos@fatecararas.com.br"
                        }

                        if (data.status == "erro") {

                            Swal.fire({
                                title: "Opz...",
                                text: "" + data.mensagem + info,
                                type: "error",
                                timer: 20000,
                                showConfirmButton: true
                            });
                        }
                        if (data.status == "sucesso") {
                            Swal.fire({
                                title: "Ok...",
                                text: "" + data.mensagem + "",
                                type: "success",
                                timer: 800,
                                showConfirmButton: false
                            });
                            window.location.reload(true);

                        }
                    },
                    error: function() {

                    }
                });



            })
        });
    </script>





    <script>
        $(document).ready(function() {
            $('#formulariocadastro').hide();

            $('input[type="text"], select').val('')



            <?php if (isset($_SESSION['logado'])) {  ?>
                $('#register').hide();
                $('#formulariocadastro').remove();
                $('#formlogin').remove();

            <?php } ?>


            $('#registrar').on('click', function(e) {

                $('#formulariocadastro').show();
                $('#formlogin').hide();
                //  $('#nome').focus();


            })

            $('#cancelarregistro').on('click', function(e) {

                $('#formulariocadastro').hide();
                $('#formlogin').show();

                $("#cpfcnpj").val('');
                $("#nome").val('');
                $("#data_nascimento").val('');
                $("#email").val('');
                $(".senha1").val('');
                $(".senha2").val('');
                $("#telefone").val('');
                $("#cep").val('');

                $("#logradouro").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#estado").val("");
                $("#ibge").val("");
                $("#observacao").val("");


            })



        });
    </script>




    <script src="<?php echo base_url('evento/js/main.js') ?>"></script>

    <script src="<?php echo base_url('assets/site/src/cadastrar.js') ?>"></script>




</body>








<?php
$dta = explode('/', date('d/m/Y', strtotime($eventos[0]['evento']->datahora_inicio)));
?>





<script>
    $(document).ready(function() {


        ValidaCampo();
        BuscaEndereco();
        SalvarUsuario();
        validaUsuario();
        ValidaEmail();




    });
</script>







<script>
    <?php $dta = explode('/', date('d/m/Y', strtotime($eventos[0]['evento']->datahora_inicio))); ?>

    var dia = parseInt(<?php echo $dta[0] ?>);
    var mes = parseInt(<?php echo $dta[1] ?>);
    var ano = parseInt(<?php echo $dta[2] ?>);


    //COUNTDOWN TIMER
    var newYear = new Date();
    newYear = new Date(newYear.getFullYear() + 1, 1 - 1, 1);
    $('#countdown').countdown({
        until: new Date(ano, mes - 1, dia)
    }); // enter event day 

    $('#removeCountdown').toggle(
        function() {
            $(this).text('Re-attach');
            $('#defaultCountdown').countdown('destroy');
        },
        function() {
            $(this).text('Remove');
            $('#defaultCountdown').countdown({
                until: newYear
            });
        }
    );
</script>






<style>
    #venue {
        padding-top: 0;
        padding-bottom: 0px !important;
    }


    #gallery {
        padding: 10px 0 10px 0 !important;
    }

    #sponsors {
        margin: 30px 0;
        padding: 10px 0 10px 0 !important;
    }


    .sponsor {
        border: 0px solid #fac42b !important;
        margin: 0 5px !important;
        padding: 20px !important;
        text-align: center !important;
    }

    #speakers {
        background: #f5f5f5;
        border-top: 1px solid #f0f0f0;
        padding: 10px 0 10px 0 !important;
    }


    .container>.navbar-header,
    .container-fluid>.navbar-header,
    .container>.navbar-collapse,
    .container-fluid>.navbar-collapse {
        margin-right: -15px;
        margin-left: -15px;
        background-color: #262626 !important;
    }


    element.style {
        width: 100%;
        height: 70% !important;
        overflow: hidden;
        visibility: inherit;
        opacity: 1;
        z-index: 20;
    }

    .img-circle {
        border-radius: 15% !important;
    }

    /* NAVBAR */
    .navbar-brand {
        display: inline-block;
        padding-bottom: .3125rem;
        white-space: nowrap;
    }

    #navbar-id {
        border: 2px solid white;
        padding: 5px;
    }

    .navbar-brand {
        float: left;
        padding: 19px 16px;
        font-size: 23px;
        line-height: 20px;
        height: 50px;
        color: white;
    }

    /* / NAVBAR */

    .light_heavy_70_shadowed {
        font-size: 60px !important;
        left: 368px !important;
    }

    .light_heavy_75_shadowed {
        font-size: 30px !important;
        left: 980px !important;
        font-weight: bold;
    }

    .light_heavy_80_shadowed {
        font-size: 30px !important;
        left: 1160px !important;
        font-weight: bold;
    }    

    @media screen and (max-width : 600px) {
        .light_heavy_70_shadowed {
            font-size: 20.8px !important;
            left: 13px !important;
        }

        .light_heavy_75_shadowed {
            font-size: 20px !important;
            left: 115px !important;
            font-weight: bold;
        }

        .light_heavy_80_shadowed {
            font-size: 20px !important;
            left: 115px !important;
            font-weight: bold;
        }

        .container-logo-evento {
            display: none;
        }

        #badge-google{
            width: 50%;
        }

    }

    .tp-bgimg {
        opacity: 0.2 !important;
    }

    .navbar-brand {
        float: left;
        padding: 15px 15px !important;
    }
</style>








<link rel="stylesheet" href="<?php echo base_url('/menu/style.css') ?>">
<script src="<?php echo base_url('/menu/script.js') ?>"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
<script  src="<?php echo base_url('login/script.js') ?>"></script>

 -->

<!-- !!!!!!! NAO RETIRAR !!!!!!! -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149676827-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-149676827-1');
    </script>
    <!-- !!!!!!! NAO RETIRAR !!!!!!! -->


</html>