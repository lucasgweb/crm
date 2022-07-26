<?php $render('header', ['title' => 'Usuarios - LCGTI']) ?>
<?php $render('navbar', ['loggedUser' => $loggedUser]) ?>
<?php $render('sidenav', ['loggedUser' => $loggedUser]) ?>

<?php
$disabled = '';
if ($loggedUser->level == 3) {
	$disabled = 'disabled';
}
?>
<main>
	<header class="page-header page-header-dark bg-primary pb-10">
		<div class="container-fluid px-4">
			<div class="page-header-content pt-4">
				<div class="row align-items-center justify-content-between">
					<div class="col-auto mt-4">
						<h1 class="page-header-title">
							<div class="page-header-icon">
								<i data-feather="file"></i>
							</div>
							Usuarios
						</h1>
						<div class="page-header-subtitle text-sm">
							<blockquote>Gestión de Usuarios</blockquote>
						</div>
					</div>
					<div class="col-12 col-xl-auto mt-4"></div>
				</div>
			</div>
		</div>
	</header>
	<!-- Main page content-->
	<div class="container-fluid px-4 mt-n10">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col pb-3">
						<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#newUser">+ Agregar Usuario</button>
					</div>

				</div>
				<table id="datatablesSimple" class="table-striped">
					<thead>
						<tr>
							<th>Usuario</th>
							<th>Cargo</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Usuario</th>
							<th>Cargo</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($users as $user) : ?>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="btn btn-icon btn-sm btn-transparent-dark me-2"><img class=" img-fluid" src="<?= $base ?>/media/uploads/<?= $user['photo'] ?>" /></div>
										<?= $user['name'] ?>
									</div>
								</td>
								<?php if ($user['level'] == 1) : ?>
									<td>Master</td>
								<?php elseif ($user['level'] == 2) : ?>
									<td>Administrador</td>
								<?php elseif ($user['level'] == 3): ?>
									<td>Asesor</td>
								<?php endif; ?>

								<td>
									<?php if ($user['status'] == 1) : ?>
										<div class="badge bg-success text-white rounded-pill">Activo</div>
									<?php else : ?>
										<div class="badge bg-danger text-white rounded-pill">Inactivo</div>
									<?php endif; ?>

								</td>
								<td>
									<a class="btn btn-datatable btn-icon btn-transparent-dark me-2" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whateverid="<?= $user['id'] ?>" data-bs-whatevername="<?= $user['name'] ?>" data-bs-whateveremail="<?= $user['email'] ?>">
										<i class="bi bi-pencil-square"></i>
									</a>
									<?php if($loggedUser->level < 3):?>
									<a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?= $base ?>/usuario/<?= $user['id'] ?>">
										<i class="bi bi-trash3-fill"></i>
									</a>
									<?php endif?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<ul></ul>
</main>
<!-- Modal new User -->
<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="newUserModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newUserModalCenterTitle">Detalles de la Cuenta</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="card-body">
				<form method="post" action="">
					<!-- Form Row-->
					<div class="mb-3">
						<label class="small mb-1" for="inputName">Nombre</label>
						<input class="form-control" id="inputName" type="text" placeholder="Introduzca el Nombre" name="name" <?= $disabled ?> />
					</div>
					<!-- Form Group (email address)-->
					<div class="mb-3">
						<label class="small mb-1" for="inputEmailAddress">Correo</label>
						<input class="form-control" id="inputEmailAddress" type="email" placeholder="Introduzca el Correo" name="email" <?= $disabled ?> />
					</div>
					<div class="mb-3">
						<label class="small mb-1" for="inputPassword">Contraseña</label>
						<input class="form-control" id="inputPassword" type="password" placeholder="Contraseña" name="password" <?= $disabled ?> />
					</div>

					<!-- Form Group (Roles)-->
					<div class="mb-3">
						<label class="small mb-1">Cargo</label>
						<select class="form-select" aria-label="Default select example" name="level" <?= $disabled ?>>
							<option selected disabled>Seleccione el Cargo:</option>
							<option value="2">Administrator</option>
							<option value="3">Asesor</option>
						</select>
					</div>
					<div class="modal-footer">
						<!-- Submit button-->
						<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
					<button class="btn btn-primary" type="submit" <?= $disabled ?>>Agregar Usuario</button>
					</div>
					
					
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Modal new User -->


<!-- Modal Edit User -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">New message</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= $base ?>/usuarios/edit">
					<input name="id" type="hidden" id="getId" <?= $disabled ?>>
					<!-- Form Row-->
					<div class="mb-3">
						<label class="small mb-1" for="inputName">Nombre</label>
						<input type="text" id="getName" class="form-control" placeholder="Introduzca el Nombre" name="name" <?= $disabled ?> />
					</div>
					<!-- Form Group (email address)-->
					<div class="mb-3">
						<label class="small mb-1" for="getEmail">Correo</label>
						<input class="form-control" id="getEmail" type="email" name="email" placeholder="Introduzca el Correo" <?= $disabled ?> />
					</div>
					<div class="mb-3">
						<label class="small mb-1" for="inputPassword">Contraseña</label>
						<input class="form-control" id="inputPassword" type="password" placeholder="Contraseña" name="password" <?= $disabled ?> />
					</div>
					<div class="mb-3">
						<label class="small mb-1">Status</label>
						<select class="form-select" aria-label="Default select example" name="status" <?= $disabled ?>>
							<option selected disabled>Seleccione un Status:</option>
							<option value="1">Activado</option>
							<option value="2">Inactivo</option>
						</select>
					</div>
					<!-- Form Group (Roles)-->
					<div class="mb-3">
						<label class="small mb-1">Cargo</label>
						<select class="form-select" aria-label="Default select example" name="level" <?= $disabled ?>>
							<option selected disabled>Seleccione el Cargo:</option>
							<option value="2">Administrator</option>
							<option value="3">Asesor</option>
						</select>
					</div>
					<div class="modal-footer">
						<!-- Submit button-->
						<button class="btn btn-primary" type="submit" <?= $disabled ?>>Guardar Cambios</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Edit new User -->
<?php $render('footer') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= $base ?>/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?= $base ?>/js/datatables/datatables-simple-demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js" crossorigin="anonymous"></script>

<script>
	var editModal = document.getElementById('editModal')
	editModal.addEventListener('show.bs.modal', function(event) { // Button that triggered the modal
		var button = event.relatedTarget
		// Extract info from data-bs-* attributes
		var id = button.getAttribute('data-bs-whateverid')
		var name = button.getAttribute('data-bs-whatevername')
		var email = button.getAttribute('data-bs-whateveremail')
		// If necessary, you could initiate an AJAX request here
		// and then do the updating in a callback.
		//
		// Update the modal's content.
		var modalTitle = editModal.querySelector('.modal-title')
		var modalName = editModal.querySelector('#getName')
		var modalEmail = editModal.querySelector('#getEmail')
		var modalId = editModal.querySelector('#getId')

		modalTitle.textContent = ' Editar  ' + name
		modalName.value = name
		modalEmail.value = email
		modalId.value = id
	})
</script>
</body>


</html>