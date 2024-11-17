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
            <h1>Ejercicio 05 PDO</h1>
        </header>
        <main>
            <div>
                <?php
                    /**
                     * @author Luis Ferreras González
                     * @version Fecha de última modificación 11/11/2024
                     */

                    //Incluimos la libreria de validacion de formularios
                    require_once '../core/confDBPDO.php';
                    $aDepartamentosCorrectos=[
                        [
                            'codigo'=>'AAA',
                            'descripcion'=>'Prueba inserción AAA',
                            'volumen'=>100.52
                        ],
                        [
                            'codigo'=>'BBB',
                            'descripcion'=>'Prueba inserción BBB',
                            'volumen'=>56
                        ],
                        [
                            'codigo'=>'CCC',
                            'descripcion'=>'Prueba inserción CCC',
                            'volumen'=>40.9
                        ]
                    ];

                    //Inserción correcta de los datos
                    try{
                        $conn=new PDO(SERVIDOR, USUARIO, CONTRASENA);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $conn->beginTransaction();
                            foreach($aDepartamentosCorrectos as $departamento){
                                $insercion=$conn->prepare("INSERT INTO DB208DWESProyectoTema4.T02_Departamento(T02_CodDepartamento, T02_DescDepartamento, T02_VolumenDeNegocio) VALUES (:codigo, :descripcion, :volumen);");
                                $insercion->bindParam(":codigo", $departamento['codigo']);
                                $insercion->bindParam(":descripcion", $departamento['descripcion']);
                                $insercion->bindParam(":volumen", $departamento['volumen']);
                                $insercion->execute();
                            }
                        $conn->commit();
                    }catch(PDOException $e) {
                        $conn->rollBack();
                        echo "<p class='error'>Error en ejecucion: " . $e->getMessage()."</p>";
                    } finally {
                        unset($conn);
                    }
                ?>
            </div>
            <div>
                <?php
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
                    } finally {
                        unset($conn);
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