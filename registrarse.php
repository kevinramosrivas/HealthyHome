
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.inicio.css">
    <link rel="shortcut icon" href="img/manzana_animado.png" type="image/x-icon"> 
    <title>Registrarse</title>
</head>
<body>
    <div class="inicio_cont">
        <div class="informacion">
        <form action="" method="POST">  
       
            <h1 class="inicio_cont">Registrarse</h1>
            <p >Ingrese su nombre</p>
            <input placeholder="Ingrese nombre " class="inicio_cont" type="text" name="nom">
            <p >Ingrese apellido</p>
            <input placeholder="Ingrese apellido" class="inicio_cont" type="text" name="apell">
            <p >Ingrese usuario</p>
            <input placeholder="Ingrese su usuario" class="inicio_cont" type="text" name="usuario">
            <p>Contraseña</p>
            <input placeholder="Ingrese contraseña" class="inicio_cont" type="password" name="pass">
            <input type="submit" value="Registrarse" class="inicio_cont boton" name="submit" />  

            
          
</form> 
<button OnClick="location.href='index.php'" >Volver al inicio</button>
            <p class="footer">¿Ya tienes una cuenta? <a href="iniciodesesion.php">Iniciar sesión</a></p>
 
<?php  

if(isset($_POST["submit"])){
if(!empty($_POST['usuario']&&!empty($_POST['nom'])&&!empty($_POST['apell'])) && !empty($_POST['pass'])) {
    $nomb=$_POST['nom'];
    $apell=$_POST['apell'];
    $usuario=$_POST['usuario'];
    $pass=$_POST['pass'];
    $con=mysqli_connect('localhost','root','','id17103432_healthyhome') or die(mysql_error());

    $query=mysqli_query($con,"SELECT * FROM login WHERE correoLogin='".$usuario."'");
    $numrows=mysqli_num_rows($query);  
    if($numrows==0)  
    {  
    
    $sql="INSERT INTO login(nomLogin,apeLogin,correoLogin,passLogin) VALUES('$nomb','$apell','$usuario','$pass')";  
  
    $result=mysqli_query($con, $sql);  
        if($result){  
    echo "Cuenta de usuario creada";  
    } else {  
    echo "Error!";  
    }  
  
    } else {  
    echo "El usuario ingresado ya existe. Prueba algún otro";  
    }  
  
} else {  
    echo "Completar todos los campos";  
}  
}  
?>  
        </div>
        <div class="imagen">
            <img src="img/imagenlogin_referencial.jpg">
        </div>
     <!--   <div class="icono">
            <img src="img/iconoblanco.png">
        </div> -->
    </div>
</body>
</html>