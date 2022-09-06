<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Calculadora de Macros</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <?php session_start(); ?>
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
                                <h3 class="text-center font-weight-light my-4">Cadastro de Alimento</h3>
                                <div class="card-body">
                                    <form method="post" name="registration" action="inserir.php">
                                        <input type="hidden" value="2" name="registro" id="registro">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="nome" type="text" name="nome"
                                                placeholder="Insira o Nome do Alimento" required />
                                            <label for="nome">Nome do Alimento</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" type="number"
                                                        placeholder="Quantidade por Porção" name="porcao" id="porcao" />
                                                    <label for="porcao">Porção</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-select" name="unidade_medida" id="unidade_medida">
                                                        <option selected>Selecione</option>
                                                        <option value="g">Grama</option>
                                                        <option value="kg">Quilo</option>
                                                        <option value="ml">Mililitro</option>
                                                        <option value="l">Litro</option>
                                                    </select>
                                                    <label for="unidade_medida" class="form-label">Unidade de medida</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" id="carboidrato" name="carboidrato" required
                                                        placeholder="Carboidrato">
                                                    <label for="carboidrato">Carboidratos</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" id="proteina" name="proteina" required
                                                        placeholder="Proteina">
                                                    <label for="carboidrato">Proteínas</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" name="gordura" id="gordura" required
                                                        placeholder="Gordura Total">
                                                    <label for="gordTotal">Gorduras</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="caloria" type="text" name="caloria"
                                                       placeholder="Calorias" required />
                                                    <label for="caloria">Calorias</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button type="submit" name="submit"
                                                    class="btn btn-primary btn-block">Cadastrar Alimento</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="cdm.php">Voltar</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>