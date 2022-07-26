<?php $render('header', ['title' => 'Categorías - LCGTI']) ?>
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
                            Administrar Categorías
                        </h1>
                        <div class="page-header-subtitle text-sm">
                            <blockquote>Gestión de Categorías</blockquote>
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
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#newUser">+ Agregar Categoría</button>
                    </div>
                </div>
                <table id="datatablesSimple" class="table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Categoría</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Categoría</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($categorys as $category) : ?>
                            <tr>
                                <td><?= $category['id']; ?></td>
                                <td><?= $category['category']; ?></td>
                                <td>
                                    <?php if ($category['status'] == 1) : ?>
                                        <h5>
                                            <div class="badge bg-success text-white">Activo</div>
                                        </h5>
                                    <?php else : ?>
                                        <h5>
                                            <div class="badge bg-danger text-white">Inactivo</div>
                                        </h5>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whateverid="<?= $category['id'] ?>" data-bs-whatevercategory="<?= $category['category'] ?>" data-bs-whateveremail="">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?= $base ?>/deleteCategory?id=<?= $category['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">
                                        <i class="bi bi-trash3-fill"></i>
                                    </a>
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
<!-- Modal new Categoria -->
<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="newUserModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserModalCenterTitle">Detalles de la Categoría</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="mb-3">
                        <label class="small mb-1" for="input">Categoría</label>
                        <input class="form-control" id="input" type="text" placeholder="Ingresar categoría" name="category" />
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Agregar Categoría</button>
                    </div>
                    <!-- Submit button-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal new User -->

<!-- Modal Edit User -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= $base ?>/categoriasUpdate">
                    <input type="hidden" id="getId" name="id">
                    <div class="mb-3">
                        <label class="small mb-1" for="getCategory">Categoría</label>
                        <input id="getCategory" class="form-control" type="text" placeholder="Ingresar categoría" name="category" />
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="status">Estado</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1">Activado</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                    </div>
                    <!-- Submit button-->
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
    editModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget

        var id = button.getAttribute('data-bs-whateverid')
        var category = button.getAttribute('data-bs-whatevercategory')

        var modalTitle = editModal.querySelector('.modal-title')
        var modalName = editModal.querySelector('#getCategory')
        var modalId = editModal.querySelector('#getId')

        modalTitle.textContent = ' Editar ' + category
        modalName.value = category
        modalId.value = id
    })
</script>
</body>


</html>