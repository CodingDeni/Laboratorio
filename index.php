<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Link las validaciones en php -->
    <?php require("validaciones.php") ?>
    <!-- Enseñar los mensajes de error -->
    <?php
	 	if($vacio_error != null){
	 		?> <style>.vacio-error{display:block}</style> <?php
	 	}
	 	if($email_error != null){
	 		?> <style>.email-error{display:block}</style> <?php
	 	}
		if($emailrepe_error != null){
			?> <style>.emailrepe-error{display:block}</style> <?php
		}
		if($clave_error != null){
			?> <style>.clave-error{display:block}</style> <?php
		}
	 	if($success != null){
	 		?> <style>.success{display:block}</style> <?php
	 	}
	 ?>

</head>

<body>
<main>
      
        <form method="POST" action="index.php" class="formulario">

            <p class="formulario__titulo">FORMULARIO DE REGISTRO</p>

            <div class="formulario__grupo">
                <label for="nombre">Nombre </label>
                <input type="text" name="nombre" class="form-input"/>
                <p class="error vacio-error">
                    <?php echo $vacio_error; ?>
                </p>
            </div>

            <div class="formulario__grupo">
                <label for="nombre">Primer Apellido </label>
                <input type="text" name="apellido1" class="form-input"/>
                <p class="error vacio-error">
                    <?php echo $vacio_error; ?>
                </p>
            </div>

            <div class="formulario__grupo">
            <label for="nombre">Segundo Apellido </label>
            <input type="text" name="apellido2" class="form-input"/>
                <p class="error vacio-error">
                    <?php echo $vacio_error; ?>
                </p>
            </div>

            <div class="formulario__grupo">
            <label for="nombre">Email </label>
            <input type="email" name="email" class="form-input"/>
                <p class="error vacio-error">
                    <?php echo $vacio_error; ?>
                </p>
                <p class="error email-error">
                    <?php echo $email_error; ?>
                </p>
                <p class="error emailrepe-error">
                    <?php echo $emailrepe_error; ?>
                </p>
            </div>

            <div class="formulario__grupo">
            <label for="nombre">Nickname </label>
            <input type="text" name="nickname" class="form-input"/>
                <p class="error vacio-error">
                    <?php echo $vacio_error; ?>
                </p>
            </div>

            <div class="formulario__grupo">
            <label for="nombre">Password </label>
            <input type="password" name="clave" class="form-input"/>
                <p class="error vacio-error">
                    <?php echo $vacio_error; ?>
                </p>
                <p class="error clave-error">
                    <?php echo $clave_error; ?>
                </p>
            </div>

            <div class=" formulario__grupo">
                <button type="submit" class="boton">REGISTRARSE</button>
                <p class="success">
                    <?php echo $success; ?>
                    <button type="button" onclick="location.href='consulta.php'">CONSULTA</button>
                </p>
            </div>

        </form>
    </main>


    
</body>

</html>