<?php session_start();
error_reporting(0);
include_once(__DIR__ . '/conecta.php');
if (strlen($_SESSION['usuario_id']) == 0) {
    header('location:logout.php');
} else {
    $banco = new Banco;
    $conn = $banco->conectar();    
    
    $stmt = $conn->prepare('SELECT calorias, proteinas, carboidratos, gorduras FROM usuario WHERE usuario_id = :usuario_id');
    $stmt->execute([
        ':usuario_id' => $_SESSION['usuario_id']
        ]
    );
    $ret = $stmt->fetch();

    $pesquisa = 1;
    
    $usuario = $_SESSION['usuario_id'];
    
    $query = $conn->prepare('SELECT refeicao.nome as nome_da_refeicao, GROUP_CONCAT(alimento.nome SEPARATOR ", ") 
            as alimentos, 
            SUM(CASE WHEN alimento_refeicao.refeicao_id = alimento_refeicao.refeicao_id THEN caloria ELSE 0 END) as calorias_total,
            SUM(CASE WHEN alimento_refeicao.refeicao_id = alimento_refeicao.refeicao_id THEN proteina ELSE 0 END) as proteinas_total,
            SUM(CASE WHEN alimento_refeicao.refeicao_id = alimento_refeicao.refeicao_id THEN carboidrato ELSE 0 END) as carboidratos_total,
            SUM(CASE WHEN alimento_refeicao.refeicao_id = alimento_refeicao.refeicao_id THEN gordura ELSE 0 END) as gorduras_total
            from alimento_refeicao INNER JOIN refeicao on alimento_refeicao.refeicao_id = refeicao.refeicao_id 
            INNER JOIN alimento on alimento_refeicao.alimento_id = alimento.alimento_id INNER JOIN usuario on alimento_refeicao.usuario_id = usuario.usuario_id
            WHERE usuario.usuario_id = :usuario_id');
    $query->execute([
        ':usuario_id' => $usuario
    ]);

    $sear = $query->fetch();
    
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Calculadora de Macros</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
  <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-lg mt-3">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Calculadora de Macros</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <p class="kcaldiaria">Meta diária: <?php echo htmlentities($ret['calorias'])?> Kcal</p>
                                            <p>Consumidas: <?php echo htmlentities($sear[2])?> Kcal</p>
                                        </div>
                                        <div class="col">
                                            <a href="logout.php" class="icon-block" style="float: right;">
                                                <i class="fa fa-right-to-bracket fa-2xl" aria-hidden="true"></i>
                                            </a>
                                            <a href="usuario.php" class="icon-block me-2" style="float: right;">
                                                <i class="fa fa-cog fa-2xl" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row g-0">
                                        <div class="row">
                                            <div class="col">
                                                <p>Carboidrato:</p>
                                                <p class="carbdiaria"><?php echo htmlentities($sear[4])?>g Consumidas de <?php echo htmlentities($ret['carboidratos'])?>g Necessárias</p>
                                            </div>
                                            <div class="col">
                                                <p>Proteínas:</p>
                                                <p class="protdiaria"><?php echo htmlentities($sear[3])?>g Consumidas de <?php echo htmlentities($ret['proteinas'])?>g Necessárias</p>
                                            </div>
                                            <div class="col">
                                                <p>Gordura:</p>
                                                <p class="gorddiaria"><?php echo htmlentities($sear[5])?>g Consumidas de <?php echo htmlentities($ret['gorduras'])?>g Necessárias</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Nova Refeição
                                        </button>
                                    </div>
                                    <?php
                                        $alimentos = include_once(__DIR__ . '/buscar.php');;
                                        for ($a = 0; $a < count($alimentos); $a++) {
                                           
                                    ?>
                                    <div class="card mb-3" >
                                        <div class="card-header">
                                            <p><?php echo htmlentities($alimentos[$a]["nome_da_refeicao"]); ?></p>
                                        </div>
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row mb-4 justify-content-md-center">
                                                    <div class="col-auto">
                                                        Calorias: <?php echo htmlentities($alimentos[$a]["soma_das_calorias"]); ?>g
                                                    </div>
                                                    <div class="col-auto">
                                                        Proteínas: <?php echo htmlentities($alimentos[$a]["soma_das_proteinas"]); ?>g
                                                    </div>
                                                    <div class="col-auto">
                                                        Carboidratos: <?php echo htmlentities($alimentos[$a]["soma_dos_carboidratos"]); ?>g
                                                    </div>
                                                    <div class="col-auto">
                                                        Gorduras: <?php echo htmlentities($alimentos[$a]["soma_das_gorduras"]); ?>g
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                        <form action="excluir.php" method="post">
                                                        <input type="hidden" value="2" name="registro" id="registro">
                                                        <input type="hidden" value="<?php echo htmlentities($alimentos[$a]["refeicao_id"]); ?>" name="refeicao_id">
                                                        <button type="submit" name="submit" class="btn btn-danger ms-2" style="float: right;" >Excluir Refeição</button>
                                                        </form>
                
                                                        <button type="button" class="btn btn-primary" style="float: right;" data-bs-toggle="modal" data-bs-target="#ModalEditar">Editar Refeição</button>
                                                        <div class="container">
                                        <div class="modal fade" id="ModalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Editar Refeição</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" name="registration" action="alterar.php">
                                                        <input type="hidden" value="2" name="registro" id="registro">
                                                        <input type="hidden" value="<?=$_SESSION["usuario_id"]?>" name="usuario_id" id="usuario_id">
                                                        <div class="mb-3">
                                                            <button type="submit" name="submit" class="btn btn-primary">Salvar</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <a class="btn btn-success btn-block" href="cadAlimento.php">Cadastrar Alimento</a>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="nome" type="text" name="nome" value="<?php echo htmlentities($alimentos[$a]["nome_da_refeicao"]); ?>" placeholder="Insira o Nome da Refeição" required />
                                                            <label for="nome">Nome da Refeição</label>
                                                        </div>
                                                        <div class="col-6"><h5>Alimentos da Refeição:</h5></div>
                                                            <div>
                                                                <div class="input-group col-12">
                                                                    <div class="form-outline col-6 mb-3">
                                                                        <input id="search-focus" type="search" id="form1" class="form-control" onkeyup="pesquisar()" placeholder="Pesquisar" />
                                                                    </div>
                                                                </div>
                                                        <div class="input-group">
                                                            <div class="col-8">
                                                                <?php include('includes/alimentos.php'); ?>


                                                            </div>
                                                        </div>
                                                            </div>
                                                    </div>
                                                    
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="container">
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Nova Refeição</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" name="registration" action="inserir.php">
                                                        <input type="hidden" value="3" name="registro" id="registro">
                                                        <input type="hidden" value="<?=$_SESSION["usuario_id"]?>" name="usuario_id" id="usuario_id">
                                                        <div class="mb-3">
                                                            <button type="submit" name="submit" class="btn btn-primary">Salvar</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <a class="btn btn-success btn-block" href="cadAlimento.php">Cadastrar Alimento</a>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="nome" type="text" name="nome" placeholder="Insira o Nome da Refeição" required />
                                                            <label for="nome">Nome da Refeição</label>
                                                        </div>
                                                        <div class="col-6"><h5>Alimentos da Refeição:</h5></div>
                                                            <div>
                                                                <div class="input-group col-12">
                                                                    <div class="form-outline col-6 mb-3">
                                                                        <input id="search-focus" type="search" id="form1" class="form-control" onkeyup="pesquisar()" placeholder="Pesquisar" />
                                                                    </div>
                                                                </div>
                                                        <div class="input-group">
                                                            <div class="col-8">
                                                                <?php include('includes/alimentos.php'); ?>
                                                            </div>
                                                        </div>
                                                            </div>
                                                    </div>
                                                    
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="js/AlimentosList.js" type="module text/babel"></script>
    <script src="js/scripts.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>


</html>
<?php } ?>