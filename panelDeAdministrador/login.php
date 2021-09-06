<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="assests/css/estilosDelPanel.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<title>Panel de administración</title>
</head>
<!------ Include the above in your HEAD tag ---------->
<body >

    <div class="container-fluid"><br><br><br><br><br><br>
    <main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Bienvenido al panel de administrador</div>
                    <div class="card-body">
                        <form action="validarLogin.php" method="POST">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Usuario</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="usuario" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="contrasena" required>
                                </div>
                            </div>

                            

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Ingresar
                                </button>
                                
                            </div>
                            <?php
                                if(isset($_SESSION['error_login'])){
                                    echo "
                                    <div class='col-md-6 offset-md-4 mt-2'>
                                    <label for='mensaje_error' class=' text-danger'>".$_SESSION['error_login']."</label> 
                                    </div>";
                                    session_unset();
                                }
                            ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="JS/selects.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

</body>
</html>