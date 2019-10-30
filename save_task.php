<?php 

include("db.php");

if (isset($_POST['save_task'])) {   // SI EXISTE A TRAVES DEL METODO POST UN VALOR LLAMADO SAVE TASK (algo estan mandando).

	$title = $_POST['title']; // VALORES DE AMBOS INPUTS.
	$description = $_POST['description'];


	$query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";

	$stmt = $pdo->prepare($query);//PREPARAMOS LA CONSULTA.
	$stmt->execute();//EJECUTAMOS LA CONSULTA.
	if(!$stmt) {
		die("Query Failed");
	}

	$_SESSION['message'] = 'Task Saved succesfully';
	$_SESSION['message_type'] = 'success';
	header("Location: index.php");// REDIRECCION A LA PAGINA INICIAL
}


 ?>