<?php $render('header', ['title' => 'Mis Leads - LCGTI']) ?>
<?php $render('navbar', ['loggedUser' => $loggedUser]) ?>
<?php $render('sidenav', ['loggedUser' => $loggedUser]) ?>

<main>

    <header class="page-header page-header-dark bg-primary pb-10">
        <div class="container-fluid px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="grid"></i></div>
                            Mis Leads
                        </h1>
                        <div class="page-header-subtitle text-sm">Gestión de Leads</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid px-4 mt-n10">

        <div class="card mb-4 pt-4">
            <div class="container-fluid">

            </div>
            <form class="row justify-content-center" method="get" action="">
                <div class="col-auto">
                    <label class="form-label">
                        <span class="text-xs fw-400">Fecha Inicio:</span>
                        <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="basic-addon1"><i data-feather="calendar"></i></span>
                            <input type="date" class="form-control" placeholder="Fecha inicio" name="startDate">
                        </div>
                    </label>
                </div>
                <div class="col-auto">
                    <label class="form-label">
                        <span class="text-xs fw-400">Fecha Fin:</span>
                        <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="basic-addon1"><i data-feather="calendar"></i></span>
                            <input type="date" class="form-control" placeholder="Fecha Fin" name="endDate">
                        </div>
                    </label>
                </div>

                <div class="col-auto">
                    <label class="form-label">
                        <span class="text-xs fw-400">Estado:</span>
                        <select class="form-select" name="salestatus">
                            <option value="" selected>Seleccione un Estado:</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="No Contesta">No Contesta</option>
                            <option value="Confirmara">Confirmara</option>
                            <option value="No Interesado/a">No Interesado/a</option>
                            <option value="Pagará">Pagará</option>
                            <option value="Competencia">Competencia</option>
                            <option value="Pagado">Pagado</option>
                            <option value="Volver a Llamar">Volver a Llamar</option>
                            <option value="Mas adelante / Economia">Mas adelante / Economia</option>
                            <option value="Otra Institución">Otra Institución</option>
                            <option value="Apagado/Ocupado">Apagado/Ocupado</option>
                            <option value="Suspendida">Suspendida</option>
                            <option value="Contacto con Tercero">Contacto con Tercero</option>
                            <option value="Sin Contacto">Sin Contacto</option>
                            <option value="Numero equivocado / No Aplica">Numero equivocado / No Aplica</option>
                            <option value="WhatsApp / Correo">WhatsApp / Correo</option>
                            <option value="Desiste">Desiste</option>
                        </select>
                    </label>
                </div>

                <div class="col-auto">
                    <br>
                    <button type="submit" class="btn btn-light bg-primary text-white" value="pesquisar" name="PesquisarEntreDatas">+
                        Consultar</button>

                </div>
            </form>

            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha de Registro</th>
                            <th>Estado</th>
                            <th>Nombre</th>
                            <th>Curso</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Canal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Fecha de Registro</th>
                            <th>Estado</th>
                            <th>Nombre</th>
                            <th>Curso</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Canal</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach (array_reverse($leads) as $lead) : ?>
                            <tr>
                                <td><?= $lead['created_at'] ?></td>
                                <td><?= $lead['salestatus'] ?></td>
                                <td><?= $lead['name'] ?></td>
                                <td><?= $lead['curso'] ?></td>
                                <td><?= $lead['phone'] ?></td>
                                <td><?= $lead['email'] ?></td>
                                <td><?= $lead['channel'] ?></td>
                                <td>

                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whateverid="<?= $lead['id'] ?>" data-bs-whateverstatus="<?= $lead['salestatus'] ?>">
                                            <i class="bi bi-pencil-square"></i></a>

                                        <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" data-bs-toggle="modal" data-bs-target="#editCommentModal" data-bs-whateveridLead="<?= $lead['id'] ?>" data-bs-whateverComment="<?= $lead['comment'] ?>">
                                            <i class="bi bi-chat-left-text-fill"></i></a>

                                        <a class="btn btn-datatable btn-icon btn-transparent-dark" data-bs-toggle="modal" data-bs-target="#seeLeadModal" data-bs-whateveridLead="<?= $lead['id'] ?>" data-bs-whateverComment="<?= $lead['comment'] ?>" data-bs-whateverstatus="<?= $lead['salestatus'] ?>">
                                            <i class="bi bi-eye-fill"></i></a>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Editar Lead</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= $base ?>/mi-lead-update" method="post">
                    <input type="hidden" name="id" id="getEditId" value=''>
                    <div class="row">
                        <label class="form-label">
                            <span class="text-xs fw-400">Estado:</span>
                            <div class="col">
                                <select class="form-select" name="status">
                                    <option id="statusLead" selected>Seleccione un Estado:</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="No Contesta">No Contesta</option>
                                    <option value="Confirmara">Confirmara</option>
                                    <option value="No Interesado/a">No Interesado/a</option>
                                    <option value="Pagará">Pagará</option>
                                    <option value="Competencia">Competencia</option>
                                    <option value="Pagado">Pagado</option>
                                    <option value="Volver a Llamar">Volver a Llamar</option>
                                    <option value="Mas adelante / Economia">Mas adelante / Economia</option>
                                    <option value="Otra Institución">Otra Institución</option>
                                    <option value="Apagado/Ocupado">Apagado/Ocupado</option>
                                    <option value="Suspendida">Suspendida</option>
                                    <option value="Contacto con Tercero">Contacto con Tercero</option>
                                    <option value="Sin Contacto">Sin Contacto</option>
                                    <option value="Numero equivocado / No Aplica">Numero equivocado / No Aplica</option>
                                    <option value="WhatsApp / Correo">WhatsApp / Correo</option>
                                    <option value="Desiste">Desiste</option>
                                </select>
                            </div>
                        </label>
                    </div>
                    <br>
                    <div class="modal-footer"><button class="btn btn btn-light" type="button" data-bs-dismiss="modal">Cerrar</button><button class="btn btn-primary" type="submit">Guardar
                            Cambios</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Comment Edit -->
