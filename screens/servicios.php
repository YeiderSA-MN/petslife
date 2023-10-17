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
                background-image: url(../img/servicios_fondo.jpeg);
                height: 700px;
                width: 100%;
                background-size: cover;
                background-position: center;
            }

            .icon-text {
                align-items: center;
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
        
        
        <section class="gato-perro-hamster_container">
        <div style="width: 100%" class="row">
      
          <article class="icon-text col-lg-6 col-xl-6 col-sm-12">
                    <h3>Spa</h3>
                    <p>El servicio de spa de nuestra página web es una experiencia excepcional diseñada para mimar y relajar a tus queridas mascotas. En nuestro spa, ofrecemos una amplia gama de tratamientos de bienestar que están diseñados pensando en el confort y la felicidad de tus compañeros peludos. Desde relajantes masajes hasta terapias especializadas, nuestros terapeutas expertos se aseguran de que cada mascota reciba un tratamiento personalizado. Además, nuestras instalaciones están diseñadas pensando en la comodidad y la tranquilidad de las mascotas, creando un ambiente acogedor y seguro. En PetsLife, el spa es un lugar donde las mascotas pueden rejuvenecer, liberar el estrés y sentirse mimadas, brindándoles una experiencia de bienestar inigualable.</p>
          </article>
          
          <article class="icon-text col-lg-6 col-xl-6 col-sm-12">
                    <h3>Entrenamiento</h3>
                    <p>Nuestro servicio de entrenamiento es una oportunidad excepcional para que tus mascotas desarrollen sus habilidades, socialicen y se diviertan al mismo tiempo. En PetsLife, entendemos la importancia de un entrenamiento adecuado para el bienestar y la seguridad de las mascotas, por lo que ofrecemos clases personalizadas a cargo de entrenadores altamente calificados. Desde ejercicios básicos de obediencia hasta entrenamientos especializados, adaptamos cada sesión según las necesidades y habilidades individuales de tu mascota. Además, fomentamos un ambiente de aprendizaje positivo y enriquecedor donde las mascotas pueden interactuar con otros compañeros y disfrutar de un desarrollo saludable. Nuestro objetivo es proporcionar un entrenamiento que fortalezca el vínculo entre dueños y mascotas, creando una relación más fuerte y armoniosa en el hogar. Con PetsLife, el entrenamiento se convierte en una experiencia enriquecedora y divertida para todos.</p>
          </article>
        </div>
        </section>


        <section class="gato-perro-hamster_container">
        <div class="row">
          <article class="icon-text col-lg-12 col-xl-12 col-sm-12">
                    <h2>Agendar una cita</h2>
                    <?php

                    if(isset($_SESSION['loggedin'])){?>
                        <button onclick="location.href='agenda.php'" class="button-17">AGENDAR CITA</button>
                    <?php }else{?>
                        <button onclick="location.href='loginRegistro.php'" class="button-17">INICIE SESION</button>
                    <?php }?>
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