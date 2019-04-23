<?php
    include 'conexion.php';
    $id=$_GET['id'] ?? 0;
    $sql="DELETE FROM video WHERE ID='".$id."'";
    print($sql);
    mysqli_query($con, $sql);
    header('location:index.php');
?>