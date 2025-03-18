<?php

  session_start();

if($_POST){

  include "../../../conexion.php";
  

  /*recepcionar los datos de este formulario*/

     $email=(isset($_POST['email']))?$_POST['email']:"";
     $password=(isset($_POST['password']))?$_POST['password']:"";
	
	     //SELECCIONAR REGISTROS
		 $sentencia= $conexion->prepare("SELECT *, count(*) as n_usuario
		 FROM `usuarios` 
		 WHERE email=:email
		 AND password=:password
		 ");
		$sentencia->bindParam(":email",$email);
		$sentencia->bindParam(":password",$password);
		$sentencia->execute();
	
		$lista_usuarios=$sentencia->fetch(PDO::FETCH_LAZY);
	  
		if($lista_usuarios['n_usuario']>0){
			$_SESSION['email']=$lista_usuarios['email'];
			$_SESSION['logueado']=true;
      header('Location: ../../../abm_altas_bajas/index.php');
		}else{
			$mensaje="ERROR: El usuario o la contraseña son incorrectas";
		}
  }
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto final</title>
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
                <div class="my-5 text-center">
                    <h3 class="font-weight-bold mb-3">Iniciar sesion</h3>
                </div>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="form-icon-wrapper">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" autofocus
                                   required>
                            <i class="form-icon-left mdi mdi-email"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="form-icon-wrapper">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"
                                   required>
                            <i class="form-icon-left mdi mdi-lock"></i>
                            <a href="#" class="form-icon-right password-show-hide" title="Hide or show password">
                                <i class="mdi mdi-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-md-flex justify-content-between">
                            <div class="custom-control custom-checkbox mb-2 mb-md-0">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                <label class="custom-control-label" for="customCheck1">Recordarme</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Iniciar sesion</button>
                        
                    </div>
                    <div class="form-group">
                        <a class="btn btn-primary btn-block" href="../../../index.php">Cancelar</a>
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
