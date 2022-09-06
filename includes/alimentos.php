<?php
include_once(__DIR__ . '.\conecta.php');


$banco = new Banco;
$conn = $banco->conectar();

// Para cada ingrediente no banco, mostra uma checkbox com esses valores
foreach ($conn->query(" SELECT alimento_id, nome FROM alimento" , PDO::FETCH_ASSOC) as $alimento){
        echo ('<div class="form-check col-8 pesquisavel" >');
        echo !$aux ? '<input class="form-check-input " type="checkbox" id="'. $alimento['alimento_id'] .'" value="' . $alimento['alimento_id'] . '" name=alimentos[]>  <label class="form-check-label" for="' . $alimento['alimento_id'] . '">' . $alimento['nome'] : $alimento['nome'] . '</label>' ;
        echo ('</div>');
        echo ('<div class="col-8" >');
        echo !$aux ? '<input class="form-control ' . $alimento['nome'] . '" style="display: none;" type="number" placeholder="Quantidade" id="' . $alimento['alimento_id'] . '" name="porcoes[quantidade][]"> ':'' ;
        echo ('</div>');
    }


?>

<script>
$(function () {
    var alimentos = <?php echo json_encode( $alimento ); ?>;
for ( var key in alimentos ) {
    var alimentos = alimentos[key];
    // your code from above modified to use the Javascript variable created
    const cb = document.getElementById(alimentos['alimento_id']);
    if(cb.checked == true){
        document.getElementsByClassName(alimentos['nome']).style.display = "block"
    }else{
        document.getElementsByClassName(alimentos['nome']).style.display = "none"
    }
}
})
</script>