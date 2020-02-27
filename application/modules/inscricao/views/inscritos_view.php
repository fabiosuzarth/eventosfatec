<?php
//print_r($retorno);

//exit;
?>
<link href="<?php echo base_url('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url('assets/vendors/summernote/summernote.css') ?>">
<link href="<?php echo base_url('assets/vendors/trumbowyg/css/trumbowyg.min.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/form_editors.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom_css/radio_checkbox.css'); ?>">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<section class="content-header">
    <h1>Inscritos</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-fw fa-home"></i> Home
            </a>
        </li>
        <li> Lista</li>
        <li class="active">
            <a href="#">Inscritos</a>
        </li>
    </ol>
</section>


<form class="form-horizontal" method="POST" action="#" id="authentication">



    <section class="content p-l-r-15">

        <div class="row">
            <div class="col-lg-12">
                <h4><?php echo $retorno[0]->evento; ?></h4>
                <h5><?php echo $retorno[0]->atividade; ?> </h5>

                <div class="panel panel-success filterable">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-th-large"></i> Lista de Inscritos
                        </h3>
                    </div>
                    <div class="panel-body">
                        <!-- <table id="table4" data-toolbar="#toolbar" data-search="true" data-show-refresh="false" data-show-toggle="false" data-show-columns="true" data-show-export="true" data-detail-view="false" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 20,40,ALL]" data-show-footer="false" data-height="503"> -->
                        <table class="table table-striped table-bordered" id="table2" data-toolbar="#toolbar" data-search="true" data-show-refresh="false" data-show-toggle="false" data-show-columns="true" data-show-export="true" data-detail-view="false" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 20,40,ALL]" data-show-footer="false" data-height="503">
                            <thead>
                                <tr>

                                    <th data-field="Nome" data-sortable="true">Nome</th>
                                    <th data-field="CPF" data-sortable="true">CPF</th>
                                    <th data-field="Cidade" data-sortable="true">Cidade</th>

                                    <th data-field="Atividade" data-sortable="true">Atividade</th>
                                    <th data-field="Status" data-sortable="true">Status</th>
                                    <th data-filed="select" data-checkbox="true">Presente</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($retorno as $is) {
                                    if ($is->status_id == '1' || $is->status_id == '2' || $is->status_id == '3' || $is->status_id == '4') {
                                        ?>


                                        <tr>

                                            <td><a href="<?php echo base_url('pessoa/editar/' . $is->pessoa_id); ?>"><?php echo $is->nome; ?></a></td>
                                            <td><?php echo $is->cpfcnpj; ?></td>
                                            <td><?php echo $is->cidade; ?></td>
                                            <td><?php echo $is->email; ?></td>

                                            <td><?php echo $is->status; ?></td>
                                            <td>
                                                <?php
                                                        //  $dias = calcularDiferencaDias($retorno[0]->datafim, date("Y-m-d H:i:s"));
                                                        $dias = calcularDiferencaDias(date("Y-m-d H:i:s"), date("Y-m-d H:i:s"));
                                                        if ($dias >= 0) {
                                                            if ($is->status_id == '1' || $is->status_id == '4') { ?>
                                                        <!-- <input type="checkbox" class="custom-control-input" id="conf" name="conf[]" value="<?php echo $is->inscricao_id; ?>"> -->
                                                        <input name="aprovado[<?php echo $is->inscricao_id; ?>]" type="radio" value="S"> SIM
                                                        &nbsp;<input name="aprovado[<?php echo $is->inscricao_id; ?>]" type="radio" value="N"> NÃO
                                                <?php }
                                                        } ?>
                                            </td>

                                        </tr>

                                <?php }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <div class="col-lg-12">
        <div class="col-lg-12">
            <div class="form-group ">
                <?php
                //$dias = calcularDiferencaDias($retorno[0]->datafim, date("Y-m-d H:i:s"));
                $dias = calcularDiferencaDias(date("Y-m-d H:i:s"), date("Y-m-d H:i:s"));
                if ($dias >= 0) { ?>

                    <input type="button" value="Confirmar Presentes" id="acessar" class="btn btn-primary login-btn" style="font-family: 'Montserrat', Arial;" />
                <?php } else {
                    echo calcularDiferencaTempo(date("Y-m-d H:i:s"), $retorno[0]->datafim) . " para liberar as confirmações";
                } ?>
                <a href="<?php echo base_url('inscricao/listapdf/' .  $retorno[0]->atividade_id); ?>" target="_blank" class="btn btn-primary login-btn" style="font-family: 'Montserrat', Arial;"> Imprimir Lista de Inscritos </a>

            </div>
        </div>
    </div>




    </div>
</form>



<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js') ?>" type="text/javascript"></script>


<script>
    $(document).ready(function() {

        $("#acessar").on('click', function() {

            var datastring = $("form").serialize();



            $.ajax({
                url: '<?php echo base_url(); ?>inscricao/confirmarinscricao',
                data: datastring,
                type: 'post',
                dataType: "json",
                beforeSend: function() {
                    Swal.fire({
                        title: "Processando...",
                        type: "warning",
                        timer: 50000,
                        showConfirmButton: false
                    });
                },
                success: function(data) {
                    if (data.result == false) {
                        Swal.fire({
                            title: "Opz...",
                            text: "" + data.message + "",
                            type: "error",
                            timer: 20000,
                            showConfirmButton: true
                        });
                    } else if (data.result == true) {
                        Swal.fire({
                            title: "Tudo certo!",
                            text: "",
                            type: "success",
                            timer: 10000,
                            showConfirmButton: true
                        }, function() {});
                        location.reload();
                    }
                },
                error: function() {
                    Swal.fire({
                        title: "Opz...",
                        text: "Não deu certo!",
                        type: "error",
                        timer: 20000,
                        showConfirmButton: true
                    });
                }
            });


        });
    });
</script>