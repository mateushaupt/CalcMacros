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
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="nomeAlimento" type="text" name="nomeAlimento"
                                                placeholder="Insira o Nome do Alimento" required />
                                            <label for="nomeAlimento">Nome do Alimento</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" type="number"
                                                        placeholder="Quantidade por Por????o" name="porcao" id="porcao" />
                                                    <label for="porcao">Por????o</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-select">
                                                        <option selected>Selecione</option>
                                                        <option value="g">Grama</option>
                                                        <option value="kg">Quilo</option>
                                                        <option value="ml">Mililitro</option>
                                                        <option value="l">Litro</option>
                                                    </select>
                                                    <label for="genero" class="form-label">Unidade de medida</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" id="carb" required
                                                        placeholder="Carboidrato">
                                                    <label for="carboidrato">Carboidratos</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" id="prot" required
                                                        placeholder="Proteina">
                                                    <label for="carboidrato">Prote??nas</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" id="gordTotal" required
                                                        placeholder="Gordura Total">
                                                    <label for="gordTotal">Gorduras Totais</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" id="gordSaturada" required
                                                        placeholder="Gordura Saturada">
                                                    <label for="gordSaturada">Gorduras Saturadas</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" id="gordTrans" required
                                                        placeholder="Gordura Trans">
                                                    <label for="gordTrans">Gorduras Trans</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" id="fibra"
                                                        placeholder="fibra">
                                                    <label for="fibra">Fibra</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" id="acucar"
                                                        placeholder="A??ucar">
                                                    <label for="acucar">A????car</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" id="sodio"
                                                        placeholder="sodio">
                                                    <label for="sodio">S??dio</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" id="calcio"
                                                        placeholder="calcio">
                                                    <label for="calcio">C??lcio</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" id="ferro"
                                                        placeholder="ferro">
                                                    <label for="ferro">Ferro</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="caloria" type="text" name="caloria"
                                                placeholder="caloria" required />
                                            <label for="caloria">Calorias</label>
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