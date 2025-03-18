<head>
<link rel="stylesheet" href="estilo.php">
</head>

<?php include("../conexion.php");


if($_POST){
  
    //recepcionamos los valores del formulario
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";

      $sentencia= $conexion->prepare("INSERT INTO `crud` 
      (`id`,`titulo`, `descripcion`)
      VALUES (NULL, :titulo, :descripcion);");
    
      $sentencia->bindParam(":titulo",$titulo);
      $sentencia->bindParam(":descripcion",$descripcion);
     
      $sentencia->execute();  
      
      $mensaje="Registro agregado con exito.";
      header("Location:index.php?mensaje=".$mensaje);
    
  
  }
  
  include("../templates/header.php");
  
?>
 
 <div class="card">
    <div class="card-header">
        agregar nueva registro
    </div>
    <div class="card-body">
       
        <form action="" enctype="multipart/form-data" method="post">
        
        <div class="mb-3">
          <label for="titulo" class="form-label">Titulo:</label>
          <input type="text"
            class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo">
        </div>
           <div class="mb-3">
              <label for="descripcion" class="form-label">Descripcion:</label>
              <input type="text"
                class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="descripcion">
            </div>

                    <button type="submit" class="btn btn-success">Agregar</button>
                    <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>

    </div>
    <div class="card-footer text-muted">
     
    </div>
</div>
 
<?php include("../templates/footer.php");?>



