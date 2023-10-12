<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include '../componentes/header.php'; ?>
</head>
<body class="fundo">
    <?php
    // Verifique se há uma mensagem de erro na URL
    if (isset($_GET['error'])) {
        echo '<div class="alert alert-danger">' . $_GET['error'] . '</div>';
    }
    ?>

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-auto">
                <div class="row justify-content-center align-items-center vh-30">
                    <div class="col-auto">
                        <img class="logo" src="https://static.vecteezy.com/ti/fotos-gratis/t2/6671766-fantastica-lua-magica-luz-e-agua-barco-com-arvore-papel-de-parede-gratis-foto.jpg" alt="">
                    </div>
                </div>
                <div class="card shadow card-cadastro">
                    <div class="card-body text-center">
                        <h2 class="card-title mb-3">Cadastro</h2>
                        <form action="adm/registro.php" method="post">
                            <div class="mb-3">
                                <input type="usuario" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                                <div class="alert alert-danger d-none" id="senha-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mb-3">Cadastro</button>
                        </form>
                        <p>Já tem conta? <a href="index.php">Conecte-se</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <?php include '../componentes/footer.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../componentes/script.php'; ?>


    <script>



        
  // Formatação automática do campo de telefone
const telefoneInput = document.getElementById('telefone');

telefoneInput.addEventListener('input', function (event) {
    const input = event.target;
    const value = input.value.replace(/\D/g, ''); // Remove todos os não dígitos

    let formattedValue = '';

    if (value.length > 0) {
        formattedValue += `(${value.substr(0, 2)}`;
    }

    if (value.length > 2) {
        formattedValue += `) ${value.substr(2, 1)}`;
    }

    if (value.length > 3) {
        formattedValue += ` ${value.substr(3, 4)}`;
    }

    if (value.length > 7) {
        formattedValue += `-${value.substr(7, 4)}`;
    }

    input.value = formattedValue;
});




        const senhaInput = document.getElementById('senha');
        const senhaFeedback = document.getElementById('senha-feedback');

        senhaInput.addEventListener('input', function (event) {
            const input = event.target;
            const value = input.value;

            const hasUpperCase = /[A-Z]/.test(value);
            const hasLowerCase = /[a-z]/.test(value);
            const hasNumber = /[0-9]/.test(value);
            const hasSymbol = /[\W_]/.test(value);
            const isLengthValid = value.length >= 8;

            let feedback = '';

            if (!hasUpperCase) feedback += '1 letra maiúscula ';
            if (!hasLowerCase) feedback += '1 letra minúscula ';
            if (!hasNumber) feedback += '1 número ';
            if (!hasSymbol) feedback += '1 símbolo ';
            if (!isLengthValid) feedback += ' 8 caracteres';

            senhaFeedback.textContent = feedback;

            if (feedback.trim() === '') {
                senhaFeedback.classList.add('d-none'); 
            } else {
                senhaFeedback.classList.remove('d-none');
            }
        });
    </script>
</body>
</html>
