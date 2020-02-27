<?php 
// foreach($eventos as $datas){
//           print_r($datas);
//        foreach ($datas as $ev) {
//             foreach ($ev->data as $a) {
//                 print_r($a);
//                 echo $a['devento']."<br>";
//                 foreach ($a['atividade'] as $at) {
//                    echo $at->nome."<br>";
//                 }
//                 echo "<hr>";
//             }
//         }
//     }
// exit;
?>




<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	
<!-- Mirrored from wpthemecube.com/eventr_html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2019 21:26:42 GMT -->
<head>
    	
        <title>Eventos FATEC</title>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Eventos Fatec">
        <meta name="author" content="FATEC">
        
        <!-- viewport settings -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
     

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
        <link href='<?php echo base_url('evento/fonts/css5c0a.css?family=Open+Sans:400,300')?>' rel='stylesheet' type='text/css'>
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('evento/img/favicon.ico') ?>">


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
            
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- <a href="index-2.html"><img src="<?php echo base_url('evento/img/logo.png')?>" alt="logo"></a> -->
            </div>
    
            <div class="collapse navbar-collapse" id="nav">
              <ul class="nav navbar-nav navbar-right uppercase">
                <li><a data-toggle="elementscroll" href="#info">Sobre</a></li>
                <li><a data-toggle="elementscroll" href="#speakers">Palestrantes</a></li>
                <li><a data-toggle="elementscroll" href="#program">Programação</a></li>
                <li><a data-toggle="elementscroll" href="#venue">Local</a></li>
                <li><a data-toggle="elementscroll" href="#register">Registrar</a></li>
                <li><a data-toggle="elementscroll" href="#gallery">Galeria</a></li>
                <li><a data-toggle="elementscroll" href="#sponsors">Patrocinadores</a></li>
                <li><a data-toggle="elementscroll" href="#footer">Contato</a></li>
              </ul>
            </div>
            
          </div>
        </nav>
        
        <!-- FULLSCREEN SLIDER -->
        <div class="tp-banner-container">
            <div class="tp-banner">
				<ul>	
                	<!-- SLIDE 1 -->
                    <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000" data-thumb="https://images.unsplash.com/photo-1480506132288-68f7705954bd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=793&q=80"  data-saveperformance="off"  data-title="Slide">
                        <!-- MAIN IMAGE -->
                        <img src="https://images.unsplash.com/photo-1480506132288-68f7705954bd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=793&q=80"  alt="fullslide1"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption light_heavy_70_shadowed lfb ltt tp-resizeme"
                            data-x="center" data-hoffset="250"
                            data-y="center" data-voffset="-70"
                            data-speed="600"
                            data-start="800"
                            data-easing="Power4.easeOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.1"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;">III Semana Tecnologia
                        </div>
                
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption light_medium_30_shadowed lfb ltt tp-resizeme"
                            data-x="center" data-hoffset="205"
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
                            style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;">28/10/2019 - 01/11/2019
                        </div>
                
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
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-12 text-center">
                        <h1>Sobre</h1>
                        <p class="lead">
                        Faculdade Pública, Gratuita e  de Qualidade 
 

