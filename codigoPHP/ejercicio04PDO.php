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
            <h1>Ejercicio 04 PDO</h1>
        </header>
        <main>
            <div>
                <?php
                    /**
                     * @author Luis Ferreras González
                     * @version Fecha de última modificación 11/11/2024
                     */

                    //Incluimos la libreria de validacion de formularios
                    if(!isset($_REQUEST['descripionDep'])){
                        $_REQUEST['descripionDep']=null;
                    }
                    require_once '../core/confDBPDO.php';
                ?>
                <form name="plantilla" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
                    <!-- Campo de texto alfanumérico obligatorio -->
                    <div class="form-group">
                        <label for="descripionDep">Descripción Departamento:</label>
                        <input type="text" id="descripionDep" name="descripionDep" placeholder="Ej: Descripción" style="background-color: lightyellow" maxlength="255" minlength="0" value="<?php echo (isset($_REQUEST['descripionDep']) ? $_REQUEST['descripionDep'] : ''); ?>">
                        <?php if (!empty($aErrores['descripionDep'])) { ?> <span style="color: red"><?php echo $aErrores['descripionDep']; ?></span> <?php } ?>
                    </div>
                    <!-- Botón de envío -->
                    <div class="form-group">
                        <input id="enviar" name="enviar" type="submit" value="Buscar">
                    </div>
                </form>
            </div>
            <div>
                <?php
                    try{
                        $conn = new PDO(SERVIDOR, USUARIO, CONTRASENA);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $query=$conn->prepare("SELECT * FROM T02_Departamento "
                                . "WHERE T02_DescDepartamento LIKE "
                                . ":descripcion;");
                        $query->bindValue(':descripcion', "%".$_REQUEST['descripionDep']."%");
                        $query->execute();
                        if ($oResultado=$query->fetchObject()){
                ?>
                <table>
                    <thead>
                        <tr>
                            <?php
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