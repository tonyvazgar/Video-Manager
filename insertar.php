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
        textarea, input[type=date] {
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

        input[type=submit] {
            background-color: #ff7300;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        h1 {
            text-align: center;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        a{
            
            text-decoration: none;
        }
        .container .editar {
            background-color: #ff7300;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: left;
            text-align: center;
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

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
            .editar {
                width: 100%;
                margin-top: 0; 
            }
        }
    </style>
</head>

<body>
    <div class="container">
    <h1>Insertar video</h1>
        <form>
            <label>Titulo:</label>
            <input type="text" name="txttitulo" required><br>
            <label>Link:</label>
            <input type="text" name="txtlink" placeholder="Este es el link del video de youtube"><br>
            <label>Categoria:</label>
            <input type="text" name="txtcategoria"><br>
            <label>Descripción:</label>
            <textarea type="text" name="txtdescripcion"></textarea>
            <label>Nombre editor:</label>
            <input type="text" name="txtnombreeditor"><br>
            <label>Camarografos:</label>
            <input type="text" name="txtcamarografos"><br>
            <label>Fecha de edición:</label>
            <input type="date" name="txtfecha"><br>
            <input type="submit" value="Agregar">
            <div class="editar">
                <a href="index.html">Regresar</a>
            </div>
        </form>
    </div>
    <?php
    include 'conexion.php';
    $titulo=$_GET['txttitulo'] ?? 0; 
    $link=$_GET['txtlink'] ?? 0; 
    $cat=$_GET['txtcategoria'] ?? 0; 
    $des=$_GET['txtdescripcion'] ?? 0;
    $nomed=$_GET['txtnombreeditor'] ?? 0;
    $cams=$_GET['txtcamarografos'] ?? 0;
    $fecha=$_GET['txtfecha'] ?? 0; 

    if($titulo!=null||$link!=null||$cat!=null||$des!=null){
        $sql="INSERT INTO `video` (`ID`, `Titulo`, `Link`, `Categoria`, `Descripcion`) VALUES (NULL, '".$titulo."', '".$link."', '".$cat."', '".$des."')";
        print($sql);
        mysqli_query($con, $sql);
        $sql1="INSERT INTO `editor`(`ID`, `nombre_editor`, `fecha`, `descripcion`, `camarografo`) VALUES ((SELECT video.ID FROM video where video.Link='".$link."'), '".$nomed."', '".$fecha."', '".$des."', '".$cams."')";
        mysqli_query($con, $sql1);
        // INSERT INTO `editor`(`ID`, `nombre_editor`, `fecha`, `descripcion`, `camarografo`) VALUES ((SELECT video.ID FROM video where video.Link='.'), "T", "12/12/2012","ASD", "1234")
        // //Obtener id del video anterior, hacer query para obtener su video y despues
        // //insertar con info de camarofrafros (de tabla editor)
        if($titulo!=null){
            header("location:index.html");
        }
    }
?>
</body>