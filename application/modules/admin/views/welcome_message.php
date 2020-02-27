<!DOCTYPE html>
<html>

<head>
    <title>::Admin Login::</title>
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
                                               name="username" id="email" value=""/>
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
                            <input type="submit" value="Login" class="btn btn-primary login-btn"/>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
					
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


</html>
