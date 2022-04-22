


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulario</title>
    <link rel="stylesheet" type="text/css" href="estilo.css" >

    <script src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="assets/jquery.rut.js"></script>  


    
    <script>
    $(function() {
        $("#_rut").rut().on('rutValido', function(e, rut, dv) {
           $('#_rut').attr('style','border-color:green');
           $('#_boton').removeClass('estilo_deshabilitado').removeAttr('disabled')
        });

        $("#_rut").rut().on('rutInvalido', function(e) {
           $('#_rut').val('').attr('style','border-color:red');
           $('#_boton').addClass('estilo_deshabilitado').attr('disabled','disabled')
        }); 

        $('#_boton').click(function(){ 


        })
    })
    </script>
    <style>
        .estilo_deshabilitado { background:#aaa!important; }
        label[for=_archivo]{ background:green;color:#fff;padding:5px 10px; border-radius:5px; font-size:20px }
    </style>
</head>




<body> 

    <form   action="registro.php" method="POST"  enctype="multipart/form-data "   class="form-register"  id="formid">
    
            <h4  id="_titulo">Contacto</h4>
            <input  label="_nombre"  type="text" name="nombre"    placeholder="Nombre"   id="_nombre">
            

            <input  label="_rut" type="text" name="rut"  value=""  placeholder="Rut" id="_rut" >


            <input   label="_telefono" type="text" name="telefono"  placeholder="Telefono"  id="_telefono" >
            <input   label="_email" type="email" name="email"    placeholder="Email"   id="_email">
            <input   label="_asunto" type="text" name="asunto"    placeholder="Asunto"   id="_asunto">
            <textarea label="_mensaje" name="mensaje"  placeholder="Mensaje" id="_mensaje" ></textarea  >  


            <!--<label for='_archivo'>INGRESAR ARCHIVO(S)</label>
            <input type="file"  name="archivo[]" multiple id="_archivo" style='display:none;'> -->
  

            <br><br>
            <input type="submit" value="Enviar" id="_boton" disabled class='estilo_deshabilitado' > 
  

    </form>
        



    <?php
        include("correo.php");
        include("registro.php");
        
    ?> 



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