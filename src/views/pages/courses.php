<?php $render('header', ['title' => 'Usuarios - LCGTI']) ?>
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
                            Administrar Cursos
                        </h1>
                        <div class="page-header-subtitle text-sm">
                            <blockquote>Gestión de Cursos</blockquote>
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
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#newUser">+ Agregar Curso</button>
                    </div>
                </div>
                <table id="datatablesSimple" class="table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Curso</th>
                            <th>Cant. horas</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Curso</th>
                            <th>Cant. horas</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whateverid=">" data-bs-whatevername="" data-bs-whateveremail="">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?= $base ?>/usuario/">
                                    <i class="bi bi-trash3-fill"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <ul></ul>
</main>
<!-- Modal new Course -->
<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="newUserModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserModalCenterTitle">Detalles del Curso</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card-body">
            <form method="post" action="">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputDni">Codigo Curso</label>
                                    <input class="form-control" id="inputDni" type="number" placeholder="Ingresar Codigo" name="code" />
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-2">Categoría</label>
                                    <select class="form-control" name="categoryId">
                                        <option selected>Seleccionar</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1">Descripcion</label>
                                    <input class="form-control" id="inputPassword" type="text" placeholder="Ingresar Descripción" name="address"  />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputName">Nombre</label>
                                    <input class="form-control" id="inputEmailAddress" type="text" placeholder="Ingresar Curso" name="name"/>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputCantHoras">Cantidad Horas</label>
                                    <input class="form-control" id="inputCantHoras" type="number" placeholder="Ingresar cant. horas" name="hours"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Agregar Curso</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal new Course -->

<!-- Modal Edit Course -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="post" action="">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputDni">Codigo Curso</label>
                                    <input class="form-control" id="inputDni" type="number" placeholder="Ingresar Codigo" name="code" />
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-2">Categoría</label>
                                    <select class="form-control" name="categoryId">
                                        <option selected>Seleccionar</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1">Descripcion</label>
                                    <input class="form-control" id="inputPassword" type="text" placeholder="Ingresar Descripción" name="address"  />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputName">Nombre</label>
                                    <input class="form-control" id="inputEmailAddress" type="text" placeholder="Ingresar Curso" name="name"/>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputCantHoras">Cantidad Horas</label>
                                    <input class="form-control" id="inputCantHoras" type="number" placeholder="Ingresar cant. horas" name="hours" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Course -->
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