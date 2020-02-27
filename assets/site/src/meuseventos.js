/* --------------------------------------------------------------------*/
function ShowMeusEventos(jsonDataAtividadesUsuario, jsonDataSession)
{
    console.log(jsonDataAtividadesUsuario);
	//console.log(jsonDataSession);
    var html="";
    var eventoAtual="";
    var btn_cancelar="";
    var certificado="";

    // Se nao houver atividades a serem listadas
    if(Object.keys(jsonDataAtividadesUsuario).length < 1){
        $("#page-content").hide();
        AlertMessage("warning", "Desculpe, você não participou de nenhum evento!");
        return;
    }

    eventoAtual=jsonDataAtividadesUsuario[0].evento_id;

    //console.log('primeiro evento_id='+eventoAtual);
    html+=`<h3>` + jsonDataAtividadesUsuario[0].evento_nome + `</h3><hr>`;

    $.each(jsonDataAtividadesUsuario, function(key, val) 
    {    
        if(val.evento_id != eventoAtual){
            eventoAtual=val.evento_id;
            html+=`<h3>` + val.evento_nome + `</h3><hr>`;
        }        

        // Se status inscricao for INSCRITO, deixar cancelar inscricao atividade
        if(val.status_id == 1){
            btn_cancelar=`
                <button class='btn btn-outline-danger btn-sm' id="btn-cancelarinscricao" data-id='` + val.atividade_id + `'>
                    Cancelar Inscrição
                </button>`; 

            //btn_cancelar=`<a href="` + BaseUrl() + `/inscricao/cancelarinscricao/` + val.atividade_id + `">Cancelar Inscrição</a>`;
        }
        else{
            btn_cancelar="";
        }

        // Se status inscricao for COMPARECEU
        if(val.status_id == 2){
            certificado=`<a href="` + BaseUrl() + `/inscricao/validarcertificado/` + val.sign_cert + `">Visualizar Certificado</a>`;
        }
        else{
            certificado="";
        }

        html +=`
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">` + val.atividade_nome + `</h5>
                    <h6 class="card-subtitle mb-2 text-muted">` + val.status_nome + `</h6>`
                    + certificado + btn_cancelar +                    
                `</div>
            </div>
            <br>`;
    });
    
    html+=` 
            </tbody>
        </table>
    </div>`;

    $("#page-content").html(html);
    $("#page-content").show();
}
/* --------------------------------------------------------------------*/
/* --------------------------------------------------------------------*/
function ShowModal_CancelarAtividade(atividade_id, jsonDataAtividades)
{
    console.log('ShowModal_CancelarAtividade(), atividade_id=' + atividade_id , jsonDataAtividades);
    $.each(jsonDataAtividades, function(key, val) 
    {

        console.log(val.atividade_id, atividade_id);
        if(val.atividade_id == atividade_id)
        {
            var html =`
                <p>Deseja cancelar inscrição em <b>` + val.atividade_nome + `</b> ?</p>
            `;

            var dialog = bootbox.dialog({
                backdrop: true, // clicar fora da tela do modal
                onEscape: true, // pressionar ESC
                title: "Cancelar Inscrição",
                message: html,
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
                        label: "OK",
                        className: 'btn-info',
                        callback: function(){
                            // botao OK clicado
                            bootbox.hideAll(); 
                            $.ajax({
                                url: BaseUrl() + "/inscricao/cancelarinscricao/" + atividade_id,
                                type : "POST",
                                dataType: 'json',
                                beforeSend: function() {
                                    Swal.fire({ title: "Solicitando cancelamento inscrição", type: "warning", timer: 50000,  showConfirmButton: false });
                                },
                                success : function(data) { 
                                    //console.log(typeof(data));
                                    console.log(data);

                                    if(data.result == false){
                                        Swal.fire({   title: "Opz...",   text: ""+ data.message +"", type: "error",
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
                                    console.log("Erro ao carregar cancelarinscricao", xhr, resp, text);
                                    error_message="Ops, erro ao cancelar inscrição";
                                    AlertMessage("error", error_message);
                                }
                            });
                            // /botao OK clicado                            
                        }
                    }
                }
            });
            return false; // sai do foreach caso tenha encontrado atividade
        }
    });
}