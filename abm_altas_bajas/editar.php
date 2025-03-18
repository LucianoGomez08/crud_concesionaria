<head>
<link rel="stylesheet" href="estilo.php">
</head>

<?php include("../conexion.php");


if(isset($_GET['txtid'])){
  //Recuperamos los datos del ID seleccionado
  $txtid=(isset($_GET['txtid']))?$_GET['txtid']:"";

  $sentencia= $conexion->prepare("SELECT * FROM crud WHERE id=:id");
  $sentencia->bindParam(":id",$txtid);
  $sentencia->execute();
  $registro=$sentencia->fetch(PDO::FETCH_LAZY);

  $titulo=$registro['titulo'];
  $descripcion=$registro['descripcion']; 

  if($_POST){
     

      //recepcionamos los valores del formulario
      $txtid=(isset($_POST['txtid']))?$_POST['txtid']:"";
      $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
      $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";

      $sentencia= $conexion->prepare("UPDATE `crud` 
      SET 
      titulo=:titulo,
      descripcion=:descripcion
      WHERE id=:id");

      $sentencia->bindParam(":titulo",$titulo);
      $sentencia->bindParam(":descripcion",$descripcion);
      $sentencia->bindParam(":id",$txtid);
      $sentencia->execute();
      
      $mensaje="Registro editado con exito.";
      header("Location:index.php?mensaje=".$mensaje);
  }

}

include("../templates/header.php");

?>

<div class="card">
    <div class="card-header">
        Editar registro
    </div>
    <div class="card-body">
       
        <form action="" enctype="multipart/form-data" method="post">
        <div class="mb-3">
          <label for="txtid" class="form-label">Id:</label>
          <input type="text"
            class="form-control" readonly name="txtid" id="txtid" value="<?php echo $txtid ?>" aria-describedby="helpId" placeholder="id">
        </div>
        <div class="mb-3">
          <label for="titulo" class="form-label">Titulo:</label>
          <input type="text"
            class="form-control" name="titulo" id="titulo" value="<?php echo $titulo ?>" aria-describedby="helpId" placeholder="titulo">
        </div>
           <div class="mb-3">
              <label for="descripcion" class="form-label">Descripcion:</label>
              <input type="text"
                class="form-control" name="descripcion" id="descripcion" value="<?php echo $descripcion ?>" aria-describedby="helpId" placeholder="descripcion">
            </div>

                    <button type="submit" class="btn btn-success">Editar</button>
                    <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>

    </div>
    <div class="card-footer text-muted">
     
    </div>
</div>




<?php include("../templates/footer.php");?>