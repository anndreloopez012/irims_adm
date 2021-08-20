<?php 

// detalles de la conexion
$conn_string = "host=174.142.204.91 port=5432 dbname=IrimsINSP user=postgres password=p05tgr35 options='--client_encoding=UTF8'";
 
// establecemos una conexion con el servidor postgresSQL
$rmfInsp = pg_connect($conn_string);
 
// Revisamos el estado de la conexion en caso de errores. 
if(!$rmfInsp) {
echo "Error: No se ha podido conectar a la base de datos\n";
} 
// Close connection
// pg_close($rmfInsp);
 
?>