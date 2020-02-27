<!DOCTYPE html>
<html lang="pt">
<head>
	<title>Cadastrar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="../resources/views/images/icons/favicon.ico"/> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/fonts/iconic/css/material-design-iconic-font.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/animate/animate.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/css-hamburgers/hamburgers.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/animsition/css/animsition.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/daterangepicker/daterangepicker.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/css/util.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/css/main.css')?>">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/css/layout.css')?>">
<!--===============================================================================================-->
</head>
<!-- <?php
	// require_once('conecta.php');

	// // $query = "SELECT * FROM tipo_pessoa where id=2 or id=3";
	// // $result = mysqli_query($conn, $query);
	// // var_dump($result);


	// $end = mysqli_query ($conn, "SELECT * FROM tipo_pessoa where id=2 or id=3")
	// or die(mysqli_error($conn));
?> -->
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/images/banner.jpg');">
			<div class="wrap-login100">
				
				<form id="formPessoa" class="login100-form validate-form" >
					<span class="login100-form-logo" style="margin-top:-5%; font-size: 190% !important; width: 50px;height: 50px;">
						<i class="zmdi zmdi-account-box"></i>
					</span><br>

					<span class="login100-form-title col-md-12" style="font-size: 20px">
						Cadastrar
					</span><br>
					
					<div class="row" style="margin-top:-2%">
						<div class="col-md-6">
							<div class="wrap-input100 validate-input" data-validate = "Informe seu nome ">
								<input class="input100" type="text" name="nome" placeholder="Digite seu nome " required>
								<!-- <span class="focus-input100" data-placeholder="&#xf372;"></span> -->
							</div>
						</div>
						<div class="col-md-3">
							<div class="wrap-input100 validate-input" data-validate = "Informe seu CPF" required>
								<input class="input100" type="text" name="cpfcnpj" placeholder="Digite seu CPF">
								<!-- <span class="focus-input100" data-placeholder="&#xf0f1;"></span> -->
							</div>
						</div>
						<div class="col-md-3">	
							<div class="wrap-input100 validate-input" data-validate = "Informe sua data de nascimento" required>
								<input class="input100" type="text" id="data_nascimento" name="data_nascimento" placeholder="Data de nascimento">
								<!-- <span class="focus-input100" data-placeholder="&#xf207;"></span> -->
							</div>
						</div>
					</div>
					<div class="row">
					<div class="col-md-3">
							<div class="wrap-input100 validate-input" data-validate = "Informe seu CEP" required>
								<input class="input100" type="text" name="cep" id="cep" placeholder="CEP">
								<!-- <span class="focus-input100" data-placeholder="&#xf0f1;"></span> -->
							</div>
						</div>
						<div class="col-md-3">
							<div class="wrap-input100 validate-input" data-validate = "Informe o numero da Residência" required>
								<input class="input100" type="text" name="numero" id="numero" placeholder="Numero residêncial">
								<!-- <span class="focus-input100" data-placeholder="&#xf0f1;"></span> -->
							</div>
						</div>
						<div class="col-md-6">
							<div class="wrap-input100 validate-input" data-validate = "Informe sua rua" required>
								<input class="input100" type="text" name="logradouro" id="logradouro" placeholder="Digite sua rua">
								<!-- <span class="focus-input100" data-placeholder="&#xf0f1;"></span> -->
							</div>
						</div>
						
					</div>
					<div class="row">
						
						<div class="col-md-6">
							<div class="wrap-input100 validate-input" data-validate = "Informe seu bairro" required>
								<input class="input100" type="text" name="bairro" id="bairro" placeholder="Digite seu bairro">
								<!-- <span class="focus-input100" data-placeholder="&#xf0f1;"></span> -->
							</div>
						</div>
						<div class="col-md-3">
							<div class="wrap-input100 validate-input" data-validate = "Informe seu Estado" required>
								<input class="input100" type="text" name="estado" id="estado" placeholder="Digite seu Estado">
								<!-- <span class="focus-input100" data-placeholder="&#xf0f1;"></span> -->
							</div>
						</div>
						<div class="col-md-3">
							<div class="wrap-input100 validate-input" data-validate = "Informe sua Cidade" required>
								<input class="input100" type="text" name="cidade" id="cidade" placeholder="Digite sua Cidade">
								<!-- <span class="focus-input100" data-placeholder="&#xf0f1;"></span> -->
							</div>
						</div>
					</div>
					<div class="row">
						
						<div class="col-md-12">
							<div class="wrap-input100" data-validate = "Complemento">
								<input class="input100" type="text" name="complemento" id="complemento" placeholder="Complemento">
								<!-- <span class="focus-input100" data-placeholder="&#xf0f1;"></span> -->
							</div>
						</div>
						
					</div>
					<div class="row">
						
						<div class="col-md-6">
							<div class="wrap-input100 validate-input" data-validate = "Informe seu Telefone" required>
								<input class="input100" type="text" name="telefone" placeholder="Digite seu Telefone">
								<!-- <span class="focus-input100" data-placeholder="&#xf0f1;"></span> -->
							</div>
						</div>
						<div class="col-md-6">
							<div class="wrap-input100 validate-input" data-validate = "Informe seu E-mail" required>
								<input class="input100" type="text" name="email" placeholder="Digite seu Email">
								<!-- <span class="focus-input100" data-placeholder="&#xf0f1;"></span> -->
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-md-6">	
							<div class="wrap-input100 validate-input " data-validate="Informe uma senha " required>
								<input class="input100 senha1" type="password" name="senha"  placeholder="Digite uma senha de sua escolha">
								<!-- <span class="focus-input100" data-placeholder="&#xf191;"></span> -->
							</div>
						</div>
						<div class="col-md-6">	
							<div class="wrap-input100 validate-input " data-validate="Informe uma senha " required>
								<input class="input100 senha2" type="password" name="senha" placeholder="Confirme sua senha">
								<!-- <span class="focus-input100" data-placeholder="&#xf191;"></span> -->
							</div>
						</div>
					</div>
					<div class="wrap-input100" data-validate = "Observação">
						<input class="input100" type="text"  name="observacao" placeholder="Observação">
						<!-- <span class="focus-input100" data-placeholder="&#xf207;"></span> -->
					</div>

					<div class="row">
						<div class="col-md-6">	
							<label  style="font-family: Poppins-Regular;font-size: 16px;color: #fff;"> Tipo de Cadastro</label>
							<select class="form-control"  name="tipo_id" required>
								<?php  foreach($tipoPessoa as $pess){?>
								<option value="<?php  echo $pess->id; ?>"><?php  echo $pess->nome; ?><option>
								<?php }?>
							</select>
						</div>
						<div class="col-md-6">	
							<label style="font-family: Poppins-Regular;font-size: 16px;color: #fff;"> Escolaridade</label>
							<select class="form-control"  name="escolaridade_id" required>
								<?php  foreach($escolaridade as $esc){?>
								<option value="<?php  echo $esc->id; ?>"><?php  echo $esc->nome; ?><option>
								<?php }?>
							</select>
						</div>
					</div>
					
						<br>

					<div class="container-login100-form-btn">			
						<input type="submit" value="Salvar Registro" class="login100-form-btn" style="background:white; color:#212529;">
                    </div>

				
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/animsition/js/animsition.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/bootstrap/js/popper.js')?>"></script>
	<script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/daterangepicker/moment.min.js')?>"></script>
	<script src="<?php echo base_url('vendor/daterangepicker/daterangepicker.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/countdowntime/countdowntime.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/js/main.js')?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

	<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	<script src="<?php echo base_url('assets/js/sweetalert.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/ui-sweetalert.js'); ?>" type="text/javascript"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
	<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	 -->
	<SCRIPT language="javascript">
		
     $(document).ready(function() {
        $('#data_nascimento').mask('99/99/9999');

		$(".senha2").on('change', function(){
							var senha1 = $(".senha1").val();
							var senha2 = $(".senha2").val();
							console.log(senha1);

							if(senha1 != senha2){
								$(".senha1").val("");
								$(".senha2").val("");
								swal({
                                            title: "Opa!",
                                            text: "Senhas são divergentes, altere para proseguir...",
											allowOutsideClick: false,
                                            showConfirmButton: false,
                                            showCancelButton: false,
                                            closeOnConfirm: true,
                                            closeOnCancel: false,
                                            confirmButtonText: "OK",
                                            cancelButtonText: "Cancelar",
                                    })
							}
		});



		// $('#confirmasenha').on('change', function(){
							

		// 				})

      
    });


                    $(document).ready(function() {

						
                        //--------------------| SALVA REGISTRO |--------------------
						$('#formPessoa').on('submit', function(e) {                           
                        	e.preventDefault();
							var senha1 = $(".senha1").val();
							var senha2 = $(".senha2").val();
							if(senha1 != senha2){
								swal({
                                            title: "Opa!",
                                            text: "Senhas são divergentes, altere para proseguir...",
                                            type: "info",
                                            allowOutsideClick: false,
                                            showConfirmButton: false,
                                            showCancelButton: false,
                                            closeOnConfirm: true,
                                            closeOnCancel: false,
                                            confirmButtonText: "OK",
                                            cancelButtonText: "Cancelar",
                                    })
							}else{

								//alert("oiii");
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('cadpessoa/cadastrar'); ?>",
                                    data: $(this).serialize(),
                                    dataType: "json",
                                    beforeSend: function() {
                                        swal({
                                            title: "Salvando Dados",
                                            text: "Aguarde o término. Não feche essa janela até o encerramento do processo",
                                            type: "info",
                                            allowOutsideClick: false,
                                            showConfirmButton: false,
                                            showCancelButton: false,
                                            closeOnConfirm: false,
                                            closeOnCancel: false,
                                            confirmButtonText: "Tudo Certo",
                                            cancelButtonText: "Cancelar",
                                        });
                                    },
                                    success: function(data) {
                                        if(data.status == "sucesso") {
                                            swal({
                                                title: "Salvo com Sucesso!",
                                                text: "Cadastro salvo com sucesso. Você será redirecionado para o login",
                                                type: "success",
                                                allowOutsideClick: false,
                                                showConfirmButton: false,
                                                showCancelButton: false,
                                                closeOnConfirm: false,
                                                closeOnCancel: false,
                                                confirmButtonText: "Tudo Certo",
                                                cancelButtonText: "Cancelar",
                                            });
                                            setTimeout(function() {
                                                window.location.href = baseUrl + "/cadpessoa"
                                            }, 2000);
                                        }else if(data.status == "erro") {
                                            swal({
                                                title: "Erro ao salvar dados!",
                                                text: data.mensagem,
                                                type: "error",
                                                allowOutsideClick: true,
                                                showConfirmButton: true,
                                                showCancelButton: false,
                                                closeOnConfirm: true,
                                                closeOnCancel: false,
                                                confirmButtonText: "OK",
                                                cancelButtonText: "Cancelar",
                                            });
                                        }
                                    },
                                    error: function(xhr, desc, err) {}
                                });
                            }
					});
                        //--------------------| FIM SALVA REGISTRO |--------------------
					});


</SCRIPT>




    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#logradouro").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#estado").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#logradouro").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#estado").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>