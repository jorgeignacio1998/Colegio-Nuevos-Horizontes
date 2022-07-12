<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navside  Principal del Subdirector</title>
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
    width:390px;
}

.nav__link{
    color: #fff;
    display: block;
    padding: 15px 0;
    text-decoration: none;
    align-items: start; 
}
.nav__link__1{
    color: #fff;
    display: block;
    padding: 15px 0;
    text-decoration: none;
    align-items: start; 
    font-size: 1.2rem;
}

.nav__link__inside{
    border-radius: 6px;
    padding-left: 20px;
    color:#fff;
}

.nav__link__inside:hover {
background: #fff;
color: #212121;

}

.list{
    width: 70%;
    /* posicion altura */
    height: 90vh;      
     /* posicion altura */  
    display: flex;
    justify-content: center;
    flex-direction: column;
    border-radius: 0 16px 16px 0;
    background-color: #212121;  
}

.list__item{
    list-style: none;
    width: 100%;
    text-align: center;
     overflow: hidden; 
     /* esten separaditos */
     margin-top: 15px;
     color: #fff;
     margin-left: -50px;
     cursor: pointer;  
}

.list__item:hover {
     margin-left: -40px;
     cursor: pointer;
     color: steelblue;
     transition: .5s;
     
}

.list__item__click{
    cursor: pointer;
}

.list__button{
    display: flex;
    align-items: center;
    gap: 1em;
    width: 89%;
    margin: 0 auto; 
    font-size: 1.2rem;
}

.list__button:hover .fa-solid{
    color: steelblue;
    
}
.list__button:hover a{
    color: steelblue;
    
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
    width: 100%;
    margin-left: auto;
    border-left: 2px solid #fff;
    list-style: none;
    transition: height .4s;
    height: 0;
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
.menu-bars:hover i{
 
    color: steelblue ;
}

#nav-menu{
    background-color: #212121;
    width: 310px;
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

.nav-menu-items{
    width:100%;

}

.nav-icon{
    padding-right: 1rem;
    color: #909090;
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

.cerrar{
    font-family: 'Poppins', sans-serif;
    color: #fff;
    margin-right: 3%;
    text-decoration: none;
    font-size: 1.2rem;

}

.cerrar:hover{
    color: steelblue;
}

.fa-angle-right{
    color: #fff;
}

.inicio{
    padding-left: 23px;
    position: relative;
    top: 17px;
    
}


</style>


<body>


    <div id="navbar">
        <a href="#" class="menu-bars"  id="show-menu">
            <i class="fas fa-bars"></i>
       </a>
       <div class="ml-5">
            <a  href="../index.php">
            <img src="../../img/logo-educode-in.png" class="d-block ml-5" style="width: 30%;margin-left: 20px">
            </a>
        </div>
       <div class="  collapse navbar-collapse d-flex flex-row-reverse ">
           <a  class = "cerrar" href="../../codes/logout.php">Cerrar Sesión</a>
       </div>
    </div>


    
    <nav id="nav-menu">
        <ul class="nav-menu-items">
            <div id="navbar-toggle">
                <a href="#" class="menu-bars" id="hide-menu"> 
                    <i class="fas fa-bars nav-icon"></i> 
               </a>
            </div>

            <nav class="nav">
                <ul class="list">


                    <!-- 0   INICIO-->
                    <li class="list__item inicio">
                        <div class="list__button">
                            <a href="../index.php"  class="nav__link" >   <i class="fa-solid fa-book-bookmark">  </i> &nbsp; &nbsp;Inicio  </a >
                        </div>
                    </li>
                    <!-- 0   INICIO-->







                    <!-- Alumnos -->
                    <!-- <li class="list__item list__item--click" >
                        <div class="list__button list__button__click">
                           
                            <a href="#" class="nav__link" > </a >    <i class="fa-solid fa-book-open-reader"></i> Alumnos<i class=" list__arrow fa-solid fa-angle-right"></i>
                          
                        </div> -->
                        <!--  submenu -->
                        <!-- <ul class="list__show">
                            <li class="list__inside">
                                <a href="alumnos/index.php"  class=" nav__link nav__link__inside"  >Matricular alumno </a>
                            </li>
                            <li class="list__inside">
                                <a href="alumno_asignar/index.php"  class=" nav__link nav__link__inside"  >Asignar curso </a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- Alumnos -->






<style>
        .l1{
        padding-left: 23px;
        position: relative;
        top: -10px;
        
    }
    .l2{
        padding-left: 23px;
        position: relative;
        top: -2rem;
        
    }
    .l3{
        padding-left: 23px;
        position: relative;
        top: -3rem;
        
    }
    .l4{
        padding-left: 23px;
        position: relative;
        top: -4rem;
        
    }
    .l5{
        padding-left: 23px;
        position: relative;
        top: -5rem;
        
    }
    .l6{
        padding-left: 23px;
        position: relative;
        top: -6rem;
        
    }
    .l7{
        padding-left: 23px;
        position: relative;
        top: -7rem;
        
    }
</style>






                    

                    <!-- Mis Clases -->
                    <li class="list__item matriculas l1">
                        <div class="list__button">
                            <a href="../clases/index.php"  class="nav__link" >   <i class="fa-solid fa-book-bookmark">  </i> &nbsp; &nbsp;Mis Clases  </a >
                        </div>
                    </li>
                    <!-- Mis Clases -->

                    <!-- Horarios -->
                    <li class="list__item matriculas l2">
                        <div class="list__button">
                            <a href="../horarios/index.php"  class="nav__link" >   <i class="fa-solid fa-book-bookmark">  </i> &nbsp; &nbsp;Horarios  </a >
                        </div>
                    </li>
                    <!-- Horarios -->          
                




                </ul>

            </nav>
        </ul> 
    </nav>



    <!-- Este script es para que aparezca y desaparezca el sidebar -->
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
    <!-- Este script es para que aparezca y desaparezca el sidebar -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>          
</body>