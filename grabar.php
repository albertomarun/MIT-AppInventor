<?php

DEFINE ('DBUSER', 'usuario');
DEFINE ('DBPW', 'clave');
DEFINE ('DBHOST', 'localhost');
DEFINE ('DBNAME', 'db_xxx');

$dbc = mysqli_connect(DBHOST,DBUSER,DBPW);
if (!$dbc) {
    die("Error de conexion Base de Datos: " . mysqli_error($dbc));
    exit();
}
 
$dbs = mysqli_select_db($dbc, DBNAME);
if (!$dbs) {
    die("Base de Datos no Existe: " . mysqli_error($dbc));
    exit();
}
 
$Nombre = mysqli_real_escape_string($dbc, $_GET['Nombre']);
$Cargo = mysqli_real_escape_string($dbc,$_GET['Cargo']);
$Telefono = mysqli_real_escape_string($dbc,$_GET['Telefono']);
$Correo = mysqli_real_escape_string($dbc,$_GET['Correo']);
$Usuario_reg = mysqli_real_escape_string($dbc,$_GET['Usuario_reg']);

 
$query = "INSERT INTO contacto (Nombre, Cargo, Telefono, Correo, Usuario_reg) VALUES ('$Nombre', '$Cargo', '$Telefono', '$Correo', '$Usuario_reg')";
 
$result = mysqli_query($dbc, $query) or trigger_error("Error de MySQL: " . mysqli_error($dbc));
 
mysqli_close($dbc);

?>