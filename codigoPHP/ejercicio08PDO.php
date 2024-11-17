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
            <h1>Ejercicio 08 PDO</h1>
        </header>
        <main>
            <?php
                require_once '../core/confDBPDO.php';
                try{
                    $aDepartamentos=[];
                    $conn = new PDO(SERVIDOR, USUARIO, CONTRASENA);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query=$conn->prepare("SELECT * FROM T02_Departamento;");
                    $query->execute();
                    while($departamento=$query->fetchObject()){
                        $aDepartamentos[]=$departamento;
                    }
                    $fechaActual=date_format(new DateTime("now"), "Y-m-d-");
                    $nombreArchivo="../tmp/".$fechaActual."departamentos.json";
                    $archivojson=fopen($nombreArchivo, "w");
                    $json=json_encode($aDepartamentos);
                    fwrite($archivojson, $json);
                    fclose($archivojson);
                    echo "<p>Se ha exportado correctamente. <a href='".$nombreArchivo."'>Ver los datos.</a></p>";
                }catch(PDOException $e) {
                    echo "Error de ejecución: " . $e->getMessage();
                }finally {
                    unset($conn);
                }
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