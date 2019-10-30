<?php 
	include("db.php");
//EDITAR TAREA SELECCIONADA
	if (isset($_GET['id'])) { //SI EXISTE UN VALOR LLAMADO ID..
		$id = $_GET['id']; //LO GUARDAMOS EN UNA VARIABLE..
		$query = "SELECT * FROM task WHERE id = $id";//SELECCIONAMOS LA TAREA CON ESE ID
		$result = $pdo->prepare($query);
		$result->execute();//EJECUTAMOS LA CONSULTA

		if ($result->rowCount() == 1) {//SI EL RESULTADO NOS DEVUELVE UNA SOLA FILA..
			$row = $result -> fetch();//TOMAMOS ESA FILA Y LA GUARDAMOS EN LA VARIABLE $ROW..
			$title = $row['title'];
			//TOMAMOS EL TITLE DE LA FILA(TAREA) Y LO GUARDAMOS EN VARIABLE
			$description = $row['description'];
		}
	}
        
	if (isset($_POST['update'])) { //COMPROBAMOS SI EXISTEN LOS DATOS DEL FORM
		$id = $_GET['id'];//LOS TOMAMOS Y GUARDAMOS
		$title = $_POST['title'];
		$description = $_POST['description'];
                //ACTUALIZAMOS LA TAREA CON ESE ID
		$query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
		$result = $pdo->prepare($query);
		$result->execute();

		$_SESSION['message'] = 'Task Updated successfully';//SESSION PARA MOSTRAR EN LA VISTA
		$_SESSION['message_type'] = 'info';
		header("Location: index.php");//REDIRECCIONAMOS
	}

 ?>

 <?php include("includes/header.php") ?>
	
	<!-- CREAMOS EL FORMULARIO PARA EDITAR(UPDATE). -->
	<div class="container p-4">
		<div class="row">
			<div class="col-md-4 mx-auto">
				<div class="card card-body">
					<form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
						<div class="form-group">
							<input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update Title">
						</div>
						<div class="form-group">
							<textarea name="description" rows="2" class="form-control" placeholder="Update Description">
								<?php echo $description; ?>
							</textarea>
						</div>
						<button class="btn btn-success" name="update">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>

 <?php include("includes/footer.php") ?>