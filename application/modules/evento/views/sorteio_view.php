
<link href="<?php echo base_url('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url('assets/vendors/summernote/summernote.css') ?>">
<link href="<?php echo base_url('assets/vendors/trumbowyg/css/trumbowyg.min.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/form_editors.css'); ?>">


 <section class="content-header">
            <h1>Evento</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                        <i class="fa fa-fw fa-home"></i> Home
                    </a>
                </li>
                <li> Lista</li>
                <li class="active">
                    <a href="#">Evento</a>
                </li>
            </ol>
        </section>
    
        <section class="content p-l-r-15">

        <?php 
            //echo('adsad');
            //var_dump($sorteado);
            //exit;
            if($sorteado==0)
            {
        ?>
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" class="form" action="./sortear">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="num-usuarios">Quantidade de usuários para sortear</label>
                                <input type="number" class="form-control" id="num-usuarios" name="num-usuarios">
                            </div>
                        </div>                    
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </div>
                    </form> 
                </div>
            </div>
        <?php 
            }
            else{
        ?>
            <div class="row">
                <div class="col-lg-12">
                    <h3>Usuários sorteados</h3><br>
                    <?php   
                        foreach($sorteado as $s){
                            echo "<b>ID:</b> ".$s->id." <b>CPF:</b> ".$s->cpfcnpj." <b>NOME:</b> ".ucwords(strtolower($s->nome))."<br>";
                        } 
                    ?>
                </div>
            </div>
        <?php 
            }
        ?>

      </section>
