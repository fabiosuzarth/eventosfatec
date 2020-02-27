
    <script src="<?php echo base_url('assets/site/src/jquery.3.4.1.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/site/src/utl.js') ?>"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/site/src/bootbox.all.5.2.0.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/site/src/app.js') ?>"></script>
    <script src="<?php echo base_url('assets/site/src/eventos.js') ?>"></script>
	
    <script>  
        $(document).ready(function(){           
            var jsonDataSession = eval('(<?php echo json_encode($_SESSION) ?>)');
            console.log(jsonDataSession);   
            // Setar titulo e descricao pagina
            SetPageDescription("Eventos", "Saiba o que esta rolando na Fatec Araras!");
            // Esconder mensagens
            HideMessages();
            // Seta loading
            $("#page-content").html(`<div class="text-center"><img class=".text-center" id="img-loading" width="10%" src="` + BaseUrl() + "/assets/site/images/loading.gif" + `"></div>`);
            // Exibir dados
            ShowEventos();               
        });        
    </script>
	
