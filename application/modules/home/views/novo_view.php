<?php 
    //print_r($statusInscricaoAtividades); exit; 
?>
<link href="<?php echo base_url('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url('assets/vendors/summernote/summernote.css') ?>">
<link href="<?php echo base_url('assets/vendors/trumbowyg/css/trumbowyg.min.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/form_editors.css'); ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<style>

    #caixa-atividade, #grafico{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    #caixa{
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
        box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
        border: none;
        color: white;
        padding: 10px;
        text-shadow: 1px 1px 2px #000000;   
    }

    #caixa-atividade-titulo p{
        font-size: 10pt;
    }  


    #caixa p{
        text-align: right;
        font-size: 20pt;
    }

    @media screen and (max-width : 600px) {
        #caixa{
            margin-left: 15px;
            margin-right: 15px;
            margin-top: 5px;
        }
    }
</style>
    <section class="content-header">
        <h1>Home</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-fw fa-home"></i> Home
                </a>
            </li>
              
        </ol>
    </section>
    
    <section class="content p-l-r-15"> 

        <h1 style="text-align:center;">III SEMANA CIÊNCIA E TECNOLOGIA</h1><br>  

        <div class="row" >
            <div class="col-lg-1"></div>
            <div id="grafico"  style="border:solid 1px black;border-radius: 5px;" class="col-lg-4">
                <canvas id="grafico-cadastro-site-dia"></canvas>
            </div>
            <div class="col-lg-2"></div>
            <div id="grafico"  style="border:solid 1px black;border-radius: 5px;" class="col-lg-4">
                <canvas id="grafico-inscricao-atividade-dia"></canvas>
            </div>
            <div class="col-lg-1"></div>
        </div>
        <br>

        <?php
            //echo(json_encode($graficoInscricoesDia));
            foreach($statusInscricaoAtividades as $at)
            {
        ?>
            <div class="row">
                <div class="col-lg-1"></div>
                <div id="caixa-atividade" style="border:solid 1px black;border-radius: 5px;" class="col-lg-10">
                    <div id="caixa-atividade-titulo" class="row" style="margin-top:10px">
                        <div class="col-lg-12">
                        <strong><p><?php echo($at->atividade_nome); ?><p></strong>
                        </div>
                    </div>
                    <div class="row" id="caixa-row" style="margin-bottom:10px;">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-1"></div>
                        <div id="caixa" style="background: linear-gradient(45deg,#4099ff,#73b4ff);" class="col-lg-2">
                            <strong>VAGAS<br><p><?php echo($at->vagas_ofertadas); ?></p></strong>
                        </div>
                        <div class="col-lg-1"></div>
                        <div id="caixa" style="background: linear-gradient(45deg,#2ed8b6,#59e0c5);" class="col-lg-2">
                            <strong>INSCRITOS<br><p><?php echo($at->total_inscritos); ?></p></strong>
                        </div>
                        <!--<div class="col-lg-1"></div>
                        <div id="caixa" style="background: linear-gradient(45deg,#FF5370,#ff869a);" class="col-lg-1">
                            <strong>COMPARECERAM<br><br><p><?php echo($at->total_inscritos_compareceu); ?></p></strong>
                        </div>
                        <div class="col-lg-1"></div>
                        <div id="caixa" style="background: linear-gradient(45deg,#4099ff,#73b4ff);" class="col-lg-1">
                            <strong>NÃO COMPARECERAM<br><p><?php echo($at->total_inscritos_nao_compareceu); ?></p></strong>
                        </div>                    
                        <div class="col-lg-1"></div>-->
                        <div class="col-lg-1"></div>
                        <div id="caixa" style="background: linear-gradient(45deg,#FF5370,#ff869a);" class="col-lg-2">
                            <strong>VAGAS RESTANTES<br><p><?php echo($at->vagas_restantes); ?></p></strong>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-1"></div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
            <br>
        <?php
            }
        ?>
    </section>

    <script>
        var dataInscricoesDia = <?php echo(json_encode($graficoInscricoesDia)) ?>;
        var dataCadastrosDia = <?php echo(json_encode($graficoCadastrosDia)) ?>;
        var data_xInscricoesDia=[];
        var data_yInscricoesDia=[];
        var data_xCadastrosDia=[];
        var data_yCadastrosDia=[];
        //console.log(dataCadastrosDia);

        for(var r in dataInscricoesDia.records) {
            //console.log(dataInscricoesDia.records[r].data_y,dataInscricoesDia.records[r].data_x);
            data_xInscricoesDia.push(dataInscricoesDia.records[r].data_x);
            data_yInscricoesDia.push(dataInscricoesDia.records[r].data_y);
        }
        //console.log(data_xInscricoesDia, data_yInscricoesDia);

        for(var r in dataCadastrosDia.records) {
            //console.log(dataCadastrosDia.records[r].data_y,dataCadastrosDia.records[r].data_x);
            data_xCadastrosDia.push(dataCadastrosDia.records[r].data_x);
            data_yCadastrosDia.push(dataCadastrosDia.records[r].data_y);
        }
        //console.log(data_xInscricoesDia, data_yInscricoesDia);

        new Chart(document.getElementById("grafico-cadastro-site-dia"), {
            type: 'line',
            data: {
                labels: data_xCadastrosDia,
                datasets: [
                    { 
                        data: data_yCadastrosDia,
                        label: "Cadastros",
                        borderColor: "#3e95cd",
                        fill: false
                    }              
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: true,                
                    text: 'Cadastros site por dia'
                }
            }
        });

        new Chart(document.getElementById("grafico-inscricao-atividade-dia"), {
            type: 'line',
            data: {
                labels: data_xInscricoesDia,
                datasets: [
                    { 
                        data: data_yInscricoesDia,
                        label: "Incrições",
                        borderColor: "#3cba9f",
                        fill: false
                    }              
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: true,                
                    text: 'Incrições atividades por dia'
                }
            }
        });
    </script>