As<b> Faculdades de Tecnologia do Estado de São Paulo </b> (FATECs) são instituições de ensino superior públicas brasileiras pertencentes ao Centro Estadual de Educação Tecnológica Paula Souza (CEETEPS), autarquia da Secretaria de Desenvolvimento Econômico, Ciência e Tecnologia (SDECTI) do estado de São Paulo. É uma das seis instituições estaduais de educação superior mantidas pelo governo do estado de São Paulo.
<br>
A Fatec Araras é fruto de um convênio entre o Governo do Estado de São Paulo e a Prefeitura Municipal de Araras.  O Governador Geraldo Alkmin, em visita oficial a Araras, anunciou a vinda da Fatec para a o município em 2013 e o convênio entre o CEETEPS  foi assinado em 2015.
                        </p>
                    </div>
                    
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
                 
        <!-- SPEAKERS -->
        <section id="speakers">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <h2 class="uppercase">Palestrantes</h2>
                        <p class="lead">Conheça cada um de nossos palestrantes.</p>
                    </div> 
                    
                    <ul id="list-speaker" class="list-unstyled"> 
                        
                        <!-- SPEAKER 1 -->	
                        <li class="col-lg-3 col-md-3 col-sm-4">
                            <div class="speaker">
                                <figure class="effect-ming">
                                    <img class="img-responsive" src="<?php echo base_url('evento/img/paulo.png') ?>" alt=""/>
                                    <figcaption>
                                        <span><a class="html-popup" href="speaker-detail.html"><img class="img-responsive" src="<?php echo base_url('evento/img/plus.png') ?>" alt=""></a></span>
                                    </figcaption>			
                                </figure>
                                
                                <div class="caption text-center">
                                    <h4>Paulo H. Amigoni</h4>
                                    <p class="company">Dev. Web  - LightSystem</p>
                                </div>   
                            </div>
                        </li>


                          <!-- SPEAKER 1 -->	
                        <li class="col-lg-3 col-md-3 col-sm-4">
                            <div class="speaker">
                                <figure class="effect-ming">
                                    <img class="img-responsive" src="https://scontent.fcpq9-1.fna.fbcdn.net/v/t1.0-9/30725174_117773825747453_4871098164750319616_n.jpg?_nc_cat=111&amp;_nc_eui2=AeEjIBEes9fLBkKtq2sSIM75GmcBoUpsxZGBDG--Qc3OkvIKJNXMrq-3Una6VrM9FhcNBkbh3s2zIPZgJnFiNbJ9pcwIgK-PaDZTE61jEh6nMQ&amp;_nc_oc=AQmESAdwdtwBBRUZcXpCDNV7ro4c8Bi5wxizDewVE2iSGiToPQg_JcUmQ1vfqMKSdRQ&amp;_nc_ht=scontent.fcpq9-1.fna&amp;oh=49b81f4b5361a56e9e7693ca9ccce0ba&amp;oe=5DF60F30" alt=""/>
                                    <figcaption>
                                        <span><a class="html-popup" href="speaker-detail.html"><img class="img-responsive" src="<?php echo base_url('evento/img/plus.png') ?>" alt=""></a></span>
                                    </figcaption>			
                                </figure>
                                
                                <div class="caption text-center">
                                    <h4>Danilo Sicari</h4>
                                    <p class="company">Dev. Full  - NASA</p>
                                </div>   
                            </div>
                        </li>
                 


                          <!-- SPEAKER 1 -->	
                        <li class="col-lg-3 col-md-3 col-sm-4">
                            <div class="speaker">
                                <figure class="effect-ming">
                                    <img class="img-responsive" src="https://scontent.fcpq9-1.fna.fbcdn.net/v/t1.0-9/67940232_2840220605994183_4957987973078450176_n.jpg?_nc_cat=108&amp;_nc_eui2=AeHJ3hxHG3qme7HOfxroyRPN5uXOdl4Uz127k4ej_n2u-qEh0eS8kaQAS6MXWUdDapcIBF20oJ7KFnoxdwMq_dig5ES9MBSi0QZg35iwGD-3uw&amp;_nc_oc=AQnDyIibZTveLtOxHG0FuwTN7tEuQ2LauIlB8pe0kyIIRNbvncU0RvudWE3X9Uko9gQ&amp;_nc_ht=scontent.fcpq9-1.fna&amp;oh=41e145739698b7b242266ed57ad59b6a&amp;oe=5E3D7176" alt=""/>
                                    <figcaption>
                                        <span><a class="html-popup" href="speaker-detail.html"><img class="img-responsive" src="<?php echo base_url('evento/img/plus.png') ?>" alt=""></a></span>
                                    </figcaption>			
                                </figure>
                                
                                <div class="caption text-center">
                                    <h4>Fabio Suzarth</h4>
                                    <p class="company">Dev. Web. - LightSytem</p>
                                </div>   
                            </div>
                        </li>

                               <!-- SPEAKER 1 -->	
                        <li class="col-lg-3 col-md-3 col-sm-4">
                            <div class="speaker">
                                <figure class="effect-ming">
                                    <img class="img-responsive" src="https://scontent.fcpq9-1.fna.fbcdn.net/v/t1.0-1/c0.0.639.639a/15241308_10208087559201829_2967983580456220407_n.jpg?_nc_cat=101&amp;_nc_eui2=AeH22Xc5rETSi9U7FvXwfrtINVU6hrIwql12myGFDLGKEeiz_KkoyCYV9Evv9fl2sF6_eSHJS3iks85IFTADCwQ5nu0CbhLPmSCbXzQc0f0nZA&amp;_nc_oc=AQlnWrjTgp7c6Ppt4YYneJnqPt02qTkSB2V-jHlDlSe2-9JZhKqTkE5ZtRPAFixsfqE&amp;_nc_ht=scontent.fcpq9-1.fna&amp;oh=a5534969a2bd8e06825b195b96323922&amp;oe=5E30D083" alt=""/>
                                    <figcaption>
                                        <span><a class="html-popup" href="speaker-detail.html"><img class="img-responsive" src="<?php echo base_url('evento/img/plus.png') ?>" alt=""></a></span>
                                    </figcaption>			
                                </figure>
                                
                                <div class="caption text-center">
                                    <h4>Fernanda Zatti</h4>
                                    <p class="company">Dev. Cobol - IBM</p>
                                </div>   
                            </div>
                        </li>



                               <!-- SPEAKER 1 -->	
                        <li class="col-lg-3 col-md-3 col-sm-4">
                            <div class="speaker">
                                <figure class="effect-ming">
                                    <img class="img-responsive" src="https://scontent.fcpq9-1.fna.fbcdn.net/v/t1.0-9/65557964_2432655686958200_5522611499161354240_n.jpg?_nc_cat=100&_nc_eui2=AeGFxayXQ6e65SMWkgQChUpkYq2eK6wq2K5Y4TBqTpoHQlig2n7Xd1SmzeWkN_BETlThmn4Wh643nctdbfpLxvygXNF_i_OtXLWVBAuOIwdyAg&_nc_oc=AQmC-1H4t-T8T8MjLMoQ8iSrq6qt47j4IJhUFncz2vDQ1vyUrQhe0EI-b7vAOWyODzE&_nc_ht=scontent.fcpq9-1.fna&oh=dc66e44d6ad1128f8ead9b17f50f3e80&oe=5DF08BEF" alt=""/>
                                    <figcaption>
                                        <span><a class="html-popup" href="speaker-detail.html"><img class="img-responsive" src="<?php echo base_url('evento/img/plus.png') ?>" alt=""></a></span>
                                    </figcaption>			
                                </figure>
                                
                                <div class="caption text-center">
                                    <h4>Silvia Rosa Curto</h4>
                                    <p class="company">Gerente de Contabilidade  - Ts Tech do Brasil</p>
                                </div>   
                            </div>
                        </li>

                     
                 
                 
                 
                    
                    </ul>
                    
             
                </div>
            </div>
        </section>
        
        <!-- PROGRAM -->
        <!-- <section id="program">
            <div class="container">
                <div class="row">
                
                    <div class="col-lg-12">
                    
                        <h2 class="uppercase">PROGRAMAÇÃO</h2>
                        <p class="lead">FIQUE ATENTOS A NOSSA PROGRAMAÇÃO DO III SEMANA DA TECNOLOGIA</p>
                        <ul id="myTab" class="nav nav-tabs" role="tablist"> -->

