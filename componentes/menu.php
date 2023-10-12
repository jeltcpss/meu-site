<?php include 'componentes.php';?>
<nav class="navbar navbar-light bg-light shadow barra-menu p-3">
        <div class="container-fluid ">
           <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#modalMenu">
            <span class="navbar-toggler-icon"></span>
           </button>
           <h3>TeamSix Soluções </h3>
           <div class="dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            
            <img class="avatar" src="<?php echo $avatarDataUrl; ?>" alt="">
            
          
          </a>
          
            <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item HoverCinza" href="../dashboard.php">Dashboard</a></li>
            <li><a class="dropdown-item HoverCinza" href="perfil.php">Perfil</a></li>
            <li><a class="dropdown-item HoverCinza" href="logout.php">Logout</a></li>
            </ul>
          </div>
           
           
        </div>

        <div class="modal fade menu-mo " id="modalMenu" tabindex="-1" aria-labelledby="modalMenuLabel" aria-hidden="true">
          
            <div class="modal-dialog  modal-fullscreen">
              <div class="modal-content menu-mo">
                <div class="modal-header ">
                  <h1 class="modal-title fs-5" id="modalMenuLabel">TeamSix Admin</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mt-4">
                    <ul class="list-group list-group-flush">
                        <a class="list-group-item bi bi-speedometer2" href="dashboard.php"> DASHBOARD</a>
                        <a class="list-group-item" href="#">DASHBOARD</a>
                        <a class="list-group-item" href="#">DASHBOARD</a>
                       
        
        
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item ">
                <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseAleatorios" aria-expanded="false" aria-controls="flush-collapseAleatorios">
                <i class="bi bi-collection-play me-2"></i> Aleatorios
                </button>
              <div id="flush-collapseAleatorios" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <a class="list-group-item" href="#">DASHBOARD</a>
              <a class="list-group-item" href="#">DASHBOARD</a>
              <a class="list-group-item" href="#">DASHBOARD</a>
             </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseDownloads" aria-expanded="false" aria-controls="flush-collapseDownloads">
                 <i class="bi bi-cloud-download me-2"></i>  Downloads
                </button>
              <div id="flush-collapseDownloads" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <a class="list-group-item" href="#">DASHBOARD</a>
                <a class="list-group-item" href="#">DASHBOARD</a>
                <a class="list-group-item" href="#">DASHBOARD</a>
              </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseCreations" aria-expanded="false" aria-controls="flush-collapseCreations">
                <i class="bi bi-boxes me-2"></i> Criações
                </button>
              <div id="flush-collapseCreations" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <a class="list-group-item" href="#">DASHBOARD</a>
                <a class="list-group-item" href="#">DASHBOARD</a>
                <a class="list-group-item" href="#">DASHBOARD</a>
              </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseConsultas" aria-expanded="false" aria-controls="flush-collapseConsultas">
                <i class="bi bi-search me-2"></i> Consultas
                </button>
              <div id="flush-collapseConsultas" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <a class="list-group-item" href="#">DASHBOARD</a>
                <a class="list-group-item" href="#">DASHBOARD</a>
                <a class="list-group-item" href="#">DASHBOARD</a>
              </div>
            </div>
          </div>
             </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
        
        
        