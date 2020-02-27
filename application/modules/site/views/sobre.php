<?php
// print_r($atividades);

foreach ($atividades as $atv) { ?>
<a href=<?php echo base_url("/lista/".$atv->id) ?>  > <?php echo $atv->evento;?> </a><br>
   <!-- echo $atv->evento."<br>";
    echo $atv->descricaoEvento."<br>"; -->
<?php } ?>