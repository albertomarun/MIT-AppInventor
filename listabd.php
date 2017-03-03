<?php

DEFINE ('DBUSER', 'usuario');
DEFINE ('DBPW', 'clave');
DEFINE ('DBHOST', 'localhost');
DEFINE ('DBNAME', 'db_xxx');


$dbc = mysqli_connect(DBHOST,DBUSER,DBPW);
$dbc->set_charset("utf8");
if (!$dbc) {
    die("Error de conexion Base de Datos: " . mysqli_error($dbc));
    exit();
}

$dbs = mysqli_select_db($dbc, DBNAME);
if (!$dbs) {
    die("Base de Datos no Existe: " . mysqli_error($dbc));
    exit();
}

$result = mysqli_query($dbc, "SHOW COLUMNS FROM contacto");
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows > 0) {
 
/* Aqui cambia el nombre del Usuario que Registra */

$values = mysqli_query($dbc, "SELECT * FROM contacto WHERE Usuario_reg='Alberto'");
while ($rowr = mysqli_fetch_row($values)) {
 for ($j=0;$j<$numberOfRows;$j++) {
  $csv_output .= $rowr[$j].", ";
 }
 $csv_output .= "\n";
}
 
}
 
print $csv_output;
exit;
?>
