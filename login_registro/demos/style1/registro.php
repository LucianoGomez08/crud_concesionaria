
<?php

include "../../../conexion.php";
  
  if($_POST){/*va a enviar toda la informacion y no va mostrar en la barra de navegación*/
    $email=(isset($_POST["email"]))?$_POST["email"]:"";/*el isset de email va a capturar lo que tenga en el input, y el POST email si el input esta vacio seguira igual*/
    $password=(isset($_POST["password"]))?$_POST["password"]:"";
    $confirmar_password=(isset($_POST["confirmar_password"]))?$_POST["confirmar_password"]:"";

    $sentencia=$conexion->prepare("INSERT INTO usuarios (email,password,confirmar_password) VALUES (:email,:password, :confirmar_password);");/* INSERT INTO se va a agregar informacion en la base de datos, los valores*/

    $sentencia->bindParam(":email",$email);/*vas a confirmar la información*/ 
    $sentencia->bindParam(":password",$password);
    $sentencia->bindParam(":confirmar_password",$confirmar_password);
    $sentencia->execute();/*ejecutar todo lo anterior*/
    header('Location: login.php');
    
  }
  ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>proyecto final</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../dist/vendor/bootstrap-4.5.3/css/bootstrap.min.css" type="text/css">
    <!-- Material design icons -->
    <link rel="stylesheet" href="../../dist/icons/material-design-icons/css/mdi.min.css" type="text/css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <!-- Latform styles -->
    <link rel="stylesheet" href="../../dist/css/latform-style-1.min.css" type="text/css">
</head>
<body>
<div class="form-wrapper">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="logo">
                <img src="../../dist/images/beltran.png" alt="logo">
                </div>
                <div class="text-center my-5">
                    <h3 class="font-weight-bold mb-3">Registrarse</h3>
                </div>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="form-icon-wrapper">
                            <input type="email" id="email" name="email" class="form-control"  placeholder="Ingrese su email" required>
                            <i class="form-icon-left mdi mdi-email"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Ingrese su Password</label>
                        <div class="form-icon-wrapper">
                            <input type="password" id="password" name="password" class="form-control"  placeholder="Ingrese su password">
                            <i class="form-icon-left mdi mdi-lock"></i>
                            <a href="#" class="form-icon-right password-show-hide" title="Hide or show password">
                                <i class="mdi mdi-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password-repeat">Reingrese su password</label>
                        <div class="form-icon-wrapper">
                            <input type="password" id="confirmar_password" name="confirmar_password" class="form-control"  placeholder="Reingrese su password">
                            <i class="form-icon-left mdi mdi-lock"></i>
                            <a href="#" class="form-icon-right password-show-hide" title="Hide or show password">
                                <i class="mdi mdi-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-primary btn-block">Registrarme</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Jquery -->
<script src="../../dist/vendor/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../dist/vendor/bootstrap-4.5.3/js/bootstrap.min.js"></script>
<!-- Latform scripts -->
<script src="../../dist/js/latform.min.js"></script>
</body>
</html>
