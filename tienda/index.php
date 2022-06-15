<?php  
    include 'codes/connect.php';
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="styles/estilos.css?<?php echo time(); ?>" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  <!-- Ajax cdn jquery 3.6 -->
   
    <link rel="icon" type="image/png" href="img/icono.png">
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
                <a class="main_header_btn" href="carrito/index.php"                 >Mi carrito<i class="fa-solid fa-cart-shopping"></i>  </a >
                <input class="main_header_input" placeholder="Buscar..." type="search"><i class="fa-solid fa-magnifying-glass"></i>
            </div>

        </div>
    </header>



 
<style>
    
.slider_contenedor{
    position: relative;
    z-index: 999;
    height: 630px;
    
}

.slider_img{
    position: absolute;
    height: 100%;
    width: 100%;
    top:0;
    left:0;
    object-fit: cover;
}


.fade{
    animation-name: fade;
    animation-duration: .5s;
}
         
@keyframes fade {
    from {opacity: .4}
    to {opacity: 1}
}

.boton{
    background: darkmagenta;
    color: #fff;
    border: 2px solid transparent;
    border-radius: 50%;
    font-size: 1.3em;
    margin-top: 5px;



}

.boton:hover{
    cursor: pointer;
    color: gold;
    
}






</style>


<body>
    <?php  
        //Slider Obteniendo imagenes
    
        $querySlider = ("SELECT * FROM slider_imagenes ");
        $resultadoSlider = mysqli_query($mysqli, $querySlider);
        $variable = 1;
        foreach( $resultadoSlider as $row ){ 
            $imagenes[]= "slider_2/img/$row[NOMBRE_IMAGEN]"; 
            $imagenes2[]= "'slider_2/img/$row[NOMBRE_IMAGEN]'"; 
            $variable++;
           
        } 

         //Slider Obteniendo imagenes
    ?>



    <br><br><br>
    <div class="slider_contenedor ">

        

        
        <img id='slideshow2'  class="slider_img fade"  src='<?php echo $imagenes[0]; ?>'  /> 



      
    </div>
    <br style='clear:both;'>
    <br style='clear:both;'>
    <br><br><br><br>

       
    <main class="main">
        <div class="container">
            <h2 class="main-title">Nuevos productos</h2>
        </div>

           

        <section class="container-products">

            <?php
            $query = ("SELECT * FROM galeria INNER JOIN productos ON galeria.ID_PRODUCTO = productos.ID WHERE galeria.PRINCIPAL = 1");
            $resultado = mysqli_query($mysqli, $query);
            foreach( $resultado as $row ){ 
            ?>



            <!-- enviare los datos del form a este mismos -->

                <div class="product">
                    <img src="admin/productos/img/<?php    echo $row['FOTO'];      ?>" class="product__img" >         
                    
                    <div class="product__description">
                        <A href="producto/index.php?id_producto=<?php    echo $row['ID'];      ?>" class="product__title"> <h3> <?php    echo $row['NOMBRE'];      ?> </h3></A>
                        <span class="product__price">    <?php    echo '$'. $row['PRECIO'];      ?></span>
                    </div>

                    <a  class="boton agregar-al-carro" data-id="<?php echo $row['ID']; ?>"  href="javascript:;"> <i class="product__icon fa-solid fa-cart-plus"></i>   </a>
                </div>


            
            
            <?php  } ?>
            

        </section>
 
    </main>
    <br><br><BR> <BR> </BR></BR>






    

    <footer class="main-footer">
        <div class="footer__section">
            <h2 class="footer__title">About Us</h2>
            <p class="footer__txt">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, possimus
                 suscipit commodi quisquam, ducimus
                 ad numquam facilis recusandae perferendis, autem aperiam voluptatem.
            </p>
        </div>
        <div class="footer__section">
            <h2 class="footer__title">Location:</h2>
            <p class="footer__txt"> Avenida siempre viva #123, California.</p>
        </div>
        <div class="footer__section">
            <h2 class="footer__title">Contacto</h2>
            <p class="footer__txt"> +569 88938757</p>
            <p class="footer__txt"> Email: dqwiudfhef@gmail.com</p>
            <p class="footer__txt"> </p>
        </div>
        
            
       

    </footer>


   

  
   
   



    <!-- slider javascript -->
    <script>
            const imagenes = [<?php echo implode(',', $imagenes2); ?>]
        $(document).ready( function(){
            $( imagenes ).each(function( index ) { 
                setTimeout(() => {  
                    $('#slideshow2').attr('src', imagenes[index])
                }, 4000 * index)
            });


            
            $('.agregar-al-carro').click(function(){
                var id = $(this).attr('data-id');
                $.get('/tienda/carrito/index.php?id='+id+'&qty=1');
                alert('agregado');
            });
        });






    </script>
    <!-- slider javascript -->



</body>
</html>