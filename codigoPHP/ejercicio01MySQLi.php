<!DOCTYPE html>
<!--Autor: Luis Ferreras González-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Luis Ferreras</title>
        <link rel="stylesheet" type="text/css" href="../webroot/estilosEjercicios.css">
    </head>
    <body>
        <header>
            <h1>Ejercicio 01 MySQLi</h1>
        </header>
        <main>
            <div>
                <h2>Conexión correcta</h2>
                    <?php
                        require_once '../core/confDBMySQLi.php';
                        $atributos=[
                            "AUTOCOMMIT",
                            "ERRMODE",
                            "CASE",
                            "CLIENT_VERSION",
                            "CONNECTION_STATUS",
                            "ORACLE_NULLS",
                            "PERSISTENT",
                            "SERVER_INFO",
                            "SERVER_VERSION"
                        ];
                        $conn = mysqli_connect(SERVIDOR, USUARIO, CONTRASENA, BASEDATOS);
                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }
                        echo "Se ha conectado correctamente";
//                        foreach($atributos as $valor){
//                            echo("<br>$valor: ".$conn->);
//                        }
                        $conn->close();
                    ?>
            </div>
            <div>
                <h2>Conexión con contraseña incorrecta</h2>
                    <?php
                        $conninc = mysqli_connect(SERVIDOR, USUARIO, "contrasena_invalida", BASEDATOS);
                        if ($conninc->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                            $conn->close();
                        }
                        echo "Se ha conectado correctamente";
                        $conn->close();
                    ?>
            </div>
        </main>
        <footer>
            <a href="../../index.php">Luis Ferreras</a>
            <a href="../../208DWESProyectoDWES/indexProyectoDWES.php">DWES</a>
            <a href="../indexProyectoTema4.php">Tema 4</a>
            <a href="https://github.com/LuisFerrGon/208DWESProyectoTema4">GitHub</a>
        </footer>
    </body>
</html>