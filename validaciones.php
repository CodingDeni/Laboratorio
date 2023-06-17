<?php
        //Iniciar variables error en null
        $vacio_error = null;  
        $email_error = null;
        $emailrepe_error = null;
        $clave_error = null; 
        $success = null;

        if($_POST){

            $nombre = $_POST['nombre'];
            $apellido1 = $_POST['apellido1'];
            $apellido2 = $_POST['apellido2'];
            $email = $_POST['email'];
            $nickname = $_POST['nickname'];
            $clave = $_POST['clave'];

            //Conexión con PDO 

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "laboratorio";

            //Crear conexión
            $conn = new mysqli($servername, $username, $password, $dbname);
            //Comprobar conexión 
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            

            
            //VALIDACIONES EMPTY EMAIL Y CLAVE 
            if (empty($nombre) || empty($apellido1) || empty($apellido2) || empty($email) || empty($nickname) || empty($clave)) {
                $vacio_error = "Este campo es obligatorio";
            }
            else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_error = "El email debe ser válido";
                }
                else{ 
                    if (strlen($clave) < 4 || strlen($clave) > 8){
                        $clave_error = "La clave ha de tener entre 4 y 8 caracteres";
                    }
                    else{
                        $verificar_email = mysqli_query($conn, "SELECT * FROM usuario WHERE email='$email' ");

                        if(mysqli_num_rows($verificar_email) > 0){
                            $emailrepe_error = "Este email ya existe";
                        } else {
                            //Crear QUERY - ENVIO DATOS A LA BBDD
                            $sql = "INSERT INTO usuario(nombre, apellido1, apellido2, email, nickname, clave)
                            VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$nickname', '$clave')";

                            if ($conn->query($sql) === TRUE) {
                                $success = "Registro completado con éxito";
                                
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                            
                        }
                    
                        }
                    }   
                }       
        
    
            //CERRAR BBDD ->libera recursos del sistema
            $conn->close();
        }

    
        
        ?>