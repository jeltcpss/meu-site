



<!DOCTYPE html>
<html>

<head>
    <?php include '../componentes/header.php' ?>
</head>

<body class="fundo">

    <div class="container justify-content-center text-center mt-5">

        <img class="logo mb-3" src="https://img.freepik.com/fotos-gratis/uma-imagem-de-um-planeta-com-um-buraco-negro-no-centro-e-um-buraco-negro-no-centro_1340-23795.jpg?w=740&t=st=1696931497~exp=1696932097~hmac=c02fe0049ba4b3b1c65f9c963ef16917785f00dc00340079f085b36bce5435b6" alt="">

        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="card shadow text-center card-login">
                    <h2 class="card-header mb-3">Login</h2>
                    <div class="card-body">
                    <?php
    if (isset($_GET['error'])) {
        echo '<div class="alert alert-danger">' . $_GET['error'] . '</div>';
    }
    ?>
                     <?php
    if (isset($_GET['success'])) {
        echo '<div class="alert alert-success">' . $_GET['success'] . '</div>';
    }
    ?>

                        <form method="post" action="adm/login.php">
                            <div class="mb-3">
                                <input type="usuario" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                            Não tem uma conta? <a href="cadastro.php">Cadastre-se</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php include '../componentes/footer.php'; ?>
            </div>
        </div>
        <?php include '../componentes/script.php' ?>
    </div>
</body>

</html>
