<?php
session_start();
error_reporting(0);
include_once(__DIR__ . '/conecta.php');
if (strlen($_SESSION["usuario_id"]) == 0) {
    header('location:logout.php');
} else {
    $banco = new Banco;
    $conn = $banco->conectar();    
    
    $stmt = $conn->prepare('SELECT altura, peso, objetivo, atvfisica FROM usuario WHERE usuario_id = :usuario_id');
    $stmt->execute([
        ':usuario_id' => $_SESSION["usuario_id"]
        ]
    );
    $ret = $stmt->fetch();

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Macros</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card shadow-lg border-0 rounded-lg mt-3">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Calculadora de Macros</h3>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <h4 class="font-weight-light my-4">Editar Informações</h4>
                                    </div>
                                    <form method="post" name="registration" action="alterar.php">
                                    <input type="hidden" value="1" name="registro" id="registro">
                                    <input type="hidden" value="<?=$_SESSION["usuario_id"]?>" name="usuario_id" id="usuario_id">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" name="altura" id="altura" required placeholder="Insira sua Altura" value="<?php echo htmlentities($ret['altura']) ?>">
                                                    <label for="altura" class="form-label">Altura (em cm)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" name="peso" id="peso" required placeholder="Insira seu Peso" value="<?php echo htmlentities($ret['peso'])?>">
                                                    <label for="peso" class="form-label">Peso (em kg)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="text-center font-weight-light my-4">Objetivo</h4>
                                        <div class="row mb-3 justify-content-md-center">
                                            <div class="col-md-auto">
                                                <div class="form-check form-check-inline mb-3">
                                                    <input class="form-check-input" type="radio" name="objetivo" id="exampleRadio1" value="pPeso" <?php if ($ret['objetivo'] == 'pPeso') print('checked') ?>>
                                                    <label class="form-check-label" for="inlineRadio1">Perder Peso</label>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="form-check form-check-inline mb-3">
                                                    <input class="form-check-input" type="radio" name="objetivo" id="exampleRadios2" value="mPeso" <?php if ($ret['objetivo'] == 'mPeso') print('checked') ?>>
                                                    <label class="form-check-label" for="exampleRadios2">Manter Peso</labels>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="form-check form-check-inline mb-3">
                                                    <input class="form-check-input" type="radio" name="objetivo" id="exampleRadios3" value="gPeso" <?php if ($ret['objetivo'] == 'gPeso') print('checked') ?>>
                                                    <label class="form-check-label" for="exampleRadios2">Ganhar Peso</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="text-center font-weight-light my-4">Nível de Atividade Física</h4>
                                        <div class="row mb-4 justify-content-md-center">
                                            <div class="col-md-auto">
                                                <div class="form-check form-check-inline mb-4">
                                                    <input class="form-check-input" type="radio" name="atvfisica" id="exampleRadio1" value="1.2" <?php if ($ret['atvfisica'] == 1.2) print('checked') ?>>
                                                    <label class="form-check-label" for="inlineRadio1">Sedentário</label>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="form-check form-check-inline mb-4">
                                                    <input class="form-check-input" type="radio" name="atvfisica" id="exampleRadios2" value="1.475" <?php if ($ret['atvfisica'] == 1.475) print('checked') ?>>
                                                    <label class="form-check-label" for="exampleRadios2">Intermediário</label>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="form-check form-check-inline mb-4">
                                                    <input class="form-check-input" type="radio" name="atvfisica" id="exampleRadios3" value="1.725" <?php if ($ret['atvfisica'] == 1.725) print('checked') ?>>
                                                    <label class="form-check-label" for="exampleRadios2">Avançado</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button type="submit" name="submit" class="btn btn-primary btn-block mb-2">Salvar alterações</button>
                                            </div>
                                            <div class="d-grid">
                                                <a href="cdm.php" class="btn btn-secondary">Voltar</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
<?php } ?>