<?php
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
$conn = $banco->conectar();

// dependendo do valor que vier em registro, nós inserimos em uma tabela diferente
// 1 = ingrediente
// 2 = item
// 3 = cardapio

switch ($dados['registro']) {
        case 2:
                $query = $conn->prepare('DELETE FROM refeicao WHERE refeicao_id = :id;');        
                $query->execute([
                    ':id' => $dados['refeicao_id'],
                ]);
                header('location: cdm.php');
                break;
        
    }
?>