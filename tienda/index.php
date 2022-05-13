<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/estilos.css?<?php echo time(); ?>" >

    
    <!-- Iconos --> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

    








</head>
<body>

<script  src="codes/aa.js"></script> 
    
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

 
    <div class="container-slider">
        <div class="slider" id="slider1">
            <div class="slider-section">slider-btn
                <img src="img/1.jpg" alt="#" class="slider-img">
            </div>
            <div class="slider-section">
                <img src="img/2.jpg" alt="#" class="slider-img">
            </div>
            <div class="slider-section">
                <img src="img/3.jpg" alt="#" class="slider-img">
            </div>
            <div class="slider-section">
                <img src="img/4.jpg" alt="#" class="slider-img">
            </div>
            
        </div>
        <div class="slider-btn slider_btn_right" id="btn-right" >&#62;</div>
        <div class="slider-btn slider_btn_left" id="btn-left" >&#60;</div>
    
    </div>
  
   
   









</body>
</html>