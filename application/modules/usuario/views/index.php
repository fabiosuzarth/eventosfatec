<!DOCTYPE html>
<html>

<head>
    <title>::Usuário Login::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <!-- Bootstrap -->
    <!-- global css -->
    <link href="<?php echo base_url('assets/css/app.css') ?>" rel="stylesheet">
    <!-- end of global css -->
    <!--page level css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/iCheck/css/all.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css') ?>">
    <link href="<?php echo base_url('assets/vendors/iCheck/css/all.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/login2.css') ?>" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <!--end page level css-->
</head>

<body class="bg-slider">
<div class="preloader">
    <div class="loader_img"><img src="<?php echo base_url('assets/img/loader.gif') ?>" alt="loading..." height="64" width="64"></div>
</div>
<div class="container">
    <div class="row " id="form-login">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 login-content">
	   
            <div class="row row-bg-color">
                <div class="col-md-8 core-login">
                    <form class="form-horizontal" method="POST" action="#" id="authentication">
                        <!-- CSRF Token -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <label class="control-label" for="email">EMAIL</label>
                                    <div class="input-group">
                                        <input type="text" placeholder="Email Address" class="form-control"
                                               name="email" id="email" value=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <label class="control-label" for="password">PASSWORD</label>
                                    <div class="input-group">
                                        <input type="password" placeholder="Password" class="form-control"
                                               name="password" id="password"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group ">
                            <input type="button" value="Login" id="acessar" class="btn btn-primary login-btn"/>
                            <br><br><a href="<?php echo base_url('site/cadastrar') ?>">Não possui cadastro? Registre-se<a>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
					<img src="assets/img/pages/logofatec.png" />
				</div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/backstretch.js')?>"></script>
<!-- end of global js -->
<!-- page level js -->
<script type="text/javascript" src="<?php echo base_url('assets/vendors/iCheck/js/icheck.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/custom_js/login.js') ?>"></script>
<!-- end of page level js -->
</body>



<script>

    /*jQuery(document).ready(function(){
        $("#btn-registrar").on('click', function () 
        { 
            window.location.href = BaseUrl() + '/site/cadastrar';
        });
    });*/

    jQuery(document).ready(function() {
        $("#acessar").on('click', function () 
        {  
            var formData = { 'usuario': $('#email').val(), 'senha': $('#password').val() };
            $.ajax({
                url: '<?php echo base_url(); ?>usuario/logar',
                data: formData,
                type: 'post',
                dataType: "json",
                beforeSend: function() {
                    Swal.fire({ title: "Aguarde, verificando usuário!", type: "warning", timer: 50000,  showConfirmButton: false });
                },
                success: function (data) {
                    if(data.status == "erro"){
                        Swal.fire({   title: "Opz...",   text: ""+ data.mensagem +"", type: "error",
                            timer: 20000,
                            showConfirmButton: true });
                    }
                    if(data.status == "sucesso"){
                        Swal.fire({   title: "Ok...",   text: "" + data.mensagem + "", type: "success",
                            timer: 800,
                            showConfirmButton: true });
                        window.location.href = '<?php echo($_SERVER['HTTP_REFERER']) ?>';
                    }
                }, 
                error: function () {
                  
                }
            });
        });

    });

</script>

<style>
.row-bg-color {
    background: #e9ebee !important;
}

img {
    border: 0;
    text-align: center;
    margin-left: 7%;
    margin-top: 11%;
}

</style>



</html>
