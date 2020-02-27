<?php
	@session_start();
	 
?>

<html>
	<head>
		<title>EVENTOS - FATEC ARARAS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="<?php echo base_url('assets/site/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets/site/css/style.css') ?>" rel="stylesheet" type="text/css">	
        
		<!-- NAVBAR -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">
				<!--<img src="./images/logo.png" width="30" height="30" alt="">-->
				<span id="navbar-id">EVENTOS FATEC</span>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>site/eventos">Home</a>
					</li>    
					<?php
						if(isset($_SESSION['logado']))
						{
					?>     
						<!-- PARA QUANDO PRECISAR DE DROPDOWN -->    
						<!--<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Gerenciar
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="#">Cadastro</a>
								<hr>
								<a class="dropdown-item" href="#">Atividades</a>            
								<a class="dropdown-item" href="#">Certificados</a> 
							</div>
						</li>-->
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('/site/alterarcadastro') ?>">Cadastro</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('/site/meuseventos/' . $_SESSION['logado']->id) ?>">Meus Eventos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('/usuario/sair') ?>">Logout</a>
						</li>
					<?php
						}
						else
						{
					?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('/site/cadastrar') ?>">Cadastrar</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('/usuario') ?>">Login</a>
						</li>
					<?php
						}
					?> 
				</ul>
			</div>
		</nav>
		<!-- /NAVBAR -->

	</head>  
    
    <body>  
		<!-- PAGE DESCRIPTION -->
		<div id="page-description" class="container mt-2 border rounded shadow-sm">
		</div>
		<!-- /PAGE DESCRIPTION -->

		<!-- PAGE MESSAGES -->
		<div id="page-messages" class="container mt-2 border rounded shadow-sm">     
		</div>
		<!-- /PAGE MESSAGES -->
		
		<!-- PAGE CONTENT -->
		<div id="page-content" class="container mt-2 border rounded shadow-sm">
		</div>
		<!-- /PAGE CONTENT -->
	</body>

	<?php echo $contents; ?>

</html>