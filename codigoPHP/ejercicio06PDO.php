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
            <h1>Ejercicio 06 PDO</h1>
        </header>
        <main>
            <div>
                <?php
                    /**
                     * @author Luis Ferreras González
                     * @version Fecha de última modificación 11/11/2024
                     */

                    //Incluimos la libreria de validacion de formularios
                    require_once('../core/231018libreriaValidacion.php');
                    require_once '../core/confDBPDO.php';

                    //Definición de constantes que utilizaremos en prácticamente todos los métodos de la librería
                    define('OBLIGATORIO', 1);
                    define('OPCIONAL', 0);
                    //Definición de constantes para comprobarAlfaNumérico
                    define('T_MAX_ALFANUMERICO',1000);
                    define('T_MIN_ALFANUMERICO',1);

                    //Inicialización de las variables
                    $entradaOK = true; //Variable que nos indica que todo va bien

                    //Array donde recogemos los mensajes de error
                    $aErrores = [
                        'codigoDep' => '',
                        'descripionDep' => '',
                        'volumenNeg' => ''
                    ]; 

                    //Array donde recogeremos las respuestas correctas (si $entradaOK)
                    $aRespuestas = [
                        'codigoDep' => '',
                        'descripionDep' => '',
                        'volumenNeg' => ''
                    ];
                    // Verifica si el formulario ha sido enviado
                    if (isset($_REQUEST['enviar'])) {
                        $codigoFormulario=$_REQUEST['codigoDep'];
                        //Para cada campo del formulario: Validar entrada y actuar en consecuencia
                        $aErrores['codigoDep']=validacionFormularios::comprobarAlfabetico($codigoFormulario, 3, 3, OBLIGATORIO);
                        $aErrores['descripionDep']=validacionFormularios::comprobarAlfanumerico($_REQUEST['descripionDep'], T_MAX_ALFANUMERICO, T_MIN_ALFANUMERICO, OBLIGATORIO);
                        $aErrores['volumenNeg']=validacionFormularios::comprobarFloat($_REQUEST['volumenNeg'], PHP_FLOAT_MAX, 0.01, OBLIGATORIO);
                        if($aErrores['codigoDep']==null){
                            $patron="/^[A-Z]{3}$/";
                            if(preg_match($patron, $codigoFormulario)==0){
                                $aErrores['codigoDep']='Se deben introducir tres letras mayúsculas';
                            }else{
                                try{
                                    $conn = new PDO(SERVIDOR, USUARIO, CONTRASENA);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $seleccion=$conn->prepare("SELECT T02_CodDepartamento FROM DB208DWESProyectoTema4.T02_Departamento "
                                            . "WHERE T02_CodDepartamento LIKE :codigo;");
                                    $seleccion->bindParam(':codigo', $codigoFormulario);
                                    $seleccion->execute();
                                    if($seleccion->fetchObject()){
                                        $aErrores['codigoDep']='No se deben introducir códigos repetidos';
                                    }
                                }catch(PDOException $e) {
                                    echo $e->getMessage();
                                }finally {
                                    unset($conn);
                                }
                            }
                        }
                        //Recorremos el array de errores
                        foreach ($aErrores as $clave => $valor) {
                            if ($valor != null) {
                                $entradaOK = false;
                                //Limpiamos el campo si hay un error
                                $_REQUEST[$clave] = '';
                            }
                        }
                    } else {
                        //El formulario no se ha rellenado nunca
                        $entradaOK = false;
                    }

                    //Tratamiento del formulario
                    if($entradaOK){
                        //Almacenamos el valor en el array
                        $aRespuestas = [
                            'codigoDep' => $_REQUEST['codigoDep'],
                            'descripionDep' => $_REQUEST['descripionDep'],
                            'volumenNeg' => $_REQUEST['volumenNeg']
                        ];
                        try{
                            $conn = new PDO(SERVIDOR, USUARIO, CONTRASENA);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $query=$conn->prepare("INSERT INTO DB208DWESProyectoTema4.T02_Departamento"
                                    . "(T02_CodDepartamento, T02_DescDepartamento, T02_VolumenDeNegocio)"
                                . "VALUES"
                                    . "(:codigo, :descripcion, :volumen);");
                            $departamentoNuevo=array(':codigo'=>$aRespuestas['codigoDep'], ':descripcion'=>$aRespuestas['descripionDep'], ':volumen'=>$aRespuestas['volumenNeg']);
                            $query->execute($departamentoNuevo);#
                        }catch(PDOException $e) {
                            echo "Error en la ejecución: " . $e->getMessage();
                        }finally {
                            unset($conn);
                        }
                    }
                ?>
                <form name="plantilla" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
                    <!-- Campo de texto alfabetico obligatorio -->
                    <div class="form-group">
                        <label for="codigoDep">Código Departamento:</label>
                        <input type="text" id="codigoDep" name="codigoDep" placeholder="Ej: ABC" style="background-color: lightyellow" required maxlength="3" minlength="3" value="<?php echo (isset($_REQUEST['codigoDep']) ? $_REQUEST['codigoDep'] : ''); ?>">
                        <?php if (!empty($aErrores['codigoDep'])) { ?> <span style="color: red"><?php echo $aErrores['codigoDep']; ?></span> <?php } ?>
                    </div>
                    <!-- Campo de texto alfanumérico obligatorio -->
                    <div class="form-group">
                        <label for="descripionDep">Descripción Departamento:</label>
                        <input type="text" id="descripionDep" name="descripionDep" placeholder="Ej: Descripción" style="background-color: lightyellow" required value="<?php echo (isset($_REQUEST['descripionDep']) ? $_REQUEST['descripionDep'] : ''); ?>">
                        <?php if (!empty($aErrores['descripionDep'])) { ?> <span style="color: red"><?php echo $aErrores['descripionDep']; ?></span> <?php } ?>
                    </div>
                    <!-- Campo numérico float obligatorio -->
                    <div class="form-group">
                        <label for="volumenNeg">Volumen Negocio:</label>
                        <input type="number" id="volumenNeg" name="volumenNeg" step="0.01" style="background-color: lightyellow" required min="0.01" value="<?php echo (isset($_REQUEST['volumenNeg']) ? $_REQUEST['volumenNeg'] : ''); ?>">
                        <?php if (!empty($aErrores['volumenNeg'])) { ?> <span style="color: red"><?php echo $aErrores['volumenNeg']; ?></span> <?php } ?>
                    </div>     
                    <!-- Botón de envío -->
                    <div class="form-group">
                        <input id="enviar" name="enviar" type="submit" value="Añadir">
                    </div>
                </form>
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
                        echo "Error en la ejecución: " . $e->getMessage();
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