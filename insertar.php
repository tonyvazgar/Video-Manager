<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Insertar video</title>
    <style>
        * {
            box-sizing: border-box;
        }

        input[type=text],
        select,
        textarea {
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

        input[type=submit]:hover {
            background-color: #45a049;
        }
        
        .container .editar {
            background-color: #ff7300;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: left;
        }

        .container {
            border-radius: 5px;
            background-color: #777;
            padding: 20%;
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
        }
    </style>
</head>

<body>
    <div class="container">
        <form>
            <label>Titulo:</label>
            <input type="text" name="txttitulo" required><br>
            <label>Link:</label>
            <input type="text" name="txtlink"><br>
            <label>Categoria:</label>
            <input type="text" name="txtcategoria"><br>
            <label>Descripción:</label>
            <input type="text" name="txtdescripcion"><br>
            <input type="submit" value="Agregar">
            <div class="editar">
                <a href="index.php">Regresar</a>
            </div>
        </form>
    </div>
    <?php
    include 'conexion.php';
    $titulo=$_GET['txttitulo'] ?? 0; 
    $link=$_GET['txtlink'] ?? 0; 
    $cat=$_GET['txtcategoria'] ?? 0; 
    $des=$_GET['txtdescripcion'] ?? 0; 

    if($titulo!=null||$link!=null||$cat!=null||$des!=null){
        $sql="INSERT INTO `video` (`ID`, `Titulo`, `Link`, `Categoria`, `Descripcion`) VALUES (NULL, '".$titulo."', '".$link."', '".$cat."', '".$des."')";
        print($sql);
        mysqli_query($con, $sql);
        if($titulo!=null){
            header("location:index.php");
        }
    }
?>
</body>