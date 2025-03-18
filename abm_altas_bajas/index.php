<head>
<link rel="stylesheet" href="estilo.php">
</head>

<?php include("../conexion.php");


if(isset($_GET['txtid'])){
    //Borrar dicho registro con el ID correspondiente
    $txtid=(isset($_GET['txtid']))?$_GET['txtid']:"";
    $sentencia= $conexion->prepare("DELETE FROM crud WHERE id=:id");
    $sentencia->bindParam(":id",$txtid);
    $sentencia->execute();
    $mensaje="Registro eliminado con exito.";
    header("Location:index.php?mensaje=".$mensaje);
}

    //SELECCIONAR REGISTROS
    $sentencia= $conexion->prepare("SELECT * FROM `crud`"); 
    $sentencia->execute();
    $lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    
    include("../templates/header.php");

?>
<?php if(isset($_GET['mensaje'])) { ?>
    <script>
        swal.fire({icon:"success", title:"<?php echo $_GET['mensaje']; ?>"});
    </script>
   <?php }?>



<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
        <a name="" id="" class="btn btn-primary" href="../cerrar.php" role="button">Cerrar sesion</a>
    </div>
    <div class="card-body">
        
    <div class="table-responsive">
        <table class="table table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titulo:</th>
                    <th scope="col">Descripcion:</th>
                    <th scope="col">Editar:</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <body>
                <?php foreach($lista as $registros){?>
                <tr class="">
                    <td><?php echo $registros['id'];?></td>
                    <td><?php echo $registros['titulo'];?></td>
                    <td><?php echo $registros['descripcion'];?></td>
                    
                    
                    <td>
                        
                        <a name="" id="" class="btn btn-info" href="editar.php?txtid=<?php echo $registros['id']; ?> " role="button" role="button">Editar</a></td>

                    <td>  <a name="" id="" class="btn btn-danger" href="javascript:borrar(<?php echo $registros['id']; ?>); " role="button">Eliminar</a></td>
                
                </tr>
                <?php }?>
                
            </body>
        </table>
    </div>
    

    </div>
</div>
<br>
<a name="" id="" class="btn btn-success" href="../abm_filtrar/filtrado.php" role="button">Filtrar</a>

<script>
    function borrar(id){
        Swal.fire({
        title: 'Desea borrar el registro?',
        showCancelButton: true,
        confirmButtonText: "Si, borrar"
    }).then((result) => {
        if (result.isConfirmed) {
         window.location="index.php?txtid="+id;
  } 
})
    }
</script>

<?php include("../templates/footer.php"); ?>
 
  
 