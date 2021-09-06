<?php
session_start();
include("../conexion.php");

if(isset($_POST)){
    $usuario=trim($_POST['usuario']);
    $contrasena=$_POST['contrasena'];
    
    $sql="SELECT * FROM usuarios WHERE usuario='$usuario'";
    $login=mysqli_query($conexion,$sql);
    var_dump($login);
    if($login && mysqli_num_rows($login)==1){
       
       $usuario=mysqli_fetch_assoc($login);
       
       $verify=password_verify($contrasena,$usuario['contrasena']);
       
    if($verify){
        $_SESSION['usuario']=$usuario;
        if(isset($_SESSION['error_login'])){
            session_unset($_SESSION['error_login']);
        }
        header("Location:inicio.php");
    }else{
        $_SESSION['error_login']='Usuario o contraseña incorrectos';
        header("Location:login.php");
    }
        
    }else{
        $_SESSION['error_login']='Usuario o contraseña incorrectos';
        header("Location:login.php");
    }


   


}

?>