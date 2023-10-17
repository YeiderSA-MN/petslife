<!DOCTYPE html>
<html  lang="es">
    <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Petslife</title>
        <link rel="stylesheet" href="../styles/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            header {
                background-image: url(../img/sobrenosotros_fondo.jpeg);
                height: 700px;
                width: 100%;
                background-size: cover;
                background-position: center;
            }
        </style>
    </head>

    <body>

        <?php
            session_start();
            include_once "../functions/conexion_petslife.php";
        ?>
      
        <header>
            <?php include_once "../components/navbarUsuario.php" ?>
        </header>
        
       
        <section class="animals container">
            <div class="row">
            <article class="col-sm-12 col-xl-6 col-lg-6">
                <img src="../img/perropregunta.jpg" alt="">
            </article>
            
            <article class="col-sm-12 col-xl-6 col-lg-6">
                <h1>¿QUIENES SOMOS?</h1>
                <p>Somos un grupo de estudiantes entusiastas y comprometidos que se han unido para dar vida a un proyecto emocionante. A través de nuestra creatividad y conocimientos combinados, estamos desarrollando una solución innovadora que no solo explora nuevas tecnologías, sino que también busca hacer la vida de las personas y sus adoradas mascotas más cómoda y placentera. Nuestra diversidad de habilidades y la pasión que compartimos nos impulsa a superar desafíos y aportar un toque fresco a cada etapa del proceso. Este proyecto es el resultado de nuestro esfuerzo colaborativo y demuestra nuestro compromiso con la excelencia y la utilidad.</p>
            </article>
            </div>
        </section>
        
        <section class="gato-perro-hamster_container">
        <div style="width: 100%" class="row">
          <article class="icon-text col-lg-4 col-xl-4 col-sm-12">
                   <h3>Miguelangel</h3>
                   <p>Hola, mi nombre es Miguelangel Restrepo Grisales, nací en el 2007 y mi intereses por la programación empezó desde muy temprana edad, jugar con computadores y querer entender todo lo que se puede hacer con ellos me parece fantástico. Cada día intento aprender cosas nuevas y estoy dispuesto a introducirme mas en este mundo de la programación para cumplir muchas de mis metas, busco progresar constantemente como persona y como ciudadano, además amo trabajar en equipo y gozar de mis compañeros de trabajo.</p>
          </article>
          
          <article class="icon-text col-lg-4 col-xl-4 col-sm-12">
                    <h3>Yeider</h3>
                    <p>Como un estudiante de tan solo 16 años, mi apasionado interés por la programación se ha convertido en el centro de mi enfoque educativo y personal. Me he sumergido en el mundo de la codificación con una insaciable curiosidad, buscando constantemente nuevos desafíos y oportunidades para mejorar mis habilidades técnicas. Esta pasión no solo me ha permitido adquirir un profundo conocimiento en el campo, sino que también me ha brindado una perspectiva única sobre cómo la tecnología moldea nuestro mundo y su potencial para resolver problemas del mundo real.</p>
          </article>
          
          <article class="icon-text col-lg-4 col-xl-4 col-sm-12">
                    <h3>Juliana</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae doloremque eos sapiente, harum nisi asperiores voluptatum debitis, reiciendis exercitationem, earum placeat magni cupiditate illum doloribus provident quaerat excepturi sint ab.</p>
          </article>
        </div>
        </section>
      

        
        
        <footer class="footer">


            <h1>Contactenos</h1>
                
            <form id='miforma' action='../index.php' method='GET' >

            <label class="label" for='asunto'>Asunto:</label>
            <select id="asunto" name="asunto">
                <option value="A">Queja</option>
                <option value="B">Reclamo</option>
                <option value="C">Pregunta-Sugerencia</option>
            </select>
            <br><br>

            <label class="label" for='nombre'>Nombres Completos:</label>
            <input type='text' id='nombre' name='nombre' value='' required><br><br>

            <label class="label" for='tel'>Teléfono:</label>
            <input type='text' id='tel' name='tel' value='' required><br><br>


            <label class="label" for='correo'>Correo Electrónico:</label>
            <input type='email' id='correo' name='correo' value='' required><br><br>


            <label class="label" for='mensaje'>Mensaje:</label>
            <textarea  id='mensaje' name='mensaje' rows="10" cols="50" value='' required></textarea>
            <br><br>

            <input id='boton' type='submit' value='Enviar' ><br><br>



            </form>

        </footer>
        
        <section class="bottom-bar">
            <p> 2022 - 2023</p>
        </section>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

    </body>
</html>