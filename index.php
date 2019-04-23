<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CRUD PARA VIDEOS</title>
    <style>
        * {
            box-sizing: border-box;
        }

        td,
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

        

        td {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        td:hover {
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
            td {
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
        <table>
            <thead>
                <tr>
                    <label>ID</label>
                    <label>Titulo</label>
                    <label>Link</label>
                    <label>Categoria</label>
                    <label>Descripcion</label>
                </tr>
            <tbody>
                <?php 
                            if ($resultado) { 
                                while ($filas=mysqli_fetch_assoc($resultado)) {
                        ?>
                <tr>
                    <td><?php echo $filas['ID'] ?></td>
                    <td><?php echo $filas['Titulo'] ?></td>
                    <td><?php echo $filas['Link'] ?></td>
                    <td><?php echo $filas['Categoria'] ?></td>
                    <td><?php echo $filas['Descripcion'] ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $filas['ID'] ?>">Editar</a>
                        <a href="eliminar.php?id=<?php echo $filas['ID'] ?>">Eliminar</a>
                    </td>
                </tr>
                <?php } }?>
            </tbody>
            </thead>
        </table>
    </div>
</body>

</html>