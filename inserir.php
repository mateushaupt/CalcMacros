<?php
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
try{
    $conn = $banco->conectar();
} catch(PDOException $e){
    echo 'Falha ao salvar os arquivos. Favor, tente mais tarde.';
}

// dependendo do valor que vier em registro, nós inserimos em uma tabela diferente
// 1 = ingrediente
// 2 = item
// 3 = usuario
// 4 = cardapio

// Faz um INSERT diferente, de acordo com os números que vierem representando as tabelas
switch ($dados['registro']) {
        //usuario
    case 1:
        if($dados['senha'] == $dados['confirmpassword']){
        $query = $conn->prepare('SELECT * FROM usuario WHERE email = :email');
        $query->execute([
            ':email' => $dados['email']           
        ]);
        // Se houver um item com esse nome no banco, ele não insere
        if($query->fetch(PDO::FETCH_ASSOC) == null){
            $query = $conn->prepare('INSERT INTO usuario (nome, senha, email, idade, sexo, altura, peso, objetivo, atvfisica) VALUES (:nome, :senha, :email, :idade, :sexo, :altura, :peso, :objetivo, :atvfisica);');
        $query->execute([
            ':nome' => $dados['nome'],
            ':senha' => $dados['senha'],
            ':email' => $dados['email'],
            ':idade' => $dados['idade'],
            ':sexo' => $dados['sexo'],
            ':altura' => $dados['altura'],
            ':peso' => $dados['peso'],
            ':objetivo' => $dados['objetivo'],
            ':atvfisica' => $dados['atvfisica']
        ]);
        header('location: login.php');
        
        } else{
            // Por enquanto só morre, depois mostrar de forma mais amigável para o usuário
            die('Já existe um usuário com o mesmo email cadastrado');
        }
        break;
    } else{
        die("<script>alert('As senhas nâo coincidem');</script>");
    }
    
}

function pegaUltimoId($conexao){
    $query = $conexao->prepare("SELECT LAST_INSERT_ID()");
    $query->execute();
    return $query->fetch(PDO::FETCH_NUM);
}


?>