
function ValidaCampo(){

    $(".senha2").on('change', function(){
        var senha1 = $(".senha1").val();
        var senha2 = $(".senha2").val();
        console.log(senha1);

        if(senha1 != senha2){
            $(".senha1").val("");
            $(".senha2").val("");
            alert("Senha são divergentes, tente novamente!");
        }
});


}
function BuscaEndereco()
{

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#logradouro").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#estado").val("");
        $("#ibge").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#logradouro").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#estado").val("...");
                $("#ibge").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#logradouro").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#estado").val(dados.uf);
                        $("#ibge").val(dados.ibge);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
}  

function SalvarUsuario()
{
    //--------------------| SALVA REGISTRO |--------------------
    $('#formPessoa').on('submit', function(e) { 



        e.preventDefault();


        var canSubmit = true;
        
          $("input, select, textarea").each(function(i) {
              console.log('a');
              var obrig = $(this).attr('data');
              var msg = $(this).attr('msg');
              if (obrig == "obrigatorio") {
                  var valor = $(this).val();
                  if (valor == "") {
                      canSubmit = false;
                      $(this).css('border-bottom', '2px solid red');
                      toastr.error('Faltam campos a serem ');

                  } else {
                      $(this).css('border-bottom', '');
                  }
              }

          });



        var senha1 = $(".senha1").val();
        var senha2 = $(".senha2").val();
        if(senha1 != senha2){
           alert('Senhas são divergentes, altere para proseguir...');
           return false;
        }


        if (canSubmit == true) {
            
            //alert("oiii");
            $.ajax({
                type: "POST",
                url: BaseUrl() + "/cadpessoa/registrapessoa",
                data: $(this).serialize(),
                dataType: "json",
                
                success: function(data) {
                    if(data.status == "sucesso") {
       
                        alert("Cadastro efetuado com sucesso");
                  
                    
                        $('#formulariocadastro').remove();
                        $('#formlogin').show();

                        $("#cpfcnpj").val('');
                        $("#nome").val('');
                        $("#data_nascimento").val('');
                        $("#email").val('');
                        $(".senha1").val('');
                        $(".senha2").val('');
                        $("#telefone").val('');
                        $("#cep").val('');

                        $("#logradouro").val("");
                        $("#bairro").val("");
                        $("#cidade").val("");
                        $("#estado").val("");
                        $("#ibge").val("");
                        $("#observacao").val("");
                        

                        location.reload();

                    }else{
                        alert("Erro ao salvar dados!");
                    }
                },
                error: function(xhr, desc, err) {}
            });
      
    }else{
       alert("Existem campos obrigatórios");
    }



    });                          
       
  
  


}

function validaUsuario()
{

    $('#cpfcnpj').on('change', function(e) {                           
        e.preventDefault();
        var cpf = $("#cpfcnpj").val();
        var cpfcnpj = cpf.replace(/[^\d]+/g,'');
        // alert(cpf);
        // return false;

        $.ajax({
                    type: "POST",
                    url: BaseUrl() + "/pessoa/verificaUser", 
                    data: {
                        cnpj: cpfcnpj
                        },
                    dataType: "json",
                
                    success: function(data) {
                    
                        if (data[0]['total'] > 0) {
                            alert("Antenção, CPF / CNPJ já cadastrado")
                            $("#cpfcnpj").val('');
                    
                        } else{
                        
                        }
                    },
                    error: function(xhr, desc, err) {}
                });
            });            
    
    }


            $('#data_nascimento').mask('99/99/9999');
            $('#cpfcnpj').mask('999.999.999-99');
            $('#cep').mask('99999-999');
            $('#telefone').mask('(99)99999-9999');

            


    
function ValidaEmail()
{
 
    $('#email').on('blur', function(e) {  
        e.preventDefault();

        var email = $("#email").val().toLowerCase();;
        if(email.length >=1 ){
        

        var emailFilter=/^.+@.+\..{2,}$/;
		var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
	
		if(!(emailFilter.test(email))||email.match(illegalChars)){

            alert("Por favor, informe um email válido.");
          
            $("#email").val('');
            return false;
            
		}


        $.ajax({
                    type: "POST",
                    url: BaseUrl() + "/cadpessoa/Verificaemail", 
                    data: {
                        email: email
                        },
                    dataType: "json",
                
                    success: function(data) {
                    
                        if (data[0]['total'] > 0) {

                            $("#email").val('');
                            alert("E-mail já cadastrado.");
                               
                            $("#email").val('');
                            $('input[name="email"]').val('');
                    
                        } else{
                        
                        }
                    },
                    error: function(xhr, desc, err) {}
                });
          
            }
        })
    
    }



    ValidaCampo();
    BuscaEndereco();
    SalvarUsuario();
    validaUsuario();
    ValidaEmail();