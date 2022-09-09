<?php
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
try{
    $conn = $banco->conectar();
} catch(PDOException $e){
    echo 'Falha ao salvar os dados. Favor, tente mais tarde.';
}

// dependendo do valor que vier em registro, nós inserimos em uma tabela diferente
// 1 = ingrediente
// 2 = item
// 3 = cardapi


switch ($dados['registro']) {
    case 1:
        $query = $conn->prepare('SELECT sexo, idade FROM usuario WHERE  usuario_id = :usuario_id');
        $query->execute([
            ':usuario_id' => $dados['usuario_id']           
        ]);
        $busca = $query->fetch();


        if($busca['sexo'] == 'masculino'){
            $caloria = (($dados['peso']*10)+($dados['altura']*6.25)-(5*$busca['idade'])+5)*$dados['atvfisica'];
        }else{
            $caloria = (($dados['peso']*10)+($dados['altura']*6.25)-(5*$busca['idade'])-161)*$dados['atvfisica'];
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
          $carboidrato = ($calorias-($proteina*4)-($gordura*9))/4;
        }
        $query = $conn->prepare('UPDATE usuario SET altura = :altura, peso = :peso, objetivo = :objetivo, atvfisica = :atvfisica, calorias = :caloria, proteinas = :proteina, carboidratos = :carboidrato, gorduras = :gordura WHERE usuario_id = :usuario_id ;');        
        $query->execute([
            ':usuario_id' => $dados['usuario_id'],
            ':altura' => $dados['altura'],
            ':peso' => $dados['peso'],
            ':objetivo' => $dados['objetivo'],
            ':atvfisica' => $dados['atvfisica'],
            ':caloria' => $caloria,
            ':proteina' => $proteina,
            ':carboidrato' => $carboidrato,
            ':gordura' => $gordura
        ]);
        header('location: cdm.php');
        break;
        
            
    }
?>