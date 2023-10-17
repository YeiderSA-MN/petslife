<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/registro.css">
    <title>Login</title>
</head>
<body>
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrarse</label>
		<div class="login-form">
			<form id="login" action="loginRegistro.php">
			<div class="sign-in-htm">
				<div class="group">
					<label for="userLogin" class="label">Cedula</label>
					<input id="userLogin" name="userLogin" type="text" class="input">
				</div>
				<div class="group">
					<label for="passLogin" class="label">Contraseña</label>
					<input id="passLogin" name="passLogin" type="password" class="input" data-type="password">
				</div>
                <br>
				<div class="group">
					<input type="submit" class="button" value="Iniciar Sesión">
				</div>
				<div class="hr"></div>
			</form>

			</div>
			<form id="registro" action="../crud/insert/insertarRegistro.php" method="POST">
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Cedula</label>
					<input id="user" name="cedula" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Contraseña</label>
					<input id="pass" name="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="numero" class="label">Telefono</label>
					<input id="numero" name="numero" type="text" class="input">
				</div>
				<div class="group">
					<label for="nombre" class="label">Nombre</label>
					<input id="nombre" name="nombre" type="text" class="input">
				</div>
				<div class="group">
					<label for="apellido" class="label">Apellido</label>
					<input id="apellido" name="apellido" type="text" class="input">
					<input type="hidden" name="local" value="0000">
					<input type="hidden" name="tipo_persona" value="2">
				</div>
                <br>
				<div class="group">
					<input type="submit" class="button" value="Registrarse">
				</div>
				<div class="hr"></div>

				</form>
	
			</div>
		</div>
	</div>
</div>
<?php
        
    

        if (empty($_GET['userLogin'])){
            $vusuario='';
        }
        else{
            $vusuario= $_GET['userLogin'];
        }
    


        if (empty($_GET['passLogin'])){
            $vclave='';
        }
        else{
            $vclave= $_GET['passLogin'];
        }



        if (empty($_GET['passLogin']) && empty($_GET['userLogin'])){
			
		}
        else{

			$mysql_host = 'localhost';
			$mysql_user = 'root';
			$password = '';
			$database_name = 'petslife';

			try {
				$pdo = new PDO("mysql:host=$mysql_host;dbname=$database_name", $mysql_user, $password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				die('Problemas de conexión con BD: ' . $e->getMessage());
			}

			$query = "SELECT cedula, password, tipo_persona, nombre, apellido, numero, cod_local
			FROM persona WHERE cedula = :usuario AND password = :clave";
			$stmt = $pdo->prepare($query);

			$stmt->bindParam(':usuario', $vusuario, PDO::PARAM_STR);
			$stmt->bindParam(':clave', $vclave, PDO::PARAM_STR);

			try {
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$vregistros = count($result);

				if ($vregistros > 0) {
					$row = $result[0];
					// Ahora puedes usar $row para acceder a los datos obtenidos.
				} else {
					// No se encontraron registros con los datos proporcionados.
				}
			} catch (PDOException $e) {
				die('Error en la consulta: ' . $e->getMessage());
			}
		



			if ($vregistros>0){
				session_start();
				$_SESSION['cedula']=$row['cedula'];
				$_SESSION['password']=$row['password'];
				$_SESSION['tipo_persona']=$row['tipo_persona'];
				$_SESSION['nombre']=$row['nombre'];
				$_SESSION['loggedin'] = true;

				if(isset($_SESSION['products'])){
					header("location: ../screens/carrito2_petslife.php");
				}
				elseif($row['tipo_persona']=='1'){
					header("location: ../screens/dashboard.php");
					exit;
				}
				else {
					header("location: ../index.php");
				}
			}
			else{
				echo "<script>alert('usuario no encontrado')</script>";
			}
        }

        ?>



</body>
</html>