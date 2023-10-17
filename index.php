<!DOCTYPE html>
<html  lang="es">
    <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Petslife</title>
        <link rel="stylesheet" href="styles/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

                <?php
                if (!empty($_GET["mensaje"]) && !empty($_GET["nombre"]) )

                {

                    $recibe =$_GET["correo"];
                    $asunto = "Contacto con Petslife"; 
                    $cuerpo = "Se recibe correo con el siguiente contenido:  ".$_GET["asunto"].",".$_GET["mensaje"].",".$_GET["nombre"].",".$_GET["tel"].",".$_GET["correo"];
                    $envia = "From:".$_GET["correo"]."";
                    if(mail($recibe, $asunto, $cuerpo, $envia) && mail("petslifeproyect@gmail.com",$asunto,$cuerpo,$envia)){
                        
                        unset($_GET["mensaje"]);
                        unset($_GET["nombre"]);
                        unset($_GET["mensaje"]);
                        unset($_GET["correo"]);
                        header("location: screens/contactenos.php");
                            
                    }
                    else{
                        echo "Lo lamento el correo no se envió con exito revise de nuevo los datos";
                    }

                }
                ?>

            <?php
              session_start();
              include_once "functions/conexion_petslife.php";
            ?>
      
        <header>
            <?php include_once "components/navbarIndex.php" ?>
        </header>
        
       
        <section class="animals container">
            <div class="row">
            <article class="col-sm-12 col-xl-6 col-lg-6">
                <img src="../img/hanna.jpeg" alt="">
            </article>
            
            <article class="col-sm-12 col-xl-6 col-lg-6">
                <h1>BIENVENIDO</h1>
                <p>Bienvenido a PetsLife, tu destino definitivo para el cuidado integral de tus mascotas.
                    Nuestra plataforma te ofrece una experiencia única al combinar servicios de peluquería,
                    relajante spa y cuidada guardería, junto con una amplia selección de productos de alta
                    calidad para el bienestar de tus compañeros peludos. Simplificamos tu vida al brindarte
                    todo lo que necesitas para mantener a tus mascotas felices y saludables en un solo lugar en
                    línea. Únete a nosotros y descubre cómo PetsLife está transformando la manera en que
                    interactuamos con nuestros amigos de cuatro patas.
                </p>
            </article>
            </div>
        </section>
        
        <section class="gato-perro-hamster_container">
        <div style="width: 100%" class="row">
          <article class="icon-text col-lg-4 col-xl-4 col-sm-12">
                   <h3>GATOS</h3>
                   <p>El gato doméstico​​, llamado más comúnmente gato, y de forma coloquial minino, ​ michino, ​ michi, ​ micho, ​ mizo, ​ miz, ​ morroño​ o morrongo, ​ y algunos nombres más, es un mamífero carnívoro de la familia Felidae. Es una subespecie domesticada por la convivencia con el ser humano.</p>
          </article>
          
          <article class="icon-text col-lg-4 col-xl-4 col-sm-12">
                    <h3>PERROS</h3>
                    <p>El perro, ​​​ llamado perro doméstico o can, ​ y en algunos lugares coloquialmente llamado chucho, ​ tuso, ​ choco, ​ entre otros; es un mamífero carnívoro de la familia de los cánidos, que constituye una especie del género Canis.</p>
          </article>
          
          <article class="icon-text col-lg-4 col-xl-4 col-sm-12">
                    <h3>HÁMSTERES</h3>
                    <p>Los cricetinos son una subfamilia de roedores, conocidos comúnmente como hámsteres.​​ Se han identificado diecinueve especies actuales, agrupadas en siete géneros. La mayoría son originarias de Oriente Medio y del sureste de los Estados Unidos.</p>
          </article>
        </div>
        </section>


        
        
        <footer class="footer">


            <h1>Contactenos</h1>
                 
            <form id='miforma' action='index.php' method='GET' >

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