
    <script src="<?php echo base_url('assets/site/src/jquery.3.4.1.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/site/src/utl.js') ?>"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/site/src/bootbox.all.5.2.0.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/site/src/app.js') ?>"></script>
    <script src="<?php echo base_url('assets/site/src/programacao.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	
    <script>  
        $(document).ready(function(){  
            var jsonDataSession = eval('(<?php echo json_encode($_SESSION) ?>)');
            //var isLoggedIn = ("logado" in jsonDataSession); // para saber se esta loga -> BOOLEAN
            var jsonDataEvento = JSON.parse('<?php echo(json_encode($evento)) ?>');
            var jsonDataAtividades = JSON.parse('<?php echo(json_encode($atividades)) ?>');
            var jsonDataOrganizador = JSON.parse('<?php echo(json_encode($organizador)) ?>');

            // Se evento CANCELADO, redirecionar para eventos
            if(jsonDataEvento.status_id == "5"){
                //console.log("evento cancelado, redirecionando...");
                window.location.href = BaseUrl() + "/site/eventos";
            }

            // Link google maps https://maps.google.com/?q=...
            var linkGoogleMaps = SubstituirEspacoHtml('https://maps.google.com/?q=' + jsonDataOrganizador.nome + ' ' + jsonDataOrganizador.endereco); 
            //console.log(linkGoogleMaps);
            
            // Setar titulo e descricao pagina
            var descricaoEvento=`
                <b>Data:</b> ` + formatDate(jsonDataEvento.datahora_inicio) + ` - ` + formatDate(jsonDataEvento.datahora_fim) + `<br>
                <b>Local:</b> ` +  jsonDataOrganizador.endereco + `<br><a href="` + linkGoogleMaps + `" target="_blank">Como chegar?</a><br><br>
                ` + jsonDataEvento.descricao + ` 
            `;
            SetPageDescription(jsonDataEvento.nome, descricaoEvento);
            // Esconder mensagens
            HideMessages();
            // Exibir dados
            ShowAtividades(jsonDataEvento, jsonDataAtividades, jsonDataSession);               
        });     
        
        $(document).ready(function(){
            $(document).on('click', '#btn-vermais', function(){ 
                var jsonDataAtividades = JSON.parse('<?php echo(json_encode($atividades)) ?>');
                var atividade_id = $(this).attr('data-id');
                ShowModal_VerMaisAtividade(atividade_id, jsonDataAtividades);
            });
        });

        $(document).ready(function(){
            $(document).on('click', '#btn-cancelar', function(){ 
                var jsonDataAtividades = JSON.parse('<?php echo(json_encode($atividades)) ?>');
                var atividade_id = $(this).attr('data-id');
                ShowModal_CancelarAtividade(atividade_id, jsonDataAtividades);
            });
        });

        $(document).ready(function(){
            $(document).on('click', '#btn-inscrever', function(){ 
                var jsonDataAtividades = JSON.parse('<?php echo(json_encode($atividades)) ?>');
                var jsonDataEvento = JSON.parse('<?php echo(json_encode($evento)) ?>');
                var atividade_id = $(this).attr('data-id');
                ShowModal_InscreverAtividade(atividade_id, jsonDataEvento, jsonDataAtividades);
            });
        });

    </script>
