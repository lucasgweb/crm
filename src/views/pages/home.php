<?php $render('header', ['title' => 'Home - LCGTI']) ?>
<?php $render('navbar', ['loggedUser' => $loggedUser]) ?>
<?php $render('sidenav', ['loggedUser' => $loggedUser]) ?>

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
							Home
						</h1>
						<div class="page-header-subtitle text-sm">
						</div>
					</div>
					<div class="col-12 col-xl-auto mt-4"></div>
				</div>
				<div class="row justify-content-end">
					<div class="col-sm-auto">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="#">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Usuarios</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>

</main>

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