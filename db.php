<?php  

	session_start();
	try {
                // conexion pdo a la base de datos
		$dsn = 'mysql:host=localhost;dbname=crud_mysql';
		$usuario = 'root';
		$clave 	 = '';
		$pdo = new PDO($dsn, $usuario, $clave);

	//-------------------------------------------------




} catch (PDOException $e){
	echo "Error: " . $e->getMessage();
}


?>