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
        
        if($dados['sexo'] == 'masculino'){
            $caloria = (($dados['peso']*10)+($dados['altura']*6.25)-(5*$dados['idade'])+5)*$dados['atvfisica'];
        }else{
            $caloria = (($dados['peso']*10)+($dados['altura']*6.25)-(5*$dados['idade'])-161)*$dados['atvfisica'];
        }
        $lbs = $dados['peso']*2.2;
        if($dados['objetivo'] == 'gPeso'){
            $calorias = $caloria-500;
            $proteina = ($lbs * .8);
            $gordura = ($lbs * .35);
            $carboidrato = ($calorias-($proteina*4)-($gordura*9))/4;
        }else if ($dados['objetivo'] == 'gPeso') {
            // Muscle gain
          $calorias = $caloria+250;
          $proteina = ($lbs * 1.5);
          $gordura = ($cals * .7)/9;
          $carboidrato = ($calorias-($proteina*4)-($gordura*9))/8;
        } else {
            // mainteance 
          $proteina = ($lbs * .9);
          $gordura = ($lbs * .40);
          $carboidrato = ($calorias-($protein*4)-($gordura*9))/4;
        }

// Se houver um item com esse nome no banco, ele não insere
        if($query->fetch(PDO::FETCH_ASSOC) == null){
            $query = $conn->prepare('INSERT INTO usuario (nome, senha, email, idade, sexo, altura, peso, objetivo, atvfisica, caloria, proteina, carboidrato, gordura) VALUES (:nome, :senha, :email, :idade, :sexo, :altura, :peso, :objetivo, :atvfisica, :caloria, :proteina, :carboidrato, :gordura);');
        $query->execute([
            ':nome' => $dados['nome'],
            ':senha' => $dados['senha'],
            ':email' => $dados['email'],
            ':idade' => $dados['idade'],
            ':sexo' => $dados['sexo'],
            ':altura' => $dados['altura'],
            ':peso' => $dados['peso'],
            ':objetivo' => $dados['objetivo'],
            ':atvfisica' => $dados['atvfisica'],
            ':caloria' => $caloria,
            ':proteina' => $proteina,
            ':carboidrato' => $carboidrato,
            ':gordura' => $gordura
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