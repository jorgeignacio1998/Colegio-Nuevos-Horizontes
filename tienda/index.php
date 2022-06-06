<?php  
    include 'vistas/header.php';
    include 'codes/connect.php';
?>



 
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

 
    <br><br>
    

   

        <div class="slider_contenedor">
            <img id='slideshow2'  class="slider_img"  src='<?php echo $imagenes[0]; ?>'  /> 
        </div>
        <br style='clear:both;'>
        <br style='clear:both;'>

        <br><br><br><br>

        </section>

    


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




                <div class="product">
                    <img src="admin/productos/img/<?php    echo $row['FOTO'];      ?>" class="product__img" >         
                   
                    <div class="product__description">
                        <A href="producto/index.php?id_producto=<?php    echo $row['ID'];      ?>" class="product__title"> <h3> <?php    echo $row['NOMBRE'];      ?> </h3></A>
                        <span class="product__price">    <?php    echo '$'. $row['PRECIO'];      ?></span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
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
        });

    </script>
    <!-- slider javascript -->



</body>
</html>