<div class="container">
	<div class="row">
        <div id="speaker-detail" class="col-lg-10 col-lg-offset-1">
            <div class="row">
            	<button title="Close (Esc)" type="button" class="mfp-close">×</button>
                
                <div class="col-md-5 col-lg-5 no-padding">
                    <img class="img-responsive" src="<?php echo base_url().$pessoa->img;?> " alt="" />
                </div>
                    
                <div class="col-md-7 col-lg-7">
                    <h2><?php echo $pessoa->nome;?> </h2>
                    <!-- <p class="lead">Executive Creative Director of <strong>Interdum Co.</strong></p> -->
                 
                    
                    <div id="content">
                    	<p><?php echo $pessoa->observacao;?> </p>
                   </div>
                </div>
            
            </div>
        </div>
    </div>
</div>