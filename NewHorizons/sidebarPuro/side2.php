<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/d8159ea47a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> 
</head>




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

/* primer navside */

@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Roboto:wght@700&display=swap');


hr{
background-color: #464646;
}

#navbar{
    background-color: #212121;
    height: 60px;
    display: flex;
    justify-content: start;
    align-items: center;
    
  
}

.menu-bars{
    margin-left: 2rem;
    font-size: 2rem;
    color: #fff;
}

#nav-menu{
    background-color: #212121;
    width: 250px;
    height: 100vh;
    display: flex;
    justify-content:center;
    position: fixed;
    top:0;
    left: -100% ;
    transition: 850ms;
    z-index:+99999;
   
}

#nav-menu.active{
    left:0;
    transition: 350ms;
}

.nav-text{

    display: flex;
    justify-content: start;
    list-style: none;
    height: 50px;
    padding: 1rem;
}

.nav-text a {
    text-decoration: none;
    color: #fff;
    font-size: 1.2rem;
    margin-left: 1rem;
}


.nav-text2{

    display: flex;
    justify-content: start;

    list-style:none;
    height: 70px;
    width: auto;
    padding: 1rem;
    background-color: #212121;
    border: solid 1px #fff;
    
    align-items: center;
    margin-left: -18%;
    margin-top: 5% ;
}



.nav-menu-items2{
    width:74%;
    height: 50%;
    margin:0;
    padding: 0;
    background-color: #212121;
    top: 0;
   
    
   
    
}

.nav-text2:hover {
    text-decoration: none;
    color: #fff;
    font-size: 1.2rem;
    background-color: #464646;
    cursor: pointer;
    
}

.nav-text:hover {
background-color: rgba(144,144,144, 0.219);
cursor: pointer;

}



.nav-menu-items{
    width:100%;

}


.nav-icon{
    padding-right: 1rem;
    color: #909090;
}

#logo{
    color:#464646;
    padding-right:0.2rem;
}

#navbar-toggle{
    background-color: #212121;
    width: 100%;
    height: 65px;
    display: flex;
    justify-content: start;
    align-items: center;
    
}

navbar-toggle h1{
    color: #fff;
   
}

navbar-toggle a {
    text-decoration: none;}

.fa-bars{
    color: #fff;
}

#hide-menu{
    margin-left:5px;
}

/* iconos */
.fa-solid{
    color: #fff;
    margin-right: 15px;
}

.nav-section{
    height: 500px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.cerrar{
    font-family: 'Poppins', sans-serif;
    color: #fff;
    margin-right: 3%;
    text-decoration: none;
    font-size: 1.2rem;
    
  
    
   
}

.cerrar:hover{
    color: orangered;
}




</style>







<body>










    <div id="navbar">
        <a href="#" class="menu-bars"  id="show-menu">
            <i class="fas fa-bars"></i>
       </a>
       <div class="  collapse navbar-collapse d-flex flex-row-reverse ">
           <a  class = "cerrar" href="">Cerrar sesion</a>
       </div>
    </div>


    








    <nav id="nav-menu">
        <ul class="nav-menu-items">
            <div id="navbar-toggle">
                <a href="#" class="menu-bars" id="hide-menu"> 
                    <i class="fas fa-bars nav-icon"></i> 
               </a>
            </div>









           
            <div class="nav-section">
                <li  class="nav-text"><a  href="asignaturas.php">   <i class="fa-solid fa-book-bookmark"> </i >chao</a></li>
            </div>
            
        </ul>
        
                   
      
    </nav>





<!-- 
    el negro -->




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



    <!-- Este script es para que aparezca y desaparezca el sidebar -->
    <script>

    const openMenu = document.querySelector('#show-menu')

    const hideMenuIcon = document.querySelector('#hide-menu')

    const sideMenu = document.querySelector('#nav-menu')

    openMenu.addEventListener('click', function(){
        sideMenu.classList.add('active')
    })

    hideMenuIcon.addEventListener('click', function(){
        sideMenu.classList.remove('active')
    })

    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
        
</body>