<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Insertar video</title>
    <style>
        @font-face {
            font-family: myFont;
            src: url('udlaptext-reg.otf');
        }
        * {
            box-sizing: border-box;
            font-family: 'myFont', "Open Sans", sans-serif;
        }

        input[type=text],
        select,
        textarea,
        a {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        input[type=date]{
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit],
        a {
            background-color: #ff7300;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        .row .nuevo {
            background-color: #ff7300;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        
        h1{
            text-align: center;
        }
        .container .editar {
            background-color: #ff7300;
            color: white;
            border: none;
            cursor: pointer;
            float: left;
            text-align: center;
        }

        a {
            
            text-decoration: none;
        }
        .container {
            border-radius: 5px;
            background-color: #777;
            padding: 10%;
        }


        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        .col-85 {
            float: left;
            width: 85%;
            margin-top: 60px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .eliminar a {
            color: red;
        }
        .eliminar:hover a{
            background-color: red;
            color: white;
        }

        .row .eliminar {
            background-color: red;
        }

        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit],
            a {
                width: 100%;
                margin-top: 0;
            }
            .editar{
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
</head>

<body>
    <?php
    include "conexion.php";
    $id=$_GET['id'] ?? 0; 
    $sql="select * from video,editor where video.id='".$id."' and video.ID=editor.ID";

        //Actualizar con select * from video, editor where video.ID=editor.ID and video.ID=2

    $resultado=mysqli_query($con, $sql);
    //print($resultado);
        while($fila=mysqli_fetch_assoc($resultado)){
?>
    <div class="container">
        <h1>Editar video</h1>
        <form>
            <input type="hidden" name="txtid" value="<?php echo $fila['ID'] ?>">
            <label>Titulo:</label>
            <input type="text" name="txttitulo" value="<?php echo $fila['Titulo'] ?>"><br>
            <label>Link:</label>
            <input type="text" name="txtlink" value="<?php echo $fila['Link'] ?>"><br>
            <label>Categoria:</label>
            <input type="text" name="txtcategoria" value="<?php echo $fila['Categoria'] ?>"><br>
            <label>Descripción:</label>
            <textarea type="text" name="txtdescripcion"><?php echo $fila['Descripcion'] ?></textarea>
            <label>Nombre editor:</label>
            <input type="text" name="txtnombreeditor" value="<?php echo $fila['nombre_editor'] ?>"><br>
            <label>Camarografos:</label>
            <input type="text" name="txtcamarografos" value="<?php echo $fila['camarografo'] ?>"><br>
            <label>Fecha de edición:</label>
            <input type="date" name="txtfecha" value="<?php echo $fila['fecha'] ?>"><br>
            
            <input type="submit" value="Actualizar">
            <div class="editar">
                <a href="index.html">Regresar</a>
            </div>
        </form>
        <?php } ?>
    </div>

    <?php 
    $idp=$_GET['txtid'] ?? 0;
    $user=$_GET['txttitulo'] ?? 0;
    $link=$_GET['txtlink'] ?? 0; 
    $cat=$_GET['txtcategoria'] ?? 0; 
    $des=$_GET['txtdescripcion'] ?? 0;
    $nomed=$_GET['txtnombreeditor'] ?? 0;
    $cams=$_GET['txtcamarografos'] ?? 0;
    $fecha=$_GET['txtfecha'] ?? 0;

    if($user!=null||$link!=null||$cat!=null||$des!=null||$nomed!=null||$cams!=null){
        $sql2="UPDATE `video` SET Titulo='".$user."', Link='".$link."',Categoria='".$cat."', Descripcion='".$des."' WHERE Id='".$idp."'";
        $sql3="UPDATE `editor` SET nombre_editor='".$nomed."', fecha='".$fecha."', descripcion='".$des."', camarografo='".$cams."' WHERE Id='".$idp."'";
        print($sql2);
        mysqli_query($con, $sql2);
        mysqli_query($con, $sql3);
        if($user!=null){
            header("location:index.html");
        }
    }
?>
</body>

</html>