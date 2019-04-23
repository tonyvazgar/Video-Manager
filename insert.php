<?php
include 'conexion.php';
$titulo=$_GET['txttitulo'] ?? 0; 
$link=$_GET['txtlink'] ?? 0; 
$cat=$_GET['txtcategoria'] ?? 0; 
$des=$_GET['n'] ?? 0; 

if($titulo!=null||$link!=null||$cat!=null||$des!=null){
    $sql="INSERT INTO `video` (`ID`, `Titulo`, `Link`, `Categoria`, `Descripcion`) VALUES (NULL, '".$titulo."', '".$link."', '".$cat."', '".$des."')";
    print($sql);
    mysqli_query($con, $sql);
    if($titulo!=null){
        header("location:index.php");
    }
}
?>