<?php
$count = 1;
foreach($eventos as $datas){ ?>

      <section id="program" style="padding: 10px 0 10px 0; !important">
            <div class="container">
             

     <?php  foreach ($datas as $ev) { ?>
   <div class="row">
        <div class="col-lg-12">
                    
        <h2 class="uppercase">PROGRAMAÇÃO</h2>
        <p class="lead" sytle="color: #5f5a5a !important">FIQUE ATENTOS A NOSSA PROGRAMAÇÃO: <?php echo $ev->nome; ?></p>
        <!-- <ul id="myTab" class="nav nav-tabs" role="tablist">

         <?php   foreach ($ev->data as $a) {
                $data_evento =  date('d/m/Y', strtotime($a['devento'])); 
            ?>
           <li role="presentation">
            <a href="#day<?php echo $count; ?>" id="day<?php echo $count; ?>-tab" role="tab" data-toggle="tab" aria-controls="day<?php echo $count; ?>" aria-expanded="true">
            <?php echo $data_evento;?></a>
           </li>
               <?php  $count++;
            }
            ?>
      </ul> -->
                        
                           
     <div id="myTabContent" class="tab-content">

<?php
$count1 = 1;

           if(isset($ev->data )){
            foreach ($ev->data as $a) {
                $data_evento =  date('d/m/Y', strtotime($a['devento'])); 
                ?>
      
      
                              <div role="tabpanel" class="tab-pane fade in <?php if($count1 == 1){echo "active";} ?>" id="day<?php echo $count1;?>" aria-labelledby="day<?php echo $count1;?>-tab">
                                <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                      
                      <?php
                        foreach ($a['atividade'] as $at) {
                             $data_ev =  date('d/m/Y H:m', strtotime($at->datahora_inicio)); 
                            ?>
                              
                              <div class="panel panel-default">
                                    
                                        <!-- Program Heading -->
                                        <div class="panel-heading" role="tab" id="heading<?php echo $at->id;?>">
                                           
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                <p class="date"><?php echo $data_ev;?></p>
                                                </div>
                                                
                                                <div class="col-lg-10 col-md-10 col-sm-10">
                                                    
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#Program<?php echo $at->id;?>" aria-expanded="true" aria-controls="Program<?php echo $at->id;?>">
                                                      <?php echo $at->nome;?>
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    
                                        <div id="Program<?php echo $at->id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $at->id;?>">
                                            <!-- Program Content -->
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-2">
                                                        <img class="img-responsive img-circle" src="<?php echo base_url('evento/img/semimagem.jpeg') ?>" alt="">
                                                    </div>
                                                    
                                                    <div class="col-lg-7 col-md-7 col-sm-10">
                                                        <p class="speaker-name uppercase"><?php echo $at->palestrante_nome;?></p>
                                                        <h4><?php echo $at->nome;?></h4>
                                                        <p style="color: black"><?php echo $at->descricao;?></p>
                                                        <br>
                                                                                                                
                                                        <p><i class="fa fa-lg fa-clock-o"></i> <span class="small">60mins</span></p>
                                                        <p><i class="fa fa-lg fa-map-marker"></i> <span class="small"><?php echo $at->localizacao;?></span></p>
                                                  
                                                    </div>
                                                    
                                                    <div class="col-lg-3 col-md-3 col-sm-10">
                                                        <h5>Sobre <?php echo $at->palestrante_nome;?></h5>
                                                        <p class="small">breve texto</p>
                                                    
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        
                                        </div>
                                    
                                    </div>

                          
                      
                            
                           

               <?php 
            }


 $count1++;

        }
    }

?>

                        
                                </div>  

                                    
                                    </div>
                                
                                </div>
                            </div>
                 
                        </div>
                        

                        
                        <!-- CONTENT -->    
             
                        
                    </div>
                    
                </div>
                 <?php
        
        } ?>
            </div>
        </section>

       <?php
        
       
    }

