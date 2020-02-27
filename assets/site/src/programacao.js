function ShowAtividades(jsonDataEvento, jsonDataAtividades, jsonDataSession)
{
    //console.log(jsonDataEvento);
    console.log(jsonDataAtividades);
	//console.log(jsonDataSession);
    var html="";
    var isLoggedIn = ("logado" in jsonDataSession);

    // Se nao houver atividades a serem listadas
    if(Object.keys(jsonDataAtividades).length < 1){
        $("#page-content").hide();
        AlertMessage("warning", "Desculpe, não há atividades cadastradas!");
        return;
    }

    $.each(jsonDataAtividades, function(key, val) 
    {        
        var palestrante='', inscricao='', status='', foto_palestrante='';
        
         // Se evento NAO estiver com inscricoes abertas
         if(jsonDataEvento.status_id != "3"){
            //console.log('Evento nao tem inscricao aberta');
            inscricao='';
            status='';
        }
        else{
            // Se tiver pelo menos 1 vaga e atividade esteja com status_id=1 inscricoes abertas
            if(val.vagasRestantes > 0 && val.status_id == "1"){       
                inscricao=`<button type="button" class="btn btn-primary btn-sm" id="btn-inscrever" data-id="` + val.id + `">Inscrever</button>`;     
                status=`<span class="badge badge-success card-top-corner">Há vagas</span>`;
            }
            // atividade esteja com status_id=2 inscricoes encerradas
            else if(val.status_id == "2"){
                inscricao='';   
                status=`<span class="badge badge-secondary card-top-corner">Inscrições Encerradas</span>`;
            }
            // atividade esteja com status_id=3 vagas esgotadas ou vagas < 0
            else if(val.vagasRestantes <= 0 || val.status_id == "3"){
                inscricao='';   
                status=`<span class="badge badge-danger card-top-corner">Esgotado</span>`;
            }
            // atividade esteja com status_id=4 atividade cancelada
            else if(val.status_id == "4"){
                inscricao='';   
                status=`<span class="badge badge-dark card-top-corner">Cancelado</span>`;
            }

             // Se estiver logado, deixar cancelar qualquer atividade que usuario ja tenha se inscrito
            if(isLoggedIn)
            {
                //console.log('Usuario logado');
                if(PossuiInscricaoAtividade(jsonDataSession.atividades, val.id)){
                    console.log('Usuario ja esta inscrito em ' + val.nome);
                    inscricao=`<button type="button" class="btn btn-danger btn-sm" id="btn-cancelar" data-id="` + val.id + `">Cancelar Inscrição</button>`;
                }
            }
            else{
                inscricao=`<button type="button" class="btn btn-primary btn-sm" id="btn-inscrever-login" data-id="` + val.id + `" onclick="location.href = '` + BaseUrl() + `/usuario';" >Inscrever</button>`;
            }

        }

        if(val.palestrante!=null) palestrante=`<p class="card-text">Palestrante: ` + val.palestrante + `</p>`; 
        if(val.palestrante_img!=null || val.palestrante_img!=""){
            foto_palestrante = `<img 
                                    style="border-radius: 5%" 
                                    src="` + BaseUrl() +  val.palestrante_img + `" 
                                    width="100%"
                                    onError="this.src='` + GenerateURL_TinyGraphs() + `'"
                                    >`;
        }

        //Utilizar para caso linkar quando clicar card -> <a href="#" class="stretched-link"></a>

		html +=`				
        <div class="card mb-3">`
            + status +
			`<h5 class="card-header">` + val.titulo + `</h5>
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-sm-2">`
                            + foto_palestrante +
                        `</div>
                        <div class="col-sm-10">
                            <p class="card-text">` + val.descricao + `</p>			
                            <p class="card-text">Data: ` + formatDate(val.datahora_inicio) + `</p>`
                            + palestrante +              
                        `</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm">`
                            + inscricao +
                            ` <button type="button" class="btn btn-info btn-sm" id="btn-vermais" data-id="` + val.id + `">Ver mais</button>
                        </div>
                    </div>
                </div>
			</div>
        </div>
        <br>`;
	});

    //<a href="#" class="stretched-link"></a>
    $("#page-content").html(html);
    $("#page-content").show();
}
/* --------------------------------------------------------------------*/
function ShowModal_VerMaisAtividade(atividade_id, jsonDataAtividades)
{
    //console.log('ShowModal_VerMaisAtividade(), atividade_id=' + atividade_id);
    $.each(jsonDataAtividades, function(key, val) 
    {
        var palestrante='';

        if(val.id == atividade_id)
        {
            if(val.palestrante!=null) palestrante=`<p>Palestrante: ` + val.palestrante + `</p>`;

            var html =`
                <p>Data: ` + formatDate(val.datahora_inicio) + `</p>`
                + palestrante +
                `<p>Mini curriculo...</p>
            `;

            var dialog = bootbox.dialog({
                backdrop: true, // clicar fora da tela do modal
                onEscape: true, // pressionar ESC
                title: val.nome,
                message: html,
                size: 'large',
                buttons: {
                    ok: {
                        label: "OK",
                        className: 'btn-info',
                        callback: function(){
                            // clicou OK
                        }
                    }
                }
            });
        }
    });
}
/* --------------------------------------------------------------------*/
function ShowModal_CancelarAtividade(atividade_id, atividade_nome, atividade_datahora_inicio, atividade_datahora_fim, evento_id)
{
    console.log('ShowModal_CancelarAtividade entrou evento_id=' + evento_id + ' atividade_id=' + atividade_id, atividade_nome, atividade_datahora_inicio, atividade_datahora_fim);

    if(atividade_id == "" || atividade_nome == "" || atividade_datahora_inicio == "" || atividade_datahora_fim == "" || evento_id == "" ||
       atividade_id == null || atividade_nome == null || atividade_datahora_inicio == null || atividade_datahora_fim == null || evento_id == null ){
        console.log('ShowModal_CancelarAtividade() falhou ao receber parametros')
        return false;
    }

    var html =`
        <p>Deseja cancelar inscrição em <b>` + atividade_nome + `</b>?</p>
    `;

    var dialog = bootbox.dialog({
        backdrop: true, // clicar fora da tela do modal
        onEscape: true, // pressionar ESC
        title: "Cancelar Inscrição",
        message: html,
        size: 'small',
        buttons: {
            cancel: {
                label: "Agora não",
                className: 'btn-danger',
                callback: function(){
                    // botao cancelar clicado
                }
            },
            ok: {
                label: "OK, cancele",
                className: 'btn-info',
                callback: function(){
                    // botao OK clicado
                    bootbox.hideAll(); 
                    $.ajax({
                        url: BaseUrl() + "/inscricao/cancelarinscricao/" + atividade_id,
                        type : "POST",
                        dataType: 'json',
                        beforeSend: function() {
                            Swal.fire({ title: "Solicitando cancelamento inscrição", type: "warning", timer: 100000,  showConfirmButton: false });
                        },
                        success : function(data) { 
                            var strBugLogado='';
                            if(data.message.includes("logado") == true){
                                var pathImg = BaseUrl() + '/evento/img/error_meme.jpg';
                                var tagImg = '<img src="' + pathImg + '"/>'

                                strBugLogado="Se estiver logado, faça logout e entre novamente.<br><br>"+tagImg+"<br><br>Nosso time está trabalhando neste bug!<br>";
                            }

                            if(data.result == false){
                                Swal.fire({   title: "Opz...",   html: "<b><h2>"+ data.message +"</h2></b><br><br>" + strBugLogado, type: "error",
                                    timer: 20000,
                                    showConfirmButton: true });
                            }
                            else if(data.result == true){
                                Swal.fire({   title: "Tudo certo!",   text: "" + data.message + "", type: "success",
                                    timer: 10000,
                                    showConfirmButton: true },function() {                                 
                                });
                                location.reload();
                            }				              
                        },
                        error: function(xhr, resp, text) {
                            Swal.fire({   title: "Opz...",   text: "Não conseguimos concluir sua requisição. Por gentileza, verifique sua conexão.", type: "error",
                                            timer: 20000,
                                            showConfirmButton: true });
                            console.log("Erro ao carregar cancelarinscricao", xhr, resp, text);
                            error_message="Ops, erro ao cancelar inscrição";
                            AlertMessage("error", error_message);
                        }
                    });
                    // /botao OK clicado 
                    return false;
                }
            }
        }
    });
}
/* --------------------------------------------------------------------*/
function ShowModal_InscreverAtividade(atividade_id, atividade_nome, atividade_datahora_inicio, atividade_datahora_fim, evento_id)
{
    console.log('ShowModal_InscreverAtividade entrou evento_id=' + evento_id + ' atividade_id=' + atividade_id, atividade_nome, atividade_datahora_inicio, atividade_datahora_fim);

    if(atividade_id == "" || atividade_nome == "" || atividade_datahora_inicio == "" || atividade_datahora_fim == "" || evento_id == "" ||
       atividade_id == null || atividade_nome == null || atividade_datahora_inicio == null || atividade_datahora_fim == null || evento_id == null ){
        console.log('ShowModal_InscreverAtividade() falhou ao receber parametros')
        return false;
    }

    var dialog = bootbox.dialog({
        backdrop: true, // clicar fora da tela do modal
        onEscape: true, // pressionar ESC
        title: 'Inscrição',
        message: `<p>Deseja se inscrever em <b>` + atividade_nome + `</b> que vai ocorrer em ` + formatDate(atividade_datahora_inicio) + ` ?</p>`,
        size: 'small',
        buttons: {
            cancel: {
                label: "Cancelar",
                className: 'btn-danger',
                callback: function(){
                    // botao cancelar clicado
                }
            },
            ok: {
                label: "Inscrever",
                className: 'btn-info',
                callback: function(){
                    // botao OK clicado
                    bootbox.hideAll(); 
                    $.ajax({
                        url: BaseUrl() + "/inscricao/inscreveratividade/" + evento_id + "/" + atividade_id,
                        type : "POST",
                        dataType: 'json',
                        beforeSend: function() {
                            Swal.fire({ title: "Solicitando inscrição", type: "warning", timer: 100000,  showConfirmButton: false });
                        },
                        success : function(data) { 
                            //console.log(typeof(data));
                            console.log(data);

                            var strBugLogado='';
                            if(data.message.includes("login") == true){
                                var pathImg = BaseUrl() + '/evento/img/error_meme.jpg';
                                var tagImg = '<img src="' + pathImg + '"/>'

                                strBugLogado="Se estiver logado, faça logout e entre novamente.<br><br>"+tagImg+"<br><br>Nosso time está trabalhando neste bug!<br>";
                            }

                            if(data.result == false){
                                Swal.fire({title: "Opz...",   html: "<b><h2>"+ data.message +"</h2></b><br><br>" + strBugLogado, type: "error",
                                    timer: 20000,
                                    showConfirmButton: true });
                            }
                            else if(data.result == true){
                                Swal.fire({   title: "Tudo certo!",   text: "" + data.message + "", type: "success",
                                    timer: 10000,
                                    showConfirmButton: true },function() {                                 
                                });
                                location.reload();
                            }				              
                        },
                        error: function(xhr, resp, text) {
                            Swal.fire({   title: "Opz...",   text: "Não conseguimos concluir sua requisição. Por gentileza, verifique sua conexão.", type: "error",
                                            timer: 20000,
                                            showConfirmButton: true });
                            console.log("Erro ao carregar atividades/lista", xhr, resp, text);
                            error_message="Ops, erro ao carregar eventos";
                            //AlertMessage("error", error_message);
                        }
                    });
                    // /botao OK clicado
                }
            }
        }
    });
}