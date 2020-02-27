/* ----------------------------------------------------------------------- */
function ShowEventos()
{	
	// utilizar card-deck ou card-columns. Atentar que card-deck nao limita cards no container. card-columns limita a 3 cards
	var html=`<div class="card-columns">`;
	var error_message=""; 
	$.when(
		/* --------- SOLICITA EVENTOS --------- */
		$.ajax({
			url: BaseUrl() + "/eventoatividade",
			type : "POST",
			dataType: 'json',
			success : function(data) { 
				//console.log(typeof(data));
				console.log(data);				              
				$.each(data.eventos, function(key, val) { 
					var valor, status;
					if(val.status_id == "1") status='<span class="badge badge-info">Se prepare!</span>';
					else if (val.status_id == "2") status='<span class="badge badge-secondary">Encerrado</span>';
					else if (val.status_id == "3") status='<span class="badge badge-success">Inscrições Abertas</span>';
					else if (val.status_id == "4") status='<span class="badge badge-secondary">Inscrições Encerradas</span>';
					else if (val.status_id == "5") return;

					valor='';
					if(val.valor == "0"){
						if (val.status_id == "1" || val.status_id == "3"){
							valor='<span class="badge badge-warning">Gratuito</span>';
						}
					}
					
					html +=`				
					<div class="card">
			  			<div class="card-body">
							<h5 class="card-title">` + val.nome + `</h5>
							<h6 class="card-subtitle mb-2 text-muted">` + formatDate(val.datahora_inicio) + `</h6>
							<p class="card-text">` + LimitarCaracteres(val.descricao, 250) + `</p>
							<!--<a href="#" class="card-link">Card link</a>-->`
							+ status + ` ` + valor +  							
							`<a href="` + BaseUrl() + "/site/programacao/" + val.id + `" class="stretched-link"></a>
						  </div>
					</div>`;
				})
                html +=`</div>`;
                AlertMessage('success','teste');
                HideMessages();
			},
			error: function(xhr, resp, text) {
				console.log("Erro ao carregar atividades/lista", xhr, resp, text);
				error_message="Ops, erro ao carregar eventos";
			}
		})
	).then(function (){
		// ok, tds ajax recebidos
		//AlertMessage("success", "recebido json");
		$("#page-content").html(html);
    	$("#page-content").show();
	}).fail(function () {
		// falhou
		$("#page-content").hide();
		AlertMessage("error", error_message);
	});
}
/* ----------------------------------------------------------------------- */
