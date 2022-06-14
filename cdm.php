<!DOCTYPE html>
<html lang="en">

<head>
    <title>Calculadora de Macros</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
                                            <p>Meta diária: x Kcal</p>
                                        </div>
                                        <div class="col">
                                            <a href="usuario.php" class="icon-block float-right">
                                                <i class="fa fa-cog fa-2xl" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row g-0">
                                        <div class="col-lg-6">

                                        </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <p>Carboidrato:</p>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p>x g / x g</p>
                                            </div>
                                            <div>
                                                <p>Proteínas:</p>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p>x g / x g</p>
                                            </div>
                                            <div>
                                                <p>Gordura:</p>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p>x g / x g</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card">
                                        <div class="card-header">
                                            Café da Manhã
                                        </div>
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row mb-4 justify-content-md-center">
                                                    <div class="col-auto">
                                                        Caloria: x g
                                                    </div>
                                                    <div class="col-auto">
                                                        Proteína: x g
                                                    </div>
                                                    <div class="col-auto">
                                                        Carboidrato: x g
                                                    </div>
                                                    <div class="col-auto">
                                                        Gordura: x g
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                        <button type="button" class="btn btn-primary float-right">Editar Refeição</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="container">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Nova Refeição
                                        </button>

                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Nova Refeição</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="nomeRef" type="text" name="nomeRef" placeholder="Insira o Nome da Refeição" required />
                                                            <label for="nomeRef">Nome da Refeição</label>
                                                        </div>
                                                        <hr>
                                                        <div class="input-group">
                                                            <div class="form-control">
                                                                <input type="search" id="form1" class="form-control" placeholder="Buscar" />
                                                            </div>
                                                            <button type="button" class="btn btn-primary">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                        <div class="mt-4 mb-0">
                                                            <div class="text-center">
                                                                <a class="btn btn-primary btn-block" href="cadAlimento.html">Cadastrar Alimento</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="button" class="btn btn-primary">Salvar</button>
                                                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>


</html>