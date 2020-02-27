
    <script src="<?php echo base_url('assets/site/src/jquery.3.4.1.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/site/src/utl.js') ?>"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/site/src/bootbox.all.5.2.0.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/site/src/app.js') ?>"></script>
    <script src="<?php echo base_url('assets/site/src/meuseventos.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	
    <script>  

        $(document).ready(function(){  
            var jsonDataSession = eval('(<?php echo json_encode($_SESSION) ?>)');
            //var isLoggedIn = ("logado" in jsonDataSession); // para saber se esta loga -> BOOLEAN
            var jsonDataAtividadesUsuario = JSON.parse('<?php echo(json_encode($atividades)) ?>');
            console.log(jsonDataSession);
            //console.log(jsonDataAtividadesUsuario);
            
            // Titulo pagina
            SetPageDescription("Meus Eventos", "Gerencie seus eventos");
            // Esconder mensagens
            HideMessages();   
            // Exibir atividades
            ShowMeusEventos(jsonDataAtividadesUsuario, jsonDataSession);           
        });     

        $(document).ready(function(){
            $(document).on('click', '#btn-cancelarinscricao', function(){ 
                console.log('entrou');
                var jsonDataAtividadesUsuario = JSON.parse('<?php echo(json_encode($atividades)) ?>');
                var atividade_id = $(this).attr('data-id');
                ShowModal_CancelarAtividade(atividade_id, jsonDataAtividadesUsuario);
            });
        });

    </script>
