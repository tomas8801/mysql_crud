<?php 
// ELIMINAMOS LA TAREA SELECCIONADA DE LA DDBB
	include("db.php");
        
	if (isset($_GET['id'])) {
                //tomamos el parametro id enviado por la url
		$id = $_GET['id'];
                //eliminamos la tarea con ese parametro
		$query = "DELETE FROM task WHERE id = $id";
		$result_delete = $pdo->prepare($query);
		$result_delete->execute();
                
                //combrobamos si se elimino correctamente
		if (!$result_delete) {
			die("query failed cabeza");
		}
			$_SESSION['message'] = 'Task Removed succesfully';
			$_SESSION['message_type'] = 'danger';
			header("Location: index.php");// REDIRECCION A LA PAGINA INICIAL
	}
 ?>