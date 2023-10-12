 <?php

 include '../../conexao.php';
 
 
 session_start();



if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}






$admin = $_SESSION["admin"];
$avatar = $_SESSION["avatar"];
$usuario = $_SESSION["usuario"];
$senha = $_SESSION["senha"];
$email = $_SESSION["email"];
$telefone = $_SESSION["telefone"];
$status = $_SESSION["status"];
$validade = $_SESSION["validade"];
$tokens = $_SESSION["tokens"];
$plano = $_SESSION["plano"];
$usados = $_SESSION["usados"];
$token = $_SESSION["token"];





if ($admin === "user") {
  header("Location: ../dashboard.php");
  exit();
} elseif ($admin !== "Admin") {
  header("Location: ../dashboard.php");
  exit();
}
 ?> 


<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php include '../../componentes/header.php'?>
</head>
<body class="fundo">
  
    <?php include '../../componentes/menu.php'?>



<div class="container-fluid  ">
  
                 <div class="row mt-3">
                 <div class="col-12 text-center texto mb-3">
                  <h3>DASHBOARD ADMIN </h3>
            </div>
                        </div>
                
            
            
            
            
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-3 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="bi bi-people-fill"></i>
                                Usuários
                            </h5>
                            <h1 class="card-text"><?php echo $total_usuarios; ?></h1>
                        </div>
                    </div>
                </div>
                

                <div class="col-12 col-md-6 col-lg-3 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="bi bi-phone-fill"></i>
                                Acessos
                            </h5>
                            <h1 class="card-text"><?php echo $acessos; ?></h1>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-3 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="bi bi-book-fill"></i>
                                Tokens usados
                            </h5>
                            <h1 class="card-text"><?php echo $total_tokens_usados; ?></h1>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-3 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="bi bi-cloud-arrow-down-fill"></i>
                                Downloads
                            </h5>
                            <h1 class="card-text"><?php echo $downloads; ?></h1>
                        </div>
                    </div>
                </div>
                







            </div>
           
            <div class="card shadow">
  <div class="card-header display-flex align-items-center">

    
   <h1 class="card-title ms-3">Usuário <button type="button" class="btn btn-primary ms-5" data-bs-toggle="modal" data-bs-target="#modalAddUsuario">
  add
</button></h1> 

    
  
<div class="modal fade" id="modalAddUsuario" tabindex="-1" aria-labelledby="modalAddUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalAddUsuarioLabel">Add Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

    <form action="AddUsuario.php" method="POST">
      <div class="row">
        <div class="col-6">
<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required>
</div>
<div class="col-6">
<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
</div>
</div>
<br>
<div class="row">
<div class="col-6">
<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
</div>
<div class="col-6">
<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required>
</div>
</div>
<br>
<div class="row">
  <div class="col">
<select name="plano" class="form-select" id="plano" aria-label="Selecione um plano">
<option value="Free">Free</option>
  <option value="Pro">Pro</option>
  <option value="Premium">Premium</option>
</select>
</div>
<div class="col">
<select name="admin" class="form-select" id="admin" aria-label="Selecione se é Admin ou Usuário">
<option value="admin">Admin</option>
  <option value="user">Usuário</option>
</select>
</div>
<div class="col">
<select name="validade" class="form-select" id="validade" aria-label="Selecione a validade">
<option value="7">7 dias</option>
<option value="15">15 dias</option>
  <option value="30">30 dias</option>
  <option value="90">3 meses</option>
  <option value="180">6 meses</option>
  <option value="365">1 ano</option>
</select>
</div>
</div>
    </form>
      </div>

  

      <div class="modal-footer">
        <button type="submit" id="add" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>




