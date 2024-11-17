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
            <h1>Ejercicio 02 PDO</h1>
        </header>
        <main>
            <?php
                require_once '../core/confDBPDO.php';
                try{
                    $conn = new PDO(SERVIDOR, USUARIO, CONTRASENA);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query=$conn->query("SELECT * FROM T02_Departamento;");
                    if ($query!=null){
            ?>
            <table>
                <thead>
                    <tr>
                        <?php
                            $oResultado=$query->fetchObject();
                            foreach($oResultado as $key=>$valor) {
                                echo "<th span='col'>$key</th>";
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        do{
                            echo"<tr>";
                                foreach ($oResultado as $key => $valor){
                                    switch($key){
                                        case "T02_CodDepartamento":
                                            echo "<th span='row'>$valor</th>";
                                        break;
                                        case "T02_FechaBajaDepartamento":
                                        case "T02_FechaCreacionDepartamento":
                                            if($valor!=null){
                                                echo "<td>".date_format(new DateTime($valor), 'd/m/Y')."</td>";
                                            }
                                        break;
                                        case "T02_VolumenDeNegocio":
                                            echo "<td style='text-align: right;'>".number_format($valor, 2,",",".")." €</td>";
                                        break;
                                        default :
                                            echo "<td>$valor</td>";
                                        break;
                                    }
                                }
                            echo "</tr>";
                        }while($oResultado=$query->fetchObject())
                    ?>
                </tbody>
            </table>
                <?php
                    }else{
                        echo "Selección vacia";
                    }
                }catch(PDOException $e) {
                    echo "Conexión fallida: " . $e->getMessage();
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