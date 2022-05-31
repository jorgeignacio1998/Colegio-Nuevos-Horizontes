<?php  
    include 'vistas/header.php';
    include 'codes/connect.php';
?>


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

                <?php
                $query = ("SELECT * FROM galeria INNER JOIN productos ON galeria.ID_PRODUCTO = productos.ID WHERE galeria.PRINCIPAL = 1");
                $resultado = mysqli_query($mysqli, $query);
                foreach( $resultado as $row ){ 
                ?>




                <div class="product">
                    <img src="admin/productos/img/<?php    echo $row['FOTO'];      ?>" class="product__img" >         
                   
                    <div class="product__description">
                        <h3 class="product__title">  <?php    echo $row['NOMBRE'];      ?>  </h3>
                        <span class="product__price">    <?php    echo '$'. $row['PRECIO'];      ?></span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div>


                <?php  } ?>


            </section>








<!-- 
                <div class="product">
                    <img src="img/prod2/b2.PNG" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">Just one Sec 2020</h3>
                        <span class="product__price">$49.990</span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div>
                <div class="product">
                    <img src="img/prod2/b3.PNG" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">Dirty Light s900</h3>
                        <span class="product__price">$35.990</span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div>
                <div class="product">
                    <img src="img/prod2/b4.PNG" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">Sunglasses AK-47 </h3>
                        <span class="product__price">$45.990</span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div>





                <div class="product">
                    <img src="img/prod2/b5.PNG" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">Forever alone Forza Edition</h3>
                        <span class="product__price">$33.990</span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div>
                <div class="product">
                    <img src="img/prod2/b6.PNG" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">Can't Dodge Dude!</h3>
                        <span class="product__price">$29.990</span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div>
                <div class="product">
                    <img src="img/prod2/b7.PNG" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">Big Time Valentine</h3>
                        <span class="product__price">$35.990</span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div>
                <div class="product">
                    <img src="img/prod2/b8.PNG" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">Never Surrender VIP</h3>
                        <span class="product__price">$79.990</span>
                    </div>
                    <i class="product__icon fa-solid fa-cart-plus"></i>
                </div> -->

           
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



  
   
   








<script src="slider/js/slider.js " ></script>
</body>
</html>