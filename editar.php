<?php
    include "conexion.php";
    $id=$_GET['id'] ?? 0; 
    $sql="select * from video where id='".$id."'";
    $resultado=mysqli_query($con, $sql);
    //print($resultado);
        while($fila=mysqli_fetch_assoc($resultado)){
?>
<div>
    <form>
        <input type="hidden" name="txtid" value="<?php echo $fila['ID'] ?>">
        <label>Titulo:</label>
        <input type="text" name="txttitulo" value="<?php echo $fila['Titulo'] ?>"><br>
        <label>Link:</label>
        <input type="text" name="txtlink" value="<?php echo $fila['Link'] ?>"><br>
        <label>Categoria:</label>
        <input type="text" name="txtcategoria" value="<?php echo $fila['Categoria'] ?>"><br>
        <label>Descripción:</label>
        <input type="text" name="txtdescripcion" value="<?php echo $fila['Descripcion'] ?>"><br>
        <input type="submit" value="Actualizar">
        <a href="index.php">Regresar</a>
    </form>
        <?php } ?>
</div>

<?php 
    $idp=$_GET['txtid'] ?? 0;
    $user=$_GET['txttitulo'] ?? 0;
    $link=$_GET['txtlink'] ?? 0; 
    $cat=$_GET['txtcategoria'] ?? 0; 
    $des=$_GET['txtdescripcion'] ?? 0; 

    if($user!=null||$link!=null||$cat!=null||$des!=null){
        $sql2="UPDATE `video` SET Titulo='".$user."', Link='".$link."',Categoria='".$cat."', Descripcion='".$des."' WHERE Id='".$idp."'";
        print($sql2);
        mysqli_query($con, $sql2);
        if($user!=null){
            header("location:index.php");
        }
    }
?>