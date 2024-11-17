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
            <h1>Ejercicio 01 PDO</h1>
        </header>
        <main>
            <div>
                <h2>Conexión correcta</h2>
                    <?php
                        require_once '../core/confDBPDO.php';
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
                        try{
                            $conn = new PDO(SERVIDOR, USUARIO, CONTRASENA);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            echo "Se ha conectado correctamente";
                            foreach($atributos as $valor){
                                echo("<br>$valor: ".$conn->getAttribute(constant("PDO::ATTR_$valor")));
                            }
                        }catch(PDOException $e) {
                            echo "Conexión fallida: " . $e->getMessage();
                        }finally {
                            unset($conn);
                        }
                    ?>
            </div>
            <div>
                <h2>Conexión con contraseña incorrecta</h2>
                    <?php
                        try{
                            $conninc = new PDO(SERVIDOR, USUARIO, "contrasena_invalida");
                            $conninc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            echo "Se ha conectado correctamente";
                            foreach($atributos as $valor){
                                echo("<br>$valor: ".$conninc->getAttribute(constant("PDO::ATTR_$valor")));
                            }
                        }catch(PDOException $e) {
                            echo "Conexión fallida: " . $e->getMessage();
                        }finally {
                            unset($conninc);
                        }
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