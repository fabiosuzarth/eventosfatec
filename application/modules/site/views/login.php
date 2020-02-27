
<div class="container">
	<div class="row">
        <div id="register-form" class="col-lg-12">
            <div class="row">
            	<button title="Close (Esc)" type="button" class="mfp-close">×</button>
                
                <div class="col-lg-12">
                	<h2 class="uppercase">Acessar</h2>
                </div>
            
                <div class="register-form col-lg-12">
                 
                        <form>
                              <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nome">E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Ex: usuario@email.com ">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nome">Senha</label>
                                            <input type="password" class="form-control" id="senha"  name="senha" >
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                    <button type="button" id="acessar" class="btn green uppercase col-md-12">Login</button>
                                    </div>


                                </div>   
                              
                            </form>


                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #register-form {
    padding: 25px;
    background: #ffffff;
    border: 10px red solid !important;
}
</style>


<script src="<?php echo base_url('evento/js/jquery-1.11.1.min.js') ?>"></script>
      


<script>
    jQuery(document).ready(function() {
     
        $(document).on('click', '#acessar', function() {

      //  $("#acessar").on('click', function () {
            console.log('ace');

           
  
            var formData = { 'usuario': $('#email').val(), 'senha': $('#senha').val() };
            $.ajax({
                url: '<?php echo base_url(); ?>usuario/logar',
                data: formData,
                type: 'post',
                dataType: "json",
                beforeSend: function() {
  
                },
                success: function (data) {
                    if(data.status == "erro"){
                      
                    }
                    if(data.status == "sucesso"){
                   
                        });
                        window.location.href = "<?php echo base_url('/site/eventos'); ?>";

                    }
                }, error: function () {
                  
                }
            });
        });

    });

</script>


