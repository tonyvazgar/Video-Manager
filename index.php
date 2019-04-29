<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html"/>
    <meta charset="utf-8" />
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
        

        a:hover {
            background-color: #ff7300;
        }

        .container {
            border-radius: 5px;
            background-color: #777;
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
        }
    </style>
</head>

<body>
    <?php
            header('Content-Type: text/html; charset=utf-8');
            include 'conexion.php';
            $sql="SELECT * FROM `video`";
            $resultado=mysqli_query($con,$sql);   
        ?>
    <div class="container">
        <div class="row">
            <div class="nuevo">
                <a href="insertar.php">Nuevo video</a>
            </div>
        </div>
        <form accept-charset="utf-8">
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
                            <label>Título</label>
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