</div>
  </div>
            <div class="table-responsive">
  <table class="table table-hover">



    <thead>
      <tr>
        <th scope="col">Usuario</th>
        <th scope="col">Status</th>
        <th scope="col">plano</th>
        <th scope="col">Validade</th>
        <th scope="col">Tokens</th> 
        <th scope="col">Ação</th>
      </tr>
    </thead>
    <tbody>
   <?php
   

   while ($banco = $result->fetchArray(SQLITE3_ASSOC)) {
     echo '<tr>';
     echo '<td>' . $banco['usuario'] . '</td>';
     echo '<td>' . $banco['status'] . '</td>';
     echo '<td>' . $banco['plano'] . '</td>';
     echo '<td>' . $banco['validade'] . '</td>';
     echo '<td>' . $banco['tokens'] . '</td>';
     echo '<td><button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#detalhesUsuario' . $banco['usuario'] . '"><i class="bi bi-info-circle-fill"></i></button></td>';
     echo '</tr>';

     echo '<tr class="collapse" id="detalhesUsuario' . $banco['usuario'] . '">';
     echo '<td colspan="8">'; 
     echo '  <div class="row">';
     echo '    <div class="col-3">';
     echo '<p>Admin: ' . $banco['admin'] . '</p>';
     echo '</div>';
     echo '<div class="col-3">';
     echo '<p>Usuario: ' . $banco['usuario'] . '</p>';
     echo '</div>';
     echo '<div class="col-3">';
     echo '<p>Senha: ' . $banco['senha'] . '</p>';
     echo '</div>';
     echo '</div>';
     echo '<div class="row">';
     echo '<div class="col-3">';
     echo '<p>Email: ' . $banco['email'] . '</p>';
     echo '</div>';
     echo '<div class="col-3">';
     echo '<p>Telefone: ' . $banco['telefone'] . '</p>';
     echo '</div>';
     echo '<div class="col-3">';
     echo '<p>Plano: ' . $banco['plano'] . '</p>';
     echo '</div>';
     echo '</div>';
     echo '<div class="row">';
     echo '<div class="col-3">';
     echo '<p>Validade: ' . $banco['validade'] . '</p>';
     echo '</div>';
     echo '<div class="col-3">';
     echo '<p>Status: ' . $banco['status'] . '</p>';
     echo '</div>';
     echo '<div class="col-3">';
     echo '<p>Tokens: ' . $banco['tokens'] . '</p>';
     echo '</div>';
     echo '</div>';
     echo '<div class="row">';
     echo '<div class="col-3">';
     echo '<p>Usados: ' . $banco['usados'] . '</p>';
     echo '</div>';
     echo '<div class="col-3">';
     echo '<p>Token: ' . $banco['token'] . '</p>';
     echo '</div>';
     echo '</div>';

     echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarUsuario' . $banco['usuario'] . '">
     Editar
   </button><button type="button" class="btn btn-danger btn-excluir-usuario" data-bs-toggle="modal" data-bs-target="#modalExcluirUsuario" data-usuario="' . $banco['usuario'] . '">Excluir</button>
   ';
     echo '</td>';
     echo '</tr>';
  
     
     echo '<div class="modal fade" id="modalEditarUsuario' . $banco['usuario'] . '" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel' . $banco['usuario'] . '" aria-hidden="true">';
     echo '  <div class="modal-dialog modal-dialog-centered">';
     echo '    <div class="modal-content">';
     echo '      <div class="modal-header">';
     echo '        <h5 class="modal-title" id="modalEditarUsuarioLabel' . $banco['usuario'] . '">Editar Usuário</h5>';
     echo '        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
     echo '      </div>';
     echo '      <div class="modal-body">';
     echo '        <form id="formularioEdicao" action="editar_usuario.php" method="POST">';
     echo '          <input type="hidden" name="editUsuario" id="editUsuario" value="' . $banco['usuario'] . '">';
     echo '           <div class="row">';
     echo '            <div class="col-6">';
     echo '          <div class="mb-3">';
     echo '            <label for="editAdmin" class="form-label">Admin</label>';
     echo '            <select class="form-select" id="editAdmin" name="editAdmin" required>';
     echo '              <option value="User">Usuário</option>';
     echo '              <option value="Admin">Administrador</option>';
     echo '            </select>';
     echo '              </div>';
     echo '          </div>';
     echo '          <div class="col-6">';
     echo '          <div class="mb-3">';
     echo '            <label for="editSenha" class="form-label">Senha</label>';
     echo '            <input type="password" class="form-control" id="editSenha" name="editSenha" value="' . $banco['senha'] . '" required>';
   
     echo '          </div>';
     echo '          </div>';
     echo '          </div>'; 
     echo '          <div class="row">';
     echo '          <div class="col-6">';
     echo '          <div class="mb-3">';
     echo '            <label for="editEmail" class="form-label">Email</label>';
     echo '            <input type="email" class="form-control" id="editEmail" name="editEmail" value="' . $banco['email'] . '" required>';
 
     echo '          </div>';
     echo '          </div>';
     echo '          <div class="col-6">';
     echo '          <div class="mb-3">';
     echo '            <label for="editTelefone" class="form-label">Telefone</label>';
     echo '            <input type="text" class="form-control" id="editTelefone" name="editTelefone" value="' . $banco['telefone'] . '" required>';
     echo '          </div>';
     echo '          </div>';
     echo '          </div>';
     echo '          <div class="row">';
     echo '          <div class="col-3">';
     echo '          <div class="mb-3">';
     echo '            <label for="editPlano" class="form-label">Plano</label>';
     echo '            <select class="form-select" id="editPlano" name="editPlano" required>';
     echo '              <option value="Free">Free</option>';
     echo '              <option value="Pro">Pro</option>';
     echo '              <option value="Premium">Premium</option>';
     echo '            </select>';
     echo '          </div>';
     echo '          </div>';
     echo '          <div class="col-3">';
     echo '          <div class="mb-3">';
     echo '            <label for="editValidade" class="form-label">Validade</label>';
      echo '              <select class="form-select" id="editValidade" name="editValidade" required>';
      echo '              <option value="0">manter</option>';
     echo '              <option value="7">7 dias</option>';
     echo '              <option value="15">15 dias</option>';
     echo '              <option value="30">30 dias</option>';
     echo '              <option value="90">3 meses</option>';
     echo '              <option value="180">6 meses</option>';
     echo '              <option value="365">1 ano</option>';
     echo '            </select>';
     echo '          </div>';
     echo '          </div>';
     echo '          <div class="col-3">';
     echo '          <div class="mb-3">';
     echo '            <label for="editStatus" class="form-label">Status</label>';
     echo '            <select class="form-select" id="editStatus" name="editStatus" required>';
     echo '              <option value="Ativo">Ativo</option>';
     echo '              <option value="Inativo">Inativo</option>';
     echo '            </select>';
     echo '          </div>';
     echo '          </div>';
     echo '          <div class="col-3">';
     echo '          <div class="mb-3">';
     echo '            <label for="editTokens" class="form-label">Tokens</label>';
     echo '            <input type="number" class="form-control" id="editTokens" name="editTokens" value="' . $banco['tokens'] . '" required>';
     echo '          </div>';
     echo '          </div>';
     echo '          </div>';
     echo '          <div class="row mb-3">';
     echo '          <div class="col-6">';
     echo '            <label for="editToken" class="form-label">Token</label>';
     echo '            <input type="text" class="form-control" id="editToken" name="editToken" value="' . $banco['token'] . '" required>';
     echo '          </div>';
     echo '          </div>';
     echo '          </div>';
     echo '          <div class="modal-footer">';
     echo '          <button type="submit" class="btn btn-primary">Salvar</button>';
     echo '        </form>';
     echo '      </div>';
     echo '      </div>';
     echo '    </div>';
     echo '  </div>';
     echo '</div>';
 }







   ?>
    </tbody>
  </table>
</div>

<!-- Modal de Confirmação de Exclusão -->
<div class="modal fade" id="modalExcluirUsuario" tabindex="-1" aria-labelledby="modalExcluirUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalExcluirUsuarioLabel">Confirmar Exclusão</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Tem certeza de que deseja excluir este usuário?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="confirmarExclusao">Excluir</button>
      </div>
    </div>
  </div>
</div>


            
            </div>


           
<?php 
include "../../componentes/footer.php"
?>
<?php
include "../../componentes/script.php"
?>
</div>


 </body>
</html>