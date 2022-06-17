
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>slider</title>
    
   
</head>

<style>

</style>



<body>
    <div id="slideshow-principal">
        <div id="progress-bar-container">
            <div id="progress-bar"> </div>
        </div>
           
            <div id=slideshow>
                <img src="img/1.jpg" id="img1" >
                <img src="img/2.jpg" id="img2" >
                <img src="img/3.jpg" id="img3" >
                <img src="img/4.jpg" id="img4" >
                <img src="img/5.jpg" id="img5" >
                <img src="img/6.jpg" id="img6" >
            </div>
            <div id="indicadores">

            </div>
    </div>






<!-- Javascript slider  -->
    <script>

    addEventListener('DOMContentLoaded',()=> {

    const imagenes = ['slider_1/img/1.jpg','slider_1/img/2.jpg','slider_1/img/3.jpg','slider_1/img/4.jpg','slider_1/img/5.jpg','slider_1/img/6.jpg'];

    let i = 1
    const img1 = document.querySelector('#img1')
    const img2 = document.querySelector('#img2')
    const img3 = document.querySelector('#img3')
    const img4 = document.querySelector('#img4')
    const img5 = document.querySelector('#img5')
    const img6 = document.querySelector('#img6')


    const progressBar = document.querySelector('#progress-bar')
    const divIndicadores = document.querySelector('#indicadores')
    let porcentaje_base = 100/imagenes.length
    let porcentaje_actual = porcentaje_base

    for (let index = 0; index < imagenes.length; index++) {
    const div = document.createElement('div')
    div.classList.add('circles')
    div.id = index 
    divIndicadores.appendChild(div)
    }

    progressBar.getElementsByClassName.width = `${porcentaje_base}%`
    img1.src = imagenes[0]
    const circulos = document.querySelectorAll('.circles')
    circulos[0].classList.add('resaltado')

    const slideshow = () => {
    img2.src = imagenes[i]  
    const circulo_actual = Array.from(circulos).find(el => el.id == i)
    Array.from(circulos).forEach(cir => cir.classList.remove('resaltado'))
    circulo_actual.classList.add('resaltado')

    img2.classList.add('active')
    i++
    porcentaje_actual+=porcentaje_base
    progressBar.style.width = `${porcentaje_actual}%`
    if(i == imagenes.length){
        i = 0
        porcentaje_actual = porcentaje_base - porcentaje_base
    }

    setTimeout(() => {
        img1.src = img2.src
        img2.classList.remove('active')
    },1000)
    } 


    setInterval(slideshow, 4000)


    }) 
    </script>
<!-- Javascript slider  -->



</body>
</html>


