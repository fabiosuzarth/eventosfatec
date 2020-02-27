
 <link href="<?php echo base_url('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url('assets/vendors/summernote/summernote.css') ?>">
<link href="<?php echo base_url('assets/vendors/trumbowyg/css/trumbowyg.min.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/form_editors.css'); ?>">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

 
 <section class="content-header">
            <h1>Pessoa</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                        <i class="fa fa-fw fa-home"></i> Home
                    </a>
                </li>
                <li> Cadastro</li>
                <li class="active">
                    <a href="#">Pessoa</a>
                </li>
            </ol>
        </section>
    
        <section class="content p-l-r-15">

        

           <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                <i class="fa fa-fw fa-file-text-o"></i> Cadastrar Pessoa
                                            </h3>
                                            <span class="pull-right hidden-xs">
                                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                </span>
                                        </div>
                                        <div class="panel-body">
                                            <div>
                                                <form method="post" class="form" action="inserir"  enctype="multipart/form-data">


                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="evento">Tipo Pessoa</label>
                                                                <select class="form-control" name="tipo_id" id="tipo_id">
                                                                        <option value="">Selecione</option>
                                                                    <?php foreach ($tipopessoa as $pes) { ?>
                                                                        <option value="<?php echo $pes->id ?>"><?php echo $pes->nome ?></option>
                                                                   <?php } ?>
                                                                    
                                                                </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="CCPFCNPJ">CPF / CNPJ</label>
                                                            <input type="number" class="form-control" id="cpfcnpj" name="cpfcnpj" onblur="validaUsuario(this.value)" placeholder="CPF / CNPJ">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="EMAIL">E-mail</label>
                                                            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="senha">Senha</label>
                                                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <label for="nome">Nome</label>
                                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="evento">Escolaridade</label>
                                                                <select class="form-control" name="escolaridade_id" id="escolaridade_id">
                                                                        <option value="">Selecione</option>
                                                                    <?php foreach ($escolaridade as $esc) { ?>
                                                                        <option value="<?php echo $esc->id ?>"><?php echo $esc->nome ?></option>
                                                                   <?php } ?>
                                                                    
                                                                </select>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for=cep">CEP</label>
                                                            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for=logradouro">Endereço</label>
                                                            <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Endereço">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for=numero">Número</label>
                                                            <input type="text" class="form-control" id="numero" name="numero" placeholder="Número">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for=cidade">Cidade</label>
                                                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for=complemento">Bairro</label>
                                                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
                                                        </div>
                                                    </div>


                                                     <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for=complemento">Complemento</label>
                                                            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for=estado">Estado</label>
                                                            <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="evento">Pais</label>
                                                                <select class="form-control" name="pais" id="pais">
                                                                        <option value="">Selecione</option>
                                                                    <?php foreach ($pais as $pa) { ?>
                                                                        <option value="<?php echo $pa->paisNome ?>"  <?php echo ( $pa->paisNome  == 'BRASIL' ) ? "selected" : ""; ?>    ><?php echo $pa->paisNome ?></option>
                                                                   <?php } ?>
                                                                    
                                                                </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for=telefone">Telefone</label>
                                                            <input type="number" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
                                                        </div>
                                                    </div>


                                                     <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for=data_nascimento">Data Nascimento</label>
                                                            <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="__/__/____">
                                                        </div>
                                                    </div>


                                                         <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for=foto">Foto</label>
                                                            <input type="file" class="form-control" id="foto" name="foto" ">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="descricao">Observação</label>
                                                                <div class='box-header'>
                                                                    <div class="pull-right box-tools"></div>
                                                                </div>
                                                                <div class='box-body'>
                                                                        <textarea class="textarea editor-cls" name="observacao" placeholder="Observação"></textarea>
                                                                </div>
                                                            </div>
                                                        
                                                        </div>




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

<script>

function validaUsuario(cnpj){

$.ajax({
            type: "POST",
            url: "verificaUser",
            data: {
                cnpj: cnpj
                },
            dataType: "json",
            beforeSend: function() {
                Swal.fire({
                    title: "Verificando",
                    text: "Pesquisando CPF ou CNPJ",
                    
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    // closeOnConfirm: false,
                    // closeOnCancel: false,
                    // confirmButtonText: "Tudo Certo",
                    // cancelButtonText: "Cancelar",
                });
            },
            success: function(data) {
               
                if (data[0]['total'] > 0) {
                    Swal.fire({
                        title: "Antenção",
                        text: "CPF / CNPJ já cadastrado",
                    
                        allowOutsideClick: true,
                        showConfirmButton: true,
                        showCancelButton: false,
                        // closeOnConfirm: true,
                        // closeOnCancel: false,
                        confirmButtonText: "OK",
                        cancelButtonText: "Cancelar",
                    });
                    $("#cpfcnpj").val('');
               
                } else{
                    Swal.close();
                }
            },
            error: function(xhr, desc, err) {}
        });

}



   </script> 
