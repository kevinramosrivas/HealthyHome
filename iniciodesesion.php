<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.inicio.css">
    <link rel="shortcut icon" href="img/manzana_animado.png" type="image/x-icon"> 
    <title>Inicio de sesión</title>
</head>
<body>
    <div class="inicio_cont">
        <div class="informacion">
            <form action="" method="POST">  
            <h1 class="inicio_cont">Inicio de Sesion</h1>
            <p >Ingrese su nombre de usuario</p>
            <input placeholder="Ingresar nombre de usuario" class="inicio_cont" type="text" name="usuario">
            <p>Contraseña</p>
            <input placeholder="Ingresar contraseña" class="inicio_cont" type="password" name="pass">
            <input type="submit" class="inicio_cont boton"  value="Iniciar" name="submit" >  
            
        </form> 
                <?php 
                    if(isset($_POST["submit"])){  
            
                if(!empty($_POST['usuario']) && !empty($_POST['pass'])) {  
                $usuario=$_POST['usuario'];  
                $pass=$_POST['pass'];   
                
                $pass_cifrado=password_hash($pass,PASSWORD_DEFAULT);
                $con=mysqli_connect('localhost','root','','id17103432_healthyhome') or die(mysql_error());  
            
                $query=mysqli_query($con, "SELECT * FROM login WHERE correoLogin='".$usuario."'AND passLogin='".$pass."'");  
                $numrows=mysqli_num_rows($query);  
                if($numrows!=0)  
                {  
                    session_start();
                    $_SESSION["correoLogin"]=$_POST["usuario"];
                    header("location:iniciodesesion.php"); 

                    while($row=mysqli_fetch_assoc($query))  
                    {  
                    $dbusername=$row['correoLogin'];  
                    $dbpassword=$row['passLogin'];  
                    }  
            
                    if($usuario == $dbusername && $pass == $dbpassword)  
                    {  
                        
                        $_SESSION['sess_user']=$usuario;  
                        header("location:SESIONINICIADA.php");
                        echo "Usted ha iniciado sesión";  
                        
                      
                    }  
                } else {  
                    echo "Usuario o password inválidos";  
                }  
            
                } else {  
                echo "Completar todos los campos";  
                }  
                }  
                ?>  

            <button OnClick="location.href='index.php'">Volver inicio</button>
      
           
            <p class="footer" href="index.php">¿Aún no tienes una cuenta? <a href="registrarse.php">Regístrate</a></p>

        </div>
        <div class="imagen">
            <img src="img/imagenlogin_referencial.jpg">
        </div>
       <!-- <div class="icono">
            <img src="img/iconoblanco.png">
        </div>-->
    </div>
</body>
</html>