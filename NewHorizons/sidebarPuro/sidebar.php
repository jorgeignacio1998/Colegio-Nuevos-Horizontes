<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<!-- ESTILOS -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing: border-box;
}


body{
    font-family: 'Poppins', sans-serif;
}


.nav{
    width:300px;
}

.nav__link{
    color: #303440;
    display: block;
    padding: 15px 0;
    text-decoration: none;
    align-items: start;
}

.nav__link__inside{
    border-radius: 6px;
    padding-left: 20px;
}

.nav__link__inside:hover{
background: #fff;

    
}




.list{
    width: 100%;
    /* posicion altura */
    height: 60vh;      
     /* posicion altura */  
    display: flex;
    justify-content: center;
    flex-direction: column;
    border-radius: 0 16px 16px 0;
    background: #fff;
    
    
}

.list__item{
    list-style: none;
    width: 100%;
    text-align: center;
     overflow: hidden; 
     /* esten separaditos */
     margin-top: 15px;
}

.list__item__click{
    cursor: pointer;
}

.list__button{
    display: flex;
    align-items: center;
    gap: 1em;
    width: 70%;
    margin: 0 auto;
}


.arrow .list__arrow{
    transform: rotate(90deg);
}

.list__arrow{
    margin-left:auto;
    transition: transform .3s;

}




.list__inside{
    list-style: none;
}

.list__show{
    width: 80%;
    margin-left: auto;
    border-left: 2px solid #303440;
    list-style: none;
    transition: height .4s;
    height: 0;
}



</style>
<!-- ESTILOS -->



<body>
    
    <nav class="nav">
        <ul class="list">
            <li class="list__item">
                <div class="list__button">
                    <img src="svg/dashboard.svg" class="list__img">
                    <a href="#"  class="nav__link" >Inicio   </a >
                </div>
            </li>
            <li class="list__item list__item--click" >
                <div class="list__button list__button__click">
                    <img src="svg/book.svg" class="list__img">
                    <a href="#" class="nav__link" >Asignaturas   </a >
                    <img src="svg/arrow.svg" class="list__arrow">
                </div>
                <!-- submenu -->
                <ul class="list__show">
                    <li class="list__inside">
                        <a href="#"  class=" nav__link nav__link__inside"  >Asignar Profesor   </a>
                    </li>
                    <li class="list__inside">
                        <a href="#" class=" nav__link nav__link__inside" >opcion 2  </a >
                    </li>
                    
                </ul>



            </li>
            <li class="list__item">
                <div class="list__button">
                    <img src="svg/book.svg" class="list__img">
                    <a href="#" class="nav__link" >estadisticas   </a >
                </div>
            </li>
            <li class="list__item list__item__lick">
                <div class="list__button list__button__click">
                    <img src="svg/book.svg" class="list__img">
                    <a href="#" class="nav__link" >Profesores   </a >
                    <img src="svg/arrow.svg" class="list__arrow">
                </div>
                <!-- submenu -->
                <ul class="list__show">
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link__inside">Asignar curso   </a >
                    </li>
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link__inside" >Clases  </a >
                    </li>
                    
                </ul>



            </li>

        </ul>
    </nav>



    <script>
        let listElements = document.querySelectorAll('.list__button__click');

        listElements.forEach(listElement => {
            listElement.addEventListener('click', ()=>{
                
                listElement.classList.toggle('arrow');

                let height = 0;
                let menu = listElement.nextElementSibling;
                
                if(menu.clientHeight == "0"){
                    height=menu.scrollHeight;
                }

                menu.style.height = `${height}px`;
            })
        })


    </script>






</body>
</html>