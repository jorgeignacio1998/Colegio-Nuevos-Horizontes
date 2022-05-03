 <!-- Inicio del Navbar -->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    

 <nav class="navbar  navbar-expand-md border-primary navbar-dark bg-primary">
         <div class="container-fluid">
               <a href="welcome.php" class="navbar-brand">Admin</a>
               <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNav" >
                  <span class="navbar-toggler-icon"></span>
               </button>
               
               <div id="MenuNav" class="collapse navbar-collapse d-flex flex-row-reverse">
                  <ul class="navbar-nav" ms-3>
                     <!--  <li class="nav-item"> <a class="nav-link" href="perfil.php">Perfíl</a></li> -->
                     
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                           Opciones de soporte
                        </a>
                        <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="#">Gestionar usuarios</a></li>
                        <li> <a class="dropdown-item" href="#">Opcion 2</a></li>
                        <li> <a class="dropdown-item" href="#">Opcion 3</a></li>
                        <li> <a class="dropdown-item" href="#">Opcion 4</a></li>
                        <li> <a class="dropdown-item" href="../codes/logout.php">Cerrar sesión</a></li>
                        </ul>
                     </li>
                  </ul>
               </div>
         </div>
      </nav>
      
   
   <!-- Termino del Navbar  -->