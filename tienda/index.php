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
                <h1 class="main_header_title">MY SUNGLASSES</h1>
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




    <br><br>
    <div id="slideshow-principal">
        <div id="progress-bar-container">
            <div id="progress-bar"> </div>
        </div>
           
            <div id=slideshow>
                <img class="dd" src="slider/img/1.jpg" id="img1" >
                <img class="dd" src="slider/img/2.PNG" id="img2" >
                <img class="dd" src="slider/img/3.jpg" id="img3" >
                <img class="dd" src="slider/img/4.jpg" id="img4" >
                <img class="dd" src="slider/img/5.jpg" id="img5" >
                <img class="dd " src="slider/img/6.jpg" id="img6" >
            </div>
            <div id="indicadores">

            </div>
    </div>
<br><br><br><br>




    
    <main class="main">
            <div class="container">
                <h2 class="main-title">Nuevos productos</h2>
            </div>
            <section class="container-products">
                <div class="product">
                    <img src="img/prod2/b1.PNG" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">Hot Summer 2022</h3>
                        <span class="product__price"></span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div>
                <div class="product">
                    <img src="img/prod2/b2.PNG" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">Just me 2020</h3>
                        <span class="product__price"></span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div>
                <div class="product">
                    <img src="img/prod2/b3.PNG" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">Dirty show s9</h3>
                        <span class="product__price"></span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div>
                <div class="product">
                    <img src="img/prod2/b4.PNG" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">Sunglasses AK-47 </h3>
                        <span class="product__price"></span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div>





                <div class="product">
                    <img src="img/prod2/b5.PNG" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">Hot Summer 2022</h3>
                        <span class="product__price"></span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div>
                <div class="product">
                    <img src="img/prod2/b6.PNG" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">Just me 2020</h3>
                        <span class="product__price"></span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div>
                <div class="product">
                    <img src="img/prod2/b7.PNG" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">Dirty show s9</h3>
                        <span class="product__price"></span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div>
                <div class="product">
                    <img src="img/prod2/b8.PNG" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">Sunglasses AK-47 </h3>
                        <span class="product__price"></span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div>

            </section>
    </main>


  
   
   








<script src="slider/js/slider.js " ></script>
</body>
</html>