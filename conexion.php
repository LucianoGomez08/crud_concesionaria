<?php
//$conexion= new mysqli("localhost", "root", "", "bd2");

$servidor="localhost";
$baseDeDatos="abm_altas_bajas";
$usuario="root";
$contraseña="";

try{
	$conexion=new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contraseña);
}catch(Exception $error){
	echo $error->getMessage();
}
?>
