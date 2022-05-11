<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>SIDE BAR con boostrap</title>
</head>



<body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>




<div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <aside class="col-12 col-md-3 col-xl-2 p-0 bg-dark flex-shrink-1">
            <div class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row align-items-center py-2 text-center sticky-top " id="sidebar">
                <div class="text-center p-3">
                    <img src="../images/1.jpg" class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow" alt="profile picture">  
                    <a href="" class="navbar-brand mx-0 font-weight-bold text-nowrap"> hola mundo</a>
                </div>
                <button type="button" class="navbar-toggler border-0 order-1" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="menu" >
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse order-last" id="nav">
                    <ul class="navbar-nav flex-column w-100 justify-content-center">
                        <li class="nav-items">
                            <a href="#" title="" class="nav-link "> editar perfil</a>
                        </li>
                        <li class="nav-items">
                            <a href="#" title="" class="nav-link"> proyectos</a>
                        </li>
                        <li class="nav-items">
                            <a href="#" title="" class="nav-link"> cosas mas</a>
                        </li>
                        <li class="nav-items">
                            <a href="#" title="" class="nav-link"> usuarios </a>
                        </li>
                        </ul>
                </div>
            </div>
        </aside>
        <main class="col px-0 flex-grow-1"> 
            <div class="container py-3">
                <article> 
                    <h1 class="font-weight-light">Hola me llamo jorge</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus tempora dicta optio eum hic ducimus facilis quisquam a itaque repellendus ipsa doloremque, sed rerum repudiandae quis officiis, ipsam, distinctio deleniti.</p>
                </article>
            </div>
        </main>
     </div>
</div>
</body>

</html>









