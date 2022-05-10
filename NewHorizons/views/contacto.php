


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contacto</title>
    <link rel="stylesheet" type="text/css" href="../styles/s1.css" >
    <script src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   
</head>




<body> 

    <form   action="../codes/mailer_contacto.php" method="POST"  enctype="multipart/form-data "   class="form-register"  id="formid">


                                     <h4  id="_titulo">Contacto</h4>

            <input    type="text" name="nombre"    placeholder="Nombre"   id="_nombre">

            <input    type="email" name="email"    placeholder="Correo electronico"   id="_email"           required  > 

            <textarea              name="mensaje"  placeholder="Mensaje" id="_mensaje"           required ></textarea   >  


            <!--<label for='_archivo'>INGRESAR ARCHIVO(S)</label>
            <input type="file"  name="archivo[]" multiple id="_archivo" style='display:none;'> -->
  

            <br><br>
            <input type="submit" value="Enviar" id="_boton"> 
  

    </form>
        

    <?php 
       include("../codes/mailer_contacto.php");
       
?>





   <!-- este codigo es para hacerlo sin que se refresque la pagina -->


    <!-- <script type="text/javascript">

        $(document).ready(function() {
        $('#formid').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'correo.php',
            data: $(this).serialize(),
            success: function(data)
            {
                console.log('exito')

                if(data){
                    location.href = '#';

                }
 
                // user is logged in successfully in the back-end
                // let's redirect
                
                else
                {
                    alert('Error, formulario no enviado');
                }
           },
           error: function(result) {
            alert('error');
        }

       });
     });
});

    </script> -->


</body>
</html>