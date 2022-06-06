<!DOCTYPE html>
<html lang="en">

<head>
    <title>Calculadora de Macros</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>

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
                            <input type="hidden" value="3" name="registro" id="registro">
                            <input class="form-control" id="nomeRef" type="text" name="nomeRef" placeholder="Insira o Nome da Refeição" required />
                            <label for="nome">Nome da Refeição</label>
                        </div>
                        <hr>
                        <div class="form-floating mb-3">
                            <div class="row mb-3">
                                <div class="col-md-10">
                                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-outline-success" style="width: 106px;" type="submit">Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                                            <div class="text-center">
                                                <button class="btn btn-primary btn-block">Cadastrar Alimento</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>