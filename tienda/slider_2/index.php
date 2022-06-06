<?php  
     include '../codes/connect.php';
  



    $querySlider = ("SELECT * FROM slider_imagenes ");
    $resultadoSlider = mysqli_query($mysqli, $querySlider);
    $variable = 1;
    foreach( $resultadoSlider as $row ){ 
        $imagenes[]= "img/$row[NOMBRE_IMAGEN]"; 
        $imagenes2[]= "'img/$row[NOMBRE_IMAGEN]'"; 
        $variable++;
    } 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  <!-- Ajax cdn jquery 3.6 -->
</head>

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
    <header class="main-header">

        <div class="slider_contenedor">
            <img id='slideshow2'  class="slider_img"                  src='<?php echo $imagenes[0]; ?>'  /> 
        </div>
        <br style='clear:both;'>
        <br style='clear:both;'>
    
        <br><br><br><br>
    
        </section>
    </header>


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

  
</body>

   
   











    


</html>