?>



        <!-- DOWNLOAD -->
        <!-- <section id="download">
            <div class="container">
                <div class="row">
                
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="row">
                        
                            <div class="col-lg-4 col-md-4 col-sm-3">
                                <img class="img-responsive" src="img/download.png" alt="">
                            </div>
                            
                            <div class="col-lg-8 col-md-8 col-sm-9">
                                <h3>Baixe a programação completa</h3>
                                <a class="button button-small button-line-dark" href="#">download pdf</a>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section> -->
        
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
    
        <!-- REGISTER -->
        <section id="register">
            <div class="container">
                <div class="row">
                
                	<div class="col-lg-12">
                    	<h2 class="uppercase text-center">Registre-se</h2>
                        <p class="lead text-center">Registre para ter acesso a nossas platestras e novos eventos.</p>
                    </div>
                
                   
                    
					<div class="col-lg-12 text-center">
                    	<a class="button button-small button-line-dark html-popup" href="register.html">registre agora</a>
                    </div>
                    
                </div>
            </div>
        </section>
        
        <!-- GALLERY -->
        <section id="gallery">
            <div class="container">
                <div class="row">
                
                    <div class="col-lg-12">
                        <h2 class="uppercase">EVENTOS ANTERIORES</h2>
                        <p class="lead">Veja o que já rolou anteriormente</p>
                        
                        <div id="timeline" data-columns>
                            <div class="item wrap">
                                <img class="img-responsive" src="<?php echo base_url('evento/img/thumb1.png')?>" alt="">
                                <div class="overlay"></div>
                                <div class="icon">
                                    <a class="image-popup" href="<?php echo base_url('evento/img/gallery-img.jpg')?>" title="<h4>Sed at rutrum felis</h4>Curabitur nec metus tempor, malesuada quam a, laoreet urna."><i class="pe-3x pe-7s-plus"></i></a>
                                </div>
                            </div>
                            
                            <div class="item wrap">
                                <img class="img-responsive" src="<?php echo base_url('evento/img/thumb2.png')?>" alt="">
                                <div class="overlay"></div>
                                <div class="icon">
                                    <a class="image-popup" href="<?php echo base_url('evento/img/gallery-img.jpg')?>" title="<h4>Sed at rutrum felis</h4>Curabitur nec metus tempor, malesuada quam a, laoreet urna."><i class="pe-3x pe-7s-plus"></i></a>
                                </div>
                            </div>
                            
                            <div class="item wrap">
                                <img class="img-responsive" src="<?php echo base_url('evento/img/thumb3.png')?>" alt="">
                                <div class="overlay"></div>
                                <div class="icon">
                                    <a class="image-popup" href="<?php echo base_url('evento/img/gallery-img.jpg')?>" title="<h4>Sed at rutrum felis</h4>Curabitur nec metus tempor, malesuada quam a, laoreet urna."><i class="pe-3x pe-7s-plus"></i></a>
                                </div>
                            </div>
                            
                            <div class="item wrap">
                                <img class="img-responsive" src="i<?php echo base_url('evento/mg/thumb4.png') ?>" alt="">
                                <div class="overlay"></div>
                                <div class="icon">
                                    <a class="image-popup" href="<?php echo base_url('evento/img/gallery-img.jpg') ?>" title="<h4>Sed at rutrum felis</h4>Curabitur nec metus tempor, malesuada quam a, laoreet urna."><i class="pe-3x pe-7s-plus"></i></a>
                                </div>
                            </div>
                            
                            <div class="item wrap">
                                <img class="img-responsive" src="<?php echo base_url('evento/img/thumb5.png') ?>" alt="">
                                <div class="overlay"></div>
                                <div class="icon">
                                    <a class="image-popup" href="<?php echo base_url('evento/img/gallery-img.jpg') ?>" title="<h4>Sed at rutrum felis</h4>Curabitur nec metus tempor, malesuada quam a, laoreet urna."><i class="pe-3x pe-7s-plus"></i></a>
                                </div>
                            </div>
                            
                            <div class="item wrap">
                                <img class="img-responsive" src="<?php echo base_url('evento/img/thumb6.png') ?>" alt="">
                                <div class="overlay"></div>
                                <div class="icon">
                                    <a class="image-popup" href="<?php echo base_url('evento/img/gallery-img.jpg') ?>" title="<h4>Sed at rutrum felis</h4>Curabitur nec metus tempor, malesuada quam a, laoreet urna."><i class="pe-3x pe-7s-plus"></i></a>
                                </div>
                            </div>
                            
                            <div class="item wrap">
                                <img class="img-responsive" src="i<?php echo base_url('evento/mg/thumb7.png') ?>" alt="">
                                <div class="overlay"></div>
                                <div class="icon">
                                    <a class="image-popup" href="<?php echo base_url('evento/img/gallery-img.jpg') ?>" title="<h4>Sed at rutrum felis</h4>Curabitur nec metus tempor, malesuada quam a, laoreet urna."><i class="pe-3x pe-7s-plus"></i></a>
                                </div>
                            </div>
                            
                            <div class="item wrap">
                                <img class="img-responsive" src="i<?php echo base_url('evento/mg/thumb8.png') ?>" alt="">
                                <div class="overlay"></div>
                                <div class="icon">
                                    <a class="image-popup" href="<?php echo base_url('evento/img/gallery-img.jpg"') ?> title="<h4>Sed at rutrum felis</h4>Curabitur nec metus tempor, malesuada quam a, laoreet urna."><i class="pe-3x pe-7s-plus"></i></a>
                                </div>
                            </div>
                            
                            <div class="item wrap">
                                <img class="img-responsive" src="<?php echo base_url('evento/img/thumb9.png') ?>" alt="">
                                <div class="overlay"></div>
                                <div class="icon">
                                    <a class="image-popup" href="<?php echo base_url('evento/img/gallery-img.jpg') ?>" title="<h4>Sed at rutrum felis</h4>Curabitur nec metus tempor, malesuada quam a, laoreet urna."><i class="pe-3x pe-7s-plus"></i></a>
                                </div>
                            </div>
                            
                          
                            
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        
        <!-- TESTIMONIAL -->
        <section id="testimonial">
            <div class="container-fluid">
                <div class="row">
 
                    <div class="col-lg-6 col-lg-offset-6 col-md-6 col-md-offset-6 no-padding">
                        <div class="testimonial-inner">
                            <h2 class="hidden">testimonial</h2>
                        
                            <div id="testimonial-carousel">
                                <div class="item">
                                    <img class="img-circle" src="<?php echo base_url('evento/img/testimonial1.png')?>" alt="">
                                    <p class="lead">Nulla euismod sit amet ligula in vehicula. Vestibulum cursus ex non ante dignissim ultricies.Sed egestas hendrerit neque tincidunt mattis. Duis euismod porta tempus.</p>
                                    <p class="name">Todd Stone</p>
                                </div>
                                
                                <div class="item">
                                    <img class="img-circle" src="<?php echo base_url('evento/img/testimonial2.png')?>" alt="">
                                    <p class="lead">Nulla euismod sit amet ligula in vehicula. Vestibulum cursus ex non ante dignissim ultricies. Sed egestas hendrerit neque tincidunt mattis. Duis euismod porta tempus.</p>
                                    <p class="name">Minnie Pierce</p>
                                </div>
                                
                                <div class="item">
                                    <img class="img-circle" src="<?php echo base_url('evento/img/testimonial3.png')?>" alt="">
                                    <p class="lead">Nulla euismod sit amet ligula in vehicula. Vestibulum cursus ex non ante dignissim ultricies. Sed egestas hendrerit neque tincidunt mattis. Duis euismod porta tempus.</p>
                                    <p class="name">Lena Kim</p>
                                </div>
                            </div>
                         </div>   
                    </div>
                    
                </div>
            </div>
        </section>
        
        <!-- SPONSORS -->
        <section id="sponsors">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="uppercase">Patrocinadores</h2>
                        <p class="lead">Quem está nos apoiando</p>
                        
                        <div id="sponsors-carousel">
                            
                            <div class="sponsor">
                                <img class="img-responsive" src="https://amigoni.com.br/images/site/LOGO2.png" alt="">
                            </div>
                            
                            <div class="sponsor">
                                <img class="img-responsive" src="https://cdn.carsp.com.br/upload/revenda/fachada_59edef8a8d8fc.jpg" alt="">
                            </div>
                            
                            <div class="sponsor">
                                <img class="img-responsive" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTP6CUoKn6bDzXVdPAoCcWxnxrOLtojEdwDMFzbzzVxFacqbC1k" alt="">
                            </div>
                            
                            <div class="sponsor">
                                <img class="img-responsive" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjQgX2jZj4C3slHY-Q5P7tGndtJ_yprnObIqlTlR7jKX9GkENWHg" alt="">
                            </div>
                            
                            <div class="sponsor">
                                <img class="img-responsive" src="data:image/jpeg;base64,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" alt="">
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        
        <!-- google map -->
		<div id="gmap_canvas"></div>
        
        <!-- FOOTER -->        
        <footer id="footer">
        	<div class="container">
            	<div class="row">
                	
                    <div class="col-lg-12 col-md-12 col-sm-612">
                    	<h4 class="uppercase">FATEC ARARAS</h4>
                        <p class="small">
                        