<div class="modal fade" id="editCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Editar Comentario</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= $base ?>/mi-lead-update" method="post">
                    <input type="hidden" name="id" id="getId" value=''>

                    <div class="row">
                        <label class="form-label">
                            <div class="col">
                                <span class="text-xs fw-400">Comentario:</span>
                                <textarea class="form-control getComments" rows="3" placeholder="Ingresar Descripción" name="comment"></textarea>
                            </div>
                        </label>
                    </div>
            </div>
            <br>
            <div class="modal-footer"><button class="btn btn btn-light" type="button" data-bs-dismiss="modal">Cerrar</button><button class="btn btn-primary" type="submit">Guardar Cambios</button></div>
            </form>
        </div>
    </div>
</div>

<!-- See-->
<div class="modal fade" id="seeLeadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Visualizar Lead</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= $base ?>/mi-lead-update" method="post">
                    <input type="hidden" name="id" id="getId" value=''>
                    <div class="row">
                        <label class="form-label">
                            <span class="text-xs fw-400">Estado:</span>
                            <div class="col">
                                    <div id="seeStatusLead">Seleccione un Estado:</div>
                            </div>
                        </label>
                    </div>
                    <div class="row">
                        <label class="form-label">
                            <div class="col">
                                <span class="text-xs fw-400">Descripción:</span>
                                <div disabled class=" seeGetComments" rows="3" placeholder="Ingresar Descripción" name="comment"></div>
                            </div>
                        </label>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

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
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var idLead = button.getAttribute('data-bs-whateverid')
        var status = button.getAttribute('data-bs-whateverstatus')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalBodyInput = editModal.querySelector('#getEditId')
        var modalBodyStatus = editModal.querySelector('#statusLead')

        modalBodyStatus.textContent = status
        modalBodyStatus.value = status
        modalBodyInput.value = idLead

    })

    var editComment = document.getElementById('editCommentModal')
    editCommentModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var idLead = button.getAttribute('data-bs-whateveridLead')
        var comment = button.getAttribute('data-bs-whateverComment')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalBodyInput = editComment.querySelector('#getId')
        var modalBody = editComment.querySelector('.getComments')

        modalBody.textContent = comment
        modalBody.value = comment
        modalBodyInput.value = idLead

    })

    var seeLeadModal = document.getElementById('seeLeadModal')
    seeLeadModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var comment = button.getAttribute('data-bs-whateverComment')
        var status = button.getAttribute('data-bs-whateverstatus')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalBody = seeLeadModal.querySelector('.seeGetComments')
        var modalSeeBodyStatus = seeLeadModal.querySelector('#seeStatusLead')

        modalBody.textContent = comment
        modalBody.value = comment
        modalSeeBodyStatus.textContent = status

    })
</script>

</body>


</html>