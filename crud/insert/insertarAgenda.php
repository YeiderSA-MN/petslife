<?php 

// Conexion del server
$con = mysqli_connect ('localhost', 'root', '', 'petslife');
 if (!$con)
 {
	 echo 'Error de conexión';
 }
mysqli_select_db($con, 'petslife') or die(mysqli_error($con));
session_start();
	 
//Funcion para obtener los datos en un solo array
function getPosts(){

    $posts = array();
    $posts[0] = $_POST['servicio'];
    $posts[1] = $_POST['local'];
    $posts[2] = $_POST['mascota'];
    $posts[3] = $_POST['fecha'];
    $posts[4] = $_POST['hora'];
    $posts[5] = $_SESSION['cedula'];
	return $posts;
}


	//Guarda el array en $data
	$data = getPosts();

  //Define un query en el que se trae la informacion con la informacion del array
	$existing_Query ="SELECT * FROM registro where id_mascota=$data[2] and fecha='$data[3]' and hora='$data[4]'";
  //Realiza el query
	$existing_Result = mysqli_query($con, $existing_Query);

  //Si hay minimo un registro existente manda una alerta
  if(0 < mysqli_num_rows ($existing_Result)){
		  echo '<script type="text/javascript">
                      alert("Ya existe una cita a esa hora para el usuario. Seleccione otra.");
                         window.location="../../screens/agenda.php";
                           </script>';
	} 
  //Si no hay hace el insert
   else{
    $insert_Query = "INSERT INTO registro (id_registro, id_servicio, id_local, id_mascota, fecha, hora) 
    VALUES ('00', '$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]')";
    

      //realiza el query
      $insert_Result = mysqli_query($con, $insert_Query);
        
      //lo ejecuta y manda las alertas
      if ($insert_Result) {
          echo "<script type='text/javascript'>
                          alert('Nueva cita agregada exitosamente');
                            window.location='../../screens/index.php';
                              </script>";
        } else {
          echo "<script type='text/javascript'>
                          alert('Cita no insertada!');
                            window.location='../../screens/agenda.php';
                              </script>";
        }
      }
  

?>