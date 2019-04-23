<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CRUD PARA VIDEOS</title>
    <style>
        * {
            box-sizing: border-box;
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

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit],
        a {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        a:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
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

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .eliminar a {
            color: red;
        }

        .row .eliminar {
            background-color: red;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit],
            a {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
</head>

<body>
    <?php
            include 'conexion.php';
            $sql="SELECT * FROM `video`";
            $resultado=mysqli_query($con,$sql);   
        ?>
    <div class="container">
        <a href="insertar.php">Nuevo video</a>
        <form>
            <thead>
            <tbody>
                <?php 
                            if ($resultado) { 
                                while ($filas=mysqli_fetch_assoc($resultado)) {
                        ?>
                <tr>
                    <div class="row">
                        <div class="col-25">
                            <label>ID</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="firstname" value="<?php echo $filas['ID'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label>Titulo</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="firstname" value="<?php echo $filas['Titulo'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label>Link</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="firstname" value="<?php echo $filas['Link'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label>Categoria</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="firstname" value="<?php echo $filas['Categoria'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label>Descripcion</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="firstname" value="<?php echo $filas['Descripcion'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="editar">
                            <a href="editar.php?id=<?php echo $filas['ID'] ?>">Editar</a>
                        </div>
                        <div class="eliminar">
                            <a href="eliminar.php?id=<?php echo $filas['ID'] ?>">Eliminar</a>
                        </div>
                    </div>
                </tr>
                <?php } }?>
            </tbody>
            </thead>
        </form>
    </div>
</body>

</html>