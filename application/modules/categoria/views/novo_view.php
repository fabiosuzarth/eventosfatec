
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
                <li> Cadastro</li>
                <li class="active">
                    <a href="#">Evento</a>
                </li>
            </ol>
        </section>
    
        <section class="content p-l-r-15">

        

           <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                <i class="fa fa-fw fa-file-text-o"></i> Cadastrar Evento
                                            </h3>
                                            <span class="pull-right hidden-xs">
                                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                </span>
                                        </div>
                                        <div class="panel-body">
                                            <div>
                                                <form method="post" class="form" action="inserir">


                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="titulo">Titulo</label>
                                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Titulo">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="descricao">Descrição</label>
                                                             <!-- <textarea rows="4" class="form-control resize_vertical" id="descricao" name="descricao" placeholder="Descrição"></textarea> -->
                                                        
                                                  
                        <div class='box-header'>
                        
                            <!-- tools box -->
                            <div class="pull-right box-tools"></div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class='box-body'>
                     
                                <textarea class="textarea editor-cls" name="descricao" placeholder="Place some text here"></textarea>
                          
                        </div>
                    </div>
                                                        
                                                        </div>
                                                 

                                                   <br>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="datahora_inicio">Data Inicio</label>
                                                            <input type="text" class="form-control" id="datahora_inicio" name="datahora_inicio" placeholder="Data Inicio">
                                                        </div>
                                                    </div>

                                                     <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="datahora_fim">Data Fim</label>
                                                            <input type="text" class="form-control" id="datahora_fim" name="datahora_fim" placeholder="Data Inicio">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="localizacao">Localização</label>
                                                            <input type="text" class="form-control" id="localizacao" name="localizacao" placeholder="Localização">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="valor">Valor</label>
                                                            <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <input type="text" class="form-control" id="status" name="status" placeholder="status">
                                                        </div>
                                                    </div>


                                <input type="hidden" id="pessoa_id" value="1" name="pessoa_id" placeholder="pessoa_id" />
                                <input type="hidden" id="organizador_pessoa_id" value="1"   name="organizador_pessoa_id" placeholder="organizador_pessoa_id" />


                                <div class="col-md-12">
                                             <input type="submit" class="btn btn-primary col-md-12">
                                                               
                                                            </div>



                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





      </section>


