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
            <h1>Ejercicio 02 MySQLi</h1>
        </header>
        <main>
            <?php
                require_once '../core/confDBMySQLi.php';
                $conn = mysqli_connect(SERVIDOR, USUARIO, CONTRASENA, BASEDATOS);
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                    $conn->close();
                }
                $query = $conn->query("SELECT * FROM T02_Departamento;");
                if ($query != null) {
            ?>
            <table>
                <thead>
                    <tr>
                        <?php
                        $oResultado = $query->fetch_assoc();
                        foreach ($oResultado as $key => $valor) {
                            echo "<th span='col'>$key</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    do {
                        echo"<tr>";
                        foreach ($oResultado as $valor) {
                            if ($valor instanceof \MongoDB\BSON\TimestampInterface) {
                                echo "<td>" . $valor->format("d/m/Y") . "</td>";
                            } else {
                                echo "<td>$valor</td>";
                            }
                        }
                        echo "</tr>";
                    } while ($oResultado = $query->fetch_assoc());
                    ?>
                </tbody>
            </table>
            <?php
                }
                $conn->close();
            ?>
        </main>
        <footer>
            <a href="../../index.php">Luis Ferreras</a>
            <a href="../../208DWESProyectoDWES/indexProyectoDWES.php">DWES</a>
            <a href="../indexProyectoTema4.php">Tema 4</a>
            <a href="https://github.com/LuisFerrGon/208DWESProyectoTema4">GitHub</a>
        </footer>
    </body>
</html>