<!DOCTYPE html>
<!--Autor: Luis Ferreras González
    15/10-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
        <link type="text/css" rel="stylesheet" href="webroot/estilos.css">
    </head>
    <body>
        <header>
            <h1>Desarrollo Web en Entorno Servidor</h1>
        </header>
        <main>
            <ul>
                <li><a href="mostrarcodigo/muestraScriptCreacion.php">Crear base de datos</a></li>
                <li><a href="mostrarcodigo/muestraScriptCarga.php">Inicialización base de datos</a></li>
                <li><a href="mostrarcodigo/muestraScriptBorrado.php">Borrar base de datos</a></li>
                <li><a href="mostrarcodigo/muestraConfDBPDO.php">Fichero configuración PDO</a></li>
                <li><a href="mostrarcodigo/muestraConfDBMySQLi.php">Fichero configuración MySQLi</a></li>
            </ul>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Ej.</th>
                        <th>Enunciado</th>
                        <th colspan="2">PDO</th>
                        <th colspan="2">MySQLi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th span="row" class="num">01</th>
                        <td>Conexión a la base de datos con la cuenta usuario y tratamiento de errores</td>
                        <td class="eje">
                            <a href="codigoPHP/ejercicio01PDO.php">Ejecutar</a>
                        </td>
                        <td class="mos">
                            <a href="mostrarcodigo/muestraEjercicio01PDO.php">Mostrar</a>
                        </td>
                        <td class="eje">
                            <a href="codigoPHP/ejercicio01MySQLi.php">Ejecutar</a>
                        </td>
                        <td class="mos">
                            <a href="mostrarcodigo/muestraEjercicio01MySQLi.php">Mostrar</a>
                        </td>
                    </tr><!--01-->
                    <tr>
                        <th span="row" class="num">02</th>
                        <td>Mostrar el contenido de la tabla Departamento y el número de registros.</td>
                        <td class="eje">
                            <a href="codigoPHP/ejercicio02PDO.php">Ejecutar</a>
                        </td>
                        <td class="mos">
                            <a href="mostrarcodigo/muestraEjercicio02PDO.php">Mostrar</a>
                        </td>
                        <td class="eje">
                            <a href="codigoPHP/ejercicio02MySQLi.php">Ejecutar</a>
                        </td>
                        <td class="mos">
                            <a href="mostrarcodigo/muestraEjercicio02MySQLi.php">Mostrar</a>
                        </td>
                    </tr><!--02-->
                    <tr>
                        <th span="row" class="num">03</th>
                        <td>Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores.</td>
                        <td class="eje">
                            <a href="codigoPHP/ejercicio03PDO.php">Ejecutar</a>
                        </td>
                        <td class="mos">
                            <a href="mostrarcodigo/muestraEjercicio03PDO.php">Mostrar</a>
                        </td>
                        <td class="eje">
                            <!--<a href="codigoPHP/ejercicio0MySQLi.php">Ejecutar</a>-->
                        </td>
                        <td class="mos">
                            <!--<a href="mostrarcodigo/muestraEjercicio0MySQLi.php">Mostrar</a>-->
                        </td>
                    </tr><!--03-->
                    <tr>
                        <th span="row" class="num">04</th>
                        <td>Formulario de búsqueda de departamentos por descripción.</td>
                        <td class="eje">
                            <a href="codigoPHP/ejercicio04PDO.php">Ejecutar</a>
                        </td>
                        <td class="mos">
                            <a href="mostrarcodigo/muestraEjercicio04PDO.php">Mostrar</a>
                        </td>
                        <td class="eje">
                            <!--<a href="codigoPHP/ejercicio0MySQLi.php">Ejecutar</a>-->
                        </td>
                        <td class="mos">
                            <!--<a href="mostrarcodigo/muestraEjercicio0MySQLi.php">Mostrar</a>-->
                        </td>
                    </tr><!--04-->
                    <tr>
                        <th span="row" class="num">05</th>
                        <td>Pagina web que añade varios registros a nuestra tabla Departamento utilizando instrucciones insert y una transacción, de tal forma que se añadan todos registros o no se añade ninguno</td>
                        <td class="eje">
                            <a href="codigoPHP/ejercicio05PDO.php">Ejecutar</a>
                        </td>
                        <td class="mos">
                            <a href="mostrarcodigo/muestraEjercicio05PDO.php">Mostrar</a>
                        </td>
                        <td class="eje">
                            <!--<a href="codigoPHP/ejercicio0MySQLi.php">Ejecutar</a>-->
                        </td>
                        <td class="mos">
                            <!--<a href="mostrarcodigo/muestraEjercicio0MySQLi.php">Mostrar</a>-->
                        </td>
                    </tr><!--05-->
                    <tr>
                        <th span="row" class="num">06</th>
                        <td>Página web que pruebe consultas preparadas sin bind, pasando los parámetros en un array a execute.</td>
                        <td class="eje">
                            <a href="codigoPHP/ejercicio06PDO.php">Ejecutar</a>
                        </td>
                        <td class="mos">
                            <a href="mostrarcodigo/muestraEjercicio06PDO.php">Mostrar</a>
                        </td>
                        <td class="eje">
                            <!--<a href="codigoPHP/ejercicio0MySQLi.php">Ejecutar</a>-->
                        </td>
                        <td class="mos">
                            <!--<a href="mostrarcodigo/muestraEjercicio0MySQLi.php">Mostrar</a>-->
                        </td>
                    </tr><!--06-->
                    <tr>
                        <th span="row" class="num">07</th>
                        <td>Página web que toma datos de un fichero xml y los añade a la tabla Departamento de nuestra base de datos. El fichero importado se encuentra en el directorio .../tmp/ del servidor.</td>
                        <td class="eje">
                            <!--<a href="codigoPHP/ejercicio0PDO.php">Ejecutar</a>-->
                        </td>
                        <td class="mos">
                            <!--<a href="mostrarcodigo/muestraEjercicio0PDO.php">Mostrar</a>-->
                        </td>
                        <td class="eje">
                            <!--<a href="codigoPHP/ejercicio0MySQLi.php">Ejecutar</a>-->
                        </td>
                        <td class="mos">
                            <!--<a href="mostrarcodigo/muestraEjercicio0MySQLi.php">Mostrar</a>-->
                        </td>
                    </tr><!--07-->
                    <tr>
                        <th span="row" class="num">08</th>
                        <td>Página web que toma datos de la tabla Departamento y guarda en un fichero departamento.xml. El fichero exportado se encuentra en el directorio .../tmp/ del servidor.</td>
                        <td class="eje">
                            <a href="codigoPHP/ejercicio08PDO.php">Ejecutar</a>
                        </td>
                        <td class="mos">
                            <a href="mostrarcodigo/muestraEjercicio08PDO.php">Mostrar</a>
                        </td>
                        <td class="eje">
                            <!--<a href="codigoPHP/ejercicio0MySQLi.php">Ejecutar</a>-->
                        </td>
                        <td class="mos">
                            <!--<a href="mostrarcodigo/muestraEjercicio0MySQLi.php">Mostrar</a>-->
                        </td>
                    </tr><!--08-->
                    <tr>
                        <th span="row" class="num">09</th>
                        <td>Aplicación resumen MtoDeDepartamentosTema4.</td>
                        <td class="eje">
                            <!--<a href="codigoPHP/ejercicio0PDO.php">Ejecutar</a>-->
                        </td>
                        <td class="mos">
                            <!--<a href="mostrarcodigo/muestraEjercicio0PDO.php">Mostrar</a>-->
                        </td>
                        <td class="eje">
                            <!--<a href="codigoPHP/ejercicio0MySQLi.php">Ejecutar</a>-->
                        </td>
                        <td class="mos">
                            <!--<a href="mostrarcodigo/muestraEjercicio0MySQLi.php">Mostrar</a>-->
                        </td>
                    </tr><!--09-->
                    <tr>
                        <th span="row" class="num">10</th>
                        <td>Aplicación resumen MtoDeDepartamentos POO y multicapa.</td>
                        <td class="eje">
                            <!--<a href="codigoPHP/ejercicio0PDO.php">Ejecutar</a>-->
                        </td>
                        <td class="mos">
                            <!--<a href="mostrarcodigo/muestraEjercicio0PDO.php">Mostrar</a>-->
                        </td>
                        <td class="eje">
                            <!--<a href="codigoPHP/ejercicio0MySQLi.php">Ejecutar</a>-->
                        </td>
                        <td class="mos">
                            <!--<a href="mostrarcodigo/muestraEjercicio0MySQLi.php">Mostrar</a>-->
                        </td>
                    </tr><!--10-->
                </tbody>
            </table>
            <div style='height: 30px'></div>
        </main>
        <footer>
            <a href="../index.php">Luis Ferreras</a>
            <a href="../208DWESProyectoDWES/indexProyectoDWES.php">DWES</a>
            <a href="https://github.com/LuisFerrGon/208DWESProyectoTema3">GitHub</a>
        </footer>
    </body>
</html>
