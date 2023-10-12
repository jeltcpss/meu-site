<?php

session_start();




if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
    exit();
}


$avatar = $_SESSION["avatar"];
$usuario = $_SESSION["usuario"];
$senha = $_SESSION["senha"];
$email = $_SESSION["email"];
$telefone = $_SESSION["telefone"];
$plano = $_SESSION["plano"];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include '../../componentes/header.php'; ?>
</head>

<body class="fundo text-center">
<?php include '../../componentes/menu.php'; ?>

    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="card mt-5">
                <h2 class="card-title mb-3">Perfil</h2>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <img class="perfil position-relative" src="<?php echo $avatarDataUrl; ?>" alt="">
                    </div>
                </div>
                <i class="bi bi-camera-fill  rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#Editar_Avatar"></i>


                <h1 class="mb-3"><?php echo $usuario; ?></h1>

                <h5>Senha: <?php echo $senha; ?> <i class="bi bi-lock-fill bg-primary rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#Editar_Senha"></i> </h5>
                <h5>Email: <?php echo $email; ?></h5>
                <h5 class="ms-5 me-5">Telefone: <?php echo $telefone; ?></h5>
                <h5>Plano: <?php echo $plano; ?></h5>
                




                <div class="modal fade" id="Editar_Avatar" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Auterar foto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body mt-4">

                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <input type="text" class="form-control" name="user" value="<?php echo $usuario; ?>" id="user" hidden>
                                    <input class="form-control" type="file" name="imagem" accept="image/*">
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
                                    <div class="row">
                                        <button class="btn btn-primary mt-3" type="submit" value="Enviar">Enviar</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal fade" id="Editar_Senha" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Auterar senha</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body mt-4">
                                <form action="Editar_Senha.php" method="post">
                                    <input type="text" class="form-control" name="senha" value="<?php echo $senha; ?>" id="senha" aria-describedby="senhaHelp">
                                    <button class="btn btn-primary mt-3" type="submit" value="Enviar">Enviar</button>
                                </form>



                            </div>
                        </div>










                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include '../../componentes/footer.php'; ?>
    <?php include '../../componentes/script.php'; ?>
</body>

</html>