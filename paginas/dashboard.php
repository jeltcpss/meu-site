<?php
include '../conexao.php';
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



if ($admin === "Admin") {
    header("Location: adm/dashboard.php");
    exit();
} 


?> 


<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php include '../componentes/header.php'?>
</head>
<body class="fundo">
 
   <?php include '../componentes/menu.php'?>



<div class="container-fluid  ">
 
                <div class="row mt-3">
                <div class="col-12 text-center texto mb-3">
                 <h3>DASHBOARD</h3>
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

           <!---------------------------->

           <div class="row mb-3">
               <div class="col-12 col-md-6 col-lg-3 mb-3">
                   <div class="card shadow">
                       <div class="card-body">
                           <h5 class="card-title">
                               <i class="bi bi-bag-fill"></i>
                               plano
                           </h5>
                           <h1 class="card-text"><?php echo $plano; ?></h1>
                       </div>
                   </div>
               </div>
               

               <div class="col-12 col-md-6 col-lg-3 mb-3">
                   <div class="card shadow">
                       <div class="card-body">
                           <h5 class="card-title">
                               <i class="bi bi-calendar-date-fill"></i>
                              Validade
                           </h5>
                           <h1 class="card-text"><?php echo $validade; ?></h1>
                       </div>
                   </div>
               </div>
               
               <div class="col-12 col-md-6 col-lg-3 mb-3">
                   <div class="card shadow">
                       <div class="card-body">
                           <h5 class="card-title">
                               <i class="bi bi-calculator-fill"></i>
                               Seus Tokens
                           </h5>
                           <h1 class="card-text"><?php echo $tokens; ?></h1>
                       </div>
                   </div>
               </div>
               
               <div class="col-12 col-md-6 col-lg-3 mb-3">
                   <div class="card shadow">
                       <div class="card-body">
                           <h5 class="card-title">
                               <i class="bi bi-archive-fill"></i>
                               Seu Token
                           </h5>
                           <h1 class="card-text"><?php echo $token; ?></h1>
                       </div>
                   </div>
               </div>
           </div>









          
           <div class="card shadow">
 <div class="card-header display-flex align-items-center">

   
  <h1 class="card-title ms-3">Usuário</h1> 

   
 

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
    echo '</tr>';

  
}







  ?>
   </tbody>
 </table>
</div>
</div>





           
           </div>


          
<?php 
include "../componentes/footer.php"
?>
<?php
include "../componentes/script.php"
?>
</div>


</body>
</html>