Diretor: Marco Prezotto - f290dir@cps.sp.gov.br<br>
Secretaria Acadêmica: f290acad@cps.sp.gov.br<br>
Diretoria de serviços: f290dir@cps.sp.gov.br<br>
Coordenação de Gestão Empresarial: Zenaide M. Gianini - zenaide.gianini@fatec.sp.gov.br<br>
Coordenação de SIstemas para Internet: Nilton C. Sacco - nilton.sacco@fatec.sp.gov.br
<p>
                        
                           <ul class="list-unstyled list-inline uppercase">
                            <li><a href="#"><i class="fa fa-lg fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-lg fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-lg fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-lg fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                    
            
                    
                    
     
                
                </div>
            </div>
        </footer>
        
        <!-- SUBFOOTER -->
        <div class="subfooter">
        	<div class="container">
                <div class="row">
                    
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
        

        
    	<script src="<?php echo base_url('evento/js/jquery-1.11.1.min.js') ?>"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script src="<?php echo base_url('evento/js/jquery.themepunch.tools.min.js"') ?>></script>
        <script src="<?php echo base_url('evento/js/jquery.themepunch.revolution.min.js') ?>"></script>
        <script src="<?php echo base_url('evento/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('evento/js/jquery.sticky.js') ?>"></script>
        <script src="<?php echo base_url('evento/js/jquery.magnific-popup.min.js') ?>"></script>
        <script src="<?php echo base_url('evento/js/salvattore.js') ?>"></script>
        <script src="<?php echo base_url('evento/js/jquery.countdown.js') ?>"></script>
        <script src="<?php echo base_url('evento/js/jquery.mCustomScrollbar.concat.min.js') ?>" ></script>
        <script src="<?php echo base_url('evento/js/waypoints.min.js') ?>"></script>
        <script src="<?php echo base_url('evento/js/jquery.counterup.min.js') ?>"></script>
        <script src="<?php echo base_url('evento/js/owl.carousel.min.js') ?>"></script>
        <script src="<?php echo base_url('evento/js/retina.js') ?>"></script>
        <script src="<?php echo base_url('evento/js/main.js') ?>"></script>
        
      	
        
<!--         
        <!-- GOOGLE ANALYTICS -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-3788027-12"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-3788027-12');
        </script>
  -->
        
	</body>

</html>
