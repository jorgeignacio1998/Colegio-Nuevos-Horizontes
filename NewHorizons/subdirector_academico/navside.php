<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOSTRAP -->
  
       <!-- ni idea pero necesario creo -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous">
      <!-- ni idea pero necesario  creo -->
    <script src="https://kit.fontawesome.com/d8159ea47a.js" crossorigin="anonymous"></script>
    <title>Inicio</title>
  </head>



<style>

@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Roboto:wght@700&display=swap');


*{
    box-sizing: border-box;
    margin:0;
    padding: 0;
    font-family: 'arial', 'sans-serif;';
}

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
    height: 100px;
    display: flex;
    justify-content: start;
    align-items: center;
}

navbar-toggle h1{
    color: #fff;
    font-family: 'Roboto', 'sans-serif;';
}

navbar-toggle a {
    text-decoration: none;}

.fa-bars{
    color: #fff;
}

/* iconos */
.fa-solid{
    color: #fff;
    margin-right: 15px;
}

.nav-section{
    height: 200px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.cerrar{
   
    justify-content: end;
    position: absolute;
    
}



</style>









<body>
    <div id="navbar">
        <a href="#" class="menu-bars"  id="show-menu">
            <i class="fas fa-bars"></i>
       </a>
       <div class="collapse navbar-collapse d-flex flex-row-reverse">
           <li class="cerrar"><a href="../codes/logout.php"><i class="fa-solid fa-right-from-bracket  " >Cerrar sesion</i>
       </div>
    </div>
    <nav id="nav-menu">
        <ul class="nav-menu-items">
            <div id="navbar-toggle">
                <a href="#" class="menu-bars" id="hide-menu"> 
                    <i class="fas fa-bars nav-icon"></i> 
               </a>
               
            
                </a>
            </div>
            <hr>
            <div class="nav-section">
                <li  class="nav-text"><a  href="asignaturas.php">   <i class="fa-solid fa-book-bookmark"> </i >Asignaturas</a></li>
                <li class="nav-text"><a href="asignar_asignatura.php"> <i class="fa-solid fa-book-bookmark">  </i>Asignar Asignaturas</a></li>
                <br>
                <li class="nav-text"><a href="#"><i class="fab fa-youtube nav-icon"></i>Subcriptions</a></li>
            </div>
            <hr>
            <div class="nav-section">
                <li class="nav-text"><a href="#"><i class="fas fa-home nav-icon"></i>esquisde </a></li>
                <li class="nav-text"><a href="#"><i class="fas fa-fire nav-icon"></i>etcc </a></li>
                <li class="nav-text"><a href="#"><i class="fab fa-youtube nav-icon"></i>Subcriptions</a></li>




                <li class="nav-text">
                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Profesores</a>
                        <ul class="dropdown-menu nav-menu-items2 ">
                            <li class="nav-text2"> <a  href="NewHorizons/">Asignar profesor</a> </li>
                            <li class="nav-text2"> <a  href="NewHorizons/">Opcion 2</a></li>
                            <li class="nav-text2"> <a  href="NewHorizons/">Opcion 3</a></li>
                       </ul>
                    </li>



            </div>
        </ul>
        
                   
      
    </nav>

               
            


           













    <!-- <script src="../components/c_sidebar2.js"></script> -->

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




    


</body>
</html>