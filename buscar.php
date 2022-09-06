<?php
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
$conn = $banco->conectar();
$usuario = $_SESSION['usuario_id'];

switch ($pesquisa) {

    case 1: 
        
        $query = $conn->prepare('SELECT refeicao.refeicao_id, alimento.alimento_id, usuario.usuario_id, refeicao.nome as nome_da_refeicao, GROUP_CONCAT(alimento.nome SEPARATOR ", ") 
        as alimentos, 
        SUM(CASE WHEN alimento_refeicao.refeicao_id = alimento_refeicao.refeicao_id THEN caloria ELSE 0 END) as soma_das_calorias,
        SUM(CASE WHEN alimento_refeicao.refeicao_id = alimento_refeicao.refeicao_id THEN proteina ELSE 0 END) as soma_das_proteinas,
        SUM(CASE WHEN alimento_refeicao.refeicao_id = alimento_refeicao.refeicao_id THEN carboidrato ELSE 0 END) as soma_dos_carboidratos,
        SUM(CASE WHEN alimento_refeicao.refeicao_id = alimento_refeicao.refeicao_id THEN gordura ELSE 0 END) as soma_das_gorduras
        from alimento_refeicao INNER JOIN refeicao on alimento_refeicao.refeicao_id = refeicao.refeicao_id 
        INNER JOIN alimento on alimento_refeicao.alimento_id = alimento.alimento_id
        INNER JOIN usuario on alimento_refeicao.usuario_id = usuario.usuario_id
        WHERE usuario.usuario_id = :usuario_id
        GROUP BY refeicao.refeicao_id');
        $query->execute([
            ':usuario_id' => $usuario
            ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
        break;  
}