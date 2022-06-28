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
                                <h3 class="text-center font-weight-light my-4">Cadastro de Usuário</h3>
                                <div class="card-body">
                                    <form method="post" name="registration" action="inserir.php">
                                        <input type="hidden" value="1" name="registro" id="registro">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="nome" type="text" name="nome"
                                                placeholder="Insira seu Nome" required />
                                            <label for="nome">Nome</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" name="email"
                                                placeholder="nome@exemplo.com" />
                                            <label for="inputEmail">Endereço de Email</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" type="password"
                                                        placeholder="Crie uma Senha" name="senha" id="senha" />
                                                    <label for="senha">Senha</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPasswordConfirm"
                                                        type="password" placeholder="Confirme a Senha"
                                                        name="confirmpassword" id="confirmpassword" />
                                                    <label for="inputPasswordConfirm">Confirmar a Senha</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" id="idade" name="idade" required
                                                        placeholder="Insira sua Idade">
                                                    <label for="idade">Idade</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-select" name="sexo">
                                                        <option selected>Selecione</option>
                                                        <option value="Masculino" name="sexo">Masculino</option>
                                                        <option value="Feminino" name="sexo">Feminino</option>
                                                    </select>
                                                    <label for="sexo" class="form-label">Sexo</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" id="altura" name="altura" required
                                                        placeholder="Insira sua Altura">
                                                    <label for="altura" class="form-label">Altura (em cm)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" class="form-control" id="peso" name="peso" required
                                                        placeholder="Insira seu Peso">
                                                    <label for="peso" class="form-label">Peso (em kg)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="text-center font-weight-light my-4">Objetivo</h4>
                                        <div class="row mb-3 justify-content-md-center">
                                            <div class="col-md-auto">
                                                <div class="form-check form-check-inline mb-3">
                                                    <input class="form-check-input" type="radio" name="objetivo" id="exampleRadio1" value="pPeso">
                                                    <label class="form-check-label" for="inlineRadio1">Perder Peso</label>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="form-check form-check-inline mb-3">
                                                    <input class="form-check-input" type="radio" name="objetivo" id="exampleRadios2" value="mPeso">
                                                    <label class="form-check-label" for="exampleRadios2">Manter Peso</labels>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="form-check form-check-inline mb-3">
                                                    <input class="form-check-input" type="radio" name="objetivo" id="exampleRadios3" value="gPeso">
                                                    <label class="form-check-label" for="exampleRadios2">Ganhar Peso</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="text-center font-weight-light my-4">Nível de Atividade Física</h4>
                                        <div class="row mb-4 justify-content-md-center">
                                            <div class="col-md-auto">
                                                <div class="form-check form-check-inline mb-4">
                                                    <input class="form-check-input" type="radio" name="atvfisica" id="exampleRadio1" value="sedentario">
                                                    <label class="form-check-label" for="inlineRadio1">Sedentário</label>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="form-check form-check-inline mb-4">
                                                    <input class="form-check-input" type="radio" name="atvfisica" id="exampleRadios2" value="intermediario">
                                                    <label class="form-check-label" for="exampleRadios2">Intermediário</label>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="form-check form-check-inline mb-4">
                                                    <input class="form-check-input" type="radio" name="atvfisica" id="exampleRadios3" value="avancado">
                                                    <label class="form-check-label" for="exampleRadios2">Avançado</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button type="submit" name="submit"
                                                    class="btn btn-primary btn-block">Criar Conta</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.php">Já possui uma conta? Faça o Login</a></div>
                                    <hr />
                                    <div class="small"><a href="logout.php">Página Inicial</a></div>
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