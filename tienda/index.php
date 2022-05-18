<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="styles/estilos.css?<?php echo time(); ?>" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  <!-- Ajax cdn jquery 3.6 -->
   
    
    <!-- Iconos --> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

    








<body>

  
    <header class="main-header">
        <div class="container container-flex">

            <div class="main_header_container">
                <h1 class="main_header_title">GOGGLES</h1>
                <span class="icon-menu fa-solid fa-bars" id="btn-menu"></span>
                <nav class="main-nav" id="main-nav">
                    <ul class="menu " >
                        <li class="menu-item" > <a href="#" class="menu-link">HOME</a></li>
                        <li class="menu-item"><a href="#" class="menu-link">ABOUT</a></li>
                        <li class="menu-item"><a href="#" class="menu-link">FEATURES</a></li>
                        <li class="menu-item"><a href="#" class="menu-link">SHOP</a></li>
                        <li class="menu-item"><a href="#" class="menu-link">CONTACT</a></li>
                    </ul>
                </nav>
            </div>  

             <div class="main_header_container">
                <span class="main_header_txt">Need Help</span>
                <p class="main_header_txt"><i class="fa-solid fa-phone"></i>call +56988938757</p>
             </div>

             <div class="main_header_container">
                <i class="fa-solid fa-user"></i>
                <a class="main_header_btn" href="#">Mi carrito<i class="fa-solid fa-cart-shopping"></i></a >
                <input class="main_header_input" placeholder="Buscar..." type="search"><i class="fa-solid fa-magnifying-glass"></i>
            </div>

        </div>
    </header>
    <BR></BR>
    <div id="slideshow-principal">
        <div id="progress-bar-container">
            <div id="progress-bar"> </div>
        </div>
           
            <div id=slideshow>
                <img src="slider/img/1.jpg" id="img1" >
                <img src="slider/img/2.PNG" id="img2" >
                <img src="slider/img/3.jpg" id="img3" >
                <img src="slider/img/4.jpg" id="img4" >
                <img src="slider/img/5.jpg" id="img5" >
                <img src="slider/img/6.jpg" id="img6" >

            </div>
            <div id="indicadores">

            </div>
    </div>



    
    <main class="main">
        <h2 class="main-title">Nuevos productos</h2>
        <section class="container-products">
            <div class="product">

            </div>
        </section>
    </main>


  
   
   








<script src="slider/js/slider.js " ></script>
</body>
</html>