
 <link href="<?php echo base_url('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url('assets/vendors/summernote/summernote.css') ?>">
<link href="<?php echo base_url('assets/vendors/trumbowyg/css/trumbowyg.min.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/form_editors.css'); ?>">


 <section class="content-header">
            <h1>Pessoa</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                        <i class="fa fa-fw fa-home"></i> Home
                    </a>
                </li>
                <li> Lista</li>
                <li class="active">
                    <a href="#">Pessoa</a>
                </li>
            </ol>
        </section>
    
        <section class="content p-l-r-15">


        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success filterable">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-fw fa-th-large"></i> Lista Pessoa
                            </h3>
                        </div>
                        <div class="panel-body">
                            <table id="table4" data-toolbar="#toolbar" data-search="true" data-show-refresh="false"
                                   data-show-toggle="false" data-show-columns="false" data-show-export="true"
                                   data-detail-view="false" data-detail-formatter="detailFormatter"
                                   data-minimum-count-columns="2" data-show-pagination-switch="true"
                                   data-pagination="true" data-id-field="id" data-page-list="[10, 20,40,ALL]"
                                   data-show-footer="false" data-height="503">
                                <thead>
                                <tr>
                                    <th data-field="CPF / CNPJ" data-sortable="true">CPF / CNPJ</th>
                                    <th data-field="Nome" data-sortable="true">Nome</th>
                                    <th data-field="E-mail" data-sortable="true">E-mail</th>
                                    <th data-field="Cidade" data-sortable="true">Cidade</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($pessoas as $pes) { ?>
                                   
                        
                                <tr>
                                    <td><a href="<?php echo base_url('pessoa/editar/'.$pes->id); ?>" ><?php echo $pes->cpfcnpj; ?></a></td>
                                    <td><?php echo $pes->nome; ?></td>
                                    <td><?php echo $pes->email; ?></td>
                                    <td><?php echo $pes->cidade; ?></td>
                                 
                                </tr>

                                <?php } ?>
                             
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

      </section>
