<?php
    include_once("conexion.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from contacto where id_contacto = '$id'";
        $resultado = mysqli_query($con,$sql);
        if($fila = mysqli_fetch_assoc($resultado)){
            //envio los valores al formulario
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $direc = $_POST['direc'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $cel = $_POST['cel'];
        $whatsapp = $_POST['whatsapp'];
        
        $sql = "update contacto set nombre_suc = '$nombre', direccion = '$direc', email = '$email', tel = '$tel', cel = '$cel', whatsapp = '$whatsapp' where id_contacto = '$id'";

        $resultado = mysqli_query($con, $sql);

        if($resultado){
            echo "<script>
            alert('Contacto actualizado correctamente');
            location.href = 'administrar.php';
            </script>";
        }else{
            echo "<script>
            alert('Contacto no actualizado');
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar contacto</title>
</head>
<body>
    <h4><a href="administrar.php">Contacto -> Administrar</a></h4>
<center>
    <br>
    <h1>Actualizar contacto</h1>
    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <table border="1">
            <tr>
                <td><label for="nombre">Nombre:</label></td>
                <td><input type="text" name="nombre" value="<?php echo $fila['nombre_suc'] ?>" require></td>
            </tr>
                <td><label for="direc">Direccion:</label></td>
                <td><input type="text" name="direc" value="<?php echo $fila['direccion'] ?>" require></td>
            </tr>
                <td><label for="email">Emal:</label></td>
                <td><input type="email" name="email" value="<?php echo $fila['email'] ?>" require></td>
            </tr>
                <td><label for="tel">Telefono:</label></td>
                <td><input type="tel" name="tel" value="<?php echo $fila['tel'] ?>" require></td>
            </tr>
                <td><label for="cel">Celular:</label></td>
                <td><input type="tel" name="cel" value="<?php echo $fila['cel'] ?>" require></td>
            </tr>
                <td><label for="whatsapp">Whatsapp:</label></td>
                <td><input type="tel" name="whatsapp" value="<?php echo $fila['whatsapp'] ?>" require></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="guardar" value="Guardar">
                </td>
            </tr>
        </table>
        <input type="hidden" value="<?php echo $fila['id_contacto'] ?>" name="id">
    </form>
    <hr>
</center>
</body>
</html>