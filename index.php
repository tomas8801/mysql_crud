<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">

	<div class="row">
		
		<div class="col-md-4">
			<!-- si existe dentro de la var session un valor llamdo 'message'.. -->
			<?php if(isset($_SESSION['message'])) { ?>
				<div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
					<?= $_SESSION['message']; ?>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>

			<?php session_unset(); } ?><!-- borramos la sesion y el mensaje-->
			
			<div class="card card-body">
				<form action="save_task.php" method="POST">
					<div class="form-group">
						<input type="text" name="title" class="form-control" placeholder="task title" autofocus="">
						<div class="form-group">
							<textarea name="description" rows="2" class="form-control" placeholder="task Description"></textarea>
						</div>
						<input type="submit" class="btn btn-success btn-block" name="save_task" value="Save task">
					</div>
				</form>
			</div>

		</div>

		<div class="col-md-8">
			<table class="table table-bordered">
                            <!-- TABLA DE TAREAS -->
				<thead>
					<tr>
						<th>Title</th>
						<th>Description</th>
						<th>Created At</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$query = "SELECT * FROM task";  //SELECCIONAMOS TODAS LAS TAREAS DE LA DDBB
					$result_task = $pdo->prepare($query);
					$result_task->execute();

					while ($row = $result_task->fetch(PDO::FETCH_ASSOC)) { ?><!-- RECORREMOS LOS DATOS-->
						<tr>
							<td><?php echo $row['title'] ?></td><!-- PINTAMOS -->
							<td><?php echo $row['description'] ?></td><!-- PINTAMOS -->
							<td><?php echo $row['created_at'] ?></td><!-- PINTAMOS -->
							<td>
								<a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
								<a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
							</td>
						</tr>
					
					 
					<?php } ?>
				</tbody>
				
			</table>
		</div>

	</div>
	
</div>

<?php include("includes/footer.php") ?>