<link href="<?php echo base_url('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url('assets/vendors/summernote/summernote.css') ?>">
<link href="<?php echo base_url('assets/vendors/trumbowyg/css/trumbowyg.min.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/form_editors.css'); ?>">


<section class="content-header">
    <h1>Atividade</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-fw fa-home"></i> Home
            </a>
        </li>
        <li> Lista</li>
        <li class="active">
            <a href="#">Atividade</a>
        </li>
    </ol>
</section>

<section class="content p-l-r-15">


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-fw fa-th-large"></i> Lista Atividade
                    </h3>
                </div>
                <div class="panel-body">
                    <table id="table4" data-toolbar="#toolbar" data-search="true" data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-show-export="true" data-detail-view="false" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 20,40,ALL]" data-show-footer="false" data-height="503">
                        <thead>
                            <tr>
                                <th data-field="Nome" data-sortable="true">Nome</th>
                                <th data-field="Evento" data-sortable="true">Evento</th>
                                <th data-field="Inicio" data-sortable="true">Data Inicio</th>
                                <th data-field="Fim" data-sortable="true">Data Fim</th>
                                <th data-field="Localização" data-sortable="true">Localização</th>
                                <th data-field="Palestrante" data-sortable="true">Palestrante</th>
                                <th data-field="Status" data-sortable="true">Status</th>
                                <th data-field="Inscritos" data-sortable="true">Insc.</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($atividade as $at) { ?>


                                <tr>
                                    <td><a href="<?php echo base_url('atividades/editar/' . $at->id); ?>"><?php echo $at->nome; ?></a></td>
                                    <td><?php echo $at->nomeevento; ?></td>
                                    <td><?php echo date('d/m/Y H:i', strtotime($at->datahora_inicio)); ?></td>
                                    <td><?php echo date('d/m/Y H:i', strtotime($at->datahora_fim)); ?></td>
                                    <td><?php echo $at->localizacao; ?></td>
                                    <td><?php echo $at->palestrante; ?></td>
                                    <td><?php echo $at->status; ?></td>

                                    <?php if ($at->totalInsc > 0) { ?>
                                        <td><a href="<?php echo base_url('inscricao/atividades/' . $at->id); ?>"><?php echo $at->totalInsc; ?></a>
                                                <br>
                                            <a href="<?php echo base_url('inscricao/listapdf/' . $at->id); ?>" target="_blank">Lista</a>
                                        </td>
                                    <?php } else { ?>
                                        <td>0</td>
                                    <?php } ?>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>