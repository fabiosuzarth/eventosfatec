<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login form</title>



  <link rel="stylesheet" href="<?php echo base_url('login/style.css') ?>">
</head>
<body>

<head>
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</head>
<body>

  <div class="ribbon ior"></div>
  <div class="login io">
    <div class="press">FATEC <span style= "font-family: 'Montserrat', Arial;">ARARAS</span></div>
    <img src="<?php echo base_url('/assets/img/pages/logofatec.png')?>" alt="ggIO">

   

    <div class="row row-bg-color">
                <div class="col-md-8 core-login">

    <form class="form-horizontal" method="POST" action="#" id="authentication">
                        <!-- CSRF Token -->
                        <div class="row" style="margin: 10px 10px 10px 10px">

                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <label class="control-label" for="email">EMAIL</label>
                                    <div class="input-group">
                                        <input type="text" placeholder="Email" class="form-control"
                                               name="email" id="email" value=""
                                               style= "font-family: 'Montserrat', Arial;"
                                               />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row" style="margin: 10px 10px 10px 10px">
                       
                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <label class="control-label" for="password"> <br>PASSWORD</label>
                                    <div class="input-group">
                                        <input type="password" placeholder="Password" class="form-control"
                                               name="password" id="password"
                                               style= "font-family: 'Montserrat', Arial;"
                                               />
                                    </div>
                                </div>
                            </div>
                        </div>
                 
                        <div class="row" style="margin: 10px 10px 10px 10px;">

                        <div class="form-group ">
                            <input type="button" value="ACESSAR" id="acessar" class="btn btn-primary login-btn"  style= "font-family: 'Montserrat', Arial;"/>
                        </div>
                        </div>
                    </form>


  </div>
  </div>
  </div>
 
</body>
<style>
.input-group .form-control:last-child, .input-group-addon:last-child, .input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group > .btn, .input-group-btn:last-child > .dropdown-toggle, .input-group-btn:first-child > .btn:not(:first-child), .input-group-btn:first-child > .btn-group:not(:first-child) > .btn {
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
}
.input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child > .btn, .input-group-btn:first-child > .btn-group > .btn, .input-group-btn:first-child > .dropdown-toggle, .input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle), .input-group-btn:last-child > .btn-group:not(:last-child) > .btn {
    border-bottom-right-radius: 0;
    border-top-right-radius: 0;
}
.form-group .form-control {
    background: #f5f5f5;
    width: 100%;
    border-radius: 2px !important;
    margin-top: 5px;
}
.input-group-addon, .input-group-btn, .input-group .form-control {
    display: table-cell;
}
.input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
}
.input-group-addon, .form-group, .form-control, .input-group, .input-group-lg > .input-group-addon, .input-group-sm > .input-group-addon, .input-group-lg > .form-control, .input-group-sm > .form-control, .input-group-btn, .btn, .panel, .panel-heading, .input-sm, .input-lg, .input-group-sm > .input-group-btn > .btn, .input-group-lg > .input-group-btn > .btn {
    border-radius: 0;
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}

button, html input[type="button"], input[type="reset"], input[type="submit"] {
    -webkit-appearance: button;
    cursor: pointer;
}
.login-btn {
    margin-top: 5px;
    border-radius: 2px;
}
.input-group-addon, .form-group, .form-control, .input-group, .input-group-lg > .input-group-addon, .input-group-sm > .input-group-addon, .input-group-lg > .form-control, .input-group-sm > .form-control, .input-group-btn, .btn, .panel, .panel-heading, .input-sm, .input-lg, .input-group-sm > .input-group-btn > .btn, .input-group-lg > .input-group-btn > .btn {
    border-radius: 0;
}
.btn-primary {
    color: #fff;
    background-color: #428BCA;
    border-color: #428BCA;
}
.btn {
    display: inline-block;
    margin-bottom: 0;
    font-weight: normal;
    text-align: center;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    white-space: nowrap;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
    </style>
  


  <script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js') ?>" type="text/javascript"></script>






<script>
    jQuery(document).ready(function() {
     


       
        $("#email").val('');
        $("#password").val('');


        $("#acessar").on('click', function () {
  
            var formData = { 'usuario': $('#email').val(), 'senha': $('#password').val() };
            $.ajax({
                url: '<?php echo base_url(); ?>admin/logar',
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
                            showConfirmButton: false },function() {
                          
                            
                        });
                        window.location.href = "<?php echo base_url('/home'); ?>";

                    }
                }, error: function () {
                  
                }
            });
        });

    });

</script>


</body>
</html>