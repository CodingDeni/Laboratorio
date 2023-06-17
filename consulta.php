<?php
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


    $consulta = "SELECT * FROM usuario";
    $resultado = mysqli_query($conn,$consulta);
    if($resultado){
        while($row = $resultado->fetch_array()){
        $nombre = $row['nombre'];
        $apellido1 = $row['apellido1'];
        $apellido2 = $row['apellido2'];
        $email = $row['email'];
        $nickname = $row['nickname'];
        $clave = $row['clave'];
        
        ?>

        <div>
            <h2><?php echo $nombre; ?> <?php echo $apellido1; ?> <?php echo $apellido2; ?></h2>
            <div>
                <p>
                    <b>Email:</b> <?php echo $email; ?></br>
                    <b>Nickname:</b> <?php echo $nickname; ?>
                </p>
            </div>
        </div>

<?php
        }
    }

//CERRAR BBDD ->libera recursos del sistema
$conn->close();

?>