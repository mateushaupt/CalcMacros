<?php
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
$conn = $banco->conectar();

// dependendo do valor que vier em registro, nós inserimos em uma tabela diferente
// 1 = ingrediente
// 2 = item
// 3 = cardapi


switch ($dados['registro']) {
    case 1:
        $query = $conn->prepare(' UPDATE usuario SET altura = :altura, objetivo = :objetivo, atvfisica = :atvfisica   WHERE usuario_id = :id ;');        
        $query->execute([
            ':id' => $dados['usuario_id'],
            ':altura' => $dados['altura'],
            ':objetivo' => $dados['objetivo'],
            ':atvfisica' => $dados['atvfisica']
        ]);
        header('location:..\cdm.php');
        break;
        
            
    }
?>