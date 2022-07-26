<?php $render('header', ['title' => 'Leads - LCGTI']) ?>
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
                            Leads
                        </h1>
                        <div class="page-header-subtitle text-sm">Gestión de Leads</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid px-4 mt-n10">

        <div class="card mb-4">
            <div class="container-fluid">
                <div class="row justify-content-end">
                    <div class="col col-xl-auto mt-4">
                        <div class="col-12 col-xl-auto mb-3">
                            <button class="btn btn-light bg-primary shadow-sm  text-white" data-bs-toggle="modal" data-bs-target="#createModal">
                                <i class="me-1" data-feather="user-plus"></i>
                                Agregar Lead
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <form class="row justify-content-center" method="get" action="">
                <div class="col-auto ">
                    <label class="form-label">
                        <span class="text-xs fw-400">Fecha Inicio:</span>
                        <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="basic-addon1"><i data-feather="calendar"></i></span>
                            <input type="date" class="form-control" placeholder="Fecha inicio" name="startDate">
                        </div>
                    </label>
                </div>
                <div class="col-auto ">
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
                        <span class="text-xs fw-400">Asesor:</span>
                        <select class="form-select" id="autoSizingSelect" name="userId">
                            <option selected value="0">Seleccionar asesor</option>
                            <?php foreach ($users as $user) : ?>
                                <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                            <?php endforeach; ?>
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
                            <th>Nombre</th>
                            <th>Curso</th>
                            <th>Asesor</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Estado Venta</th>
                            <th>Estado</th>
                            <th>Canal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Fecha de Registro</th>
                            <th>Nombre</th>
                            <th>Curso</th>
                            <th>Asesor</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Estado Venta</th>
                            <th>Estado</th>
                            <th>Canal</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach (array_reverse($leads) as $lead) : ?>
                            <tr>
                                <td><?= $lead['created_at'] ?></td>
                                <td><?= $lead['name_lead'] ?></td>
                                <td><?= $lead['curso'] ?></td>
                                <td><?= $lead['name_user'] ?></td>
                                <td><?= $lead['phone'] ?></td>
                                <td><?= $lead['email'] ?></td>
                                <td><?= $lead['salestatus'] ?></td>
                                <?php if ($lead['status'] == 'Activado') : ?>
                                    <td><span class="badge bg-success">Activado</span></td>
                                <?php else : ?>
                                    <td><span class="badge bg-danger">Inactivo</span></td>
                                <?php endif; ?>
                                <td><?= $lead['channel'] ?></td>
                                <td>

                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whateverid="<?= $lead['id'] ?>" data-bs-whatevername="<?= $lead['name_lead'] ?>" data-bs-whateveremail="<?= $lead['email'] ?>" data-bs-whateverphone="<?= $lead['phone'] ?>" data-bs-whatevercourse="<?= $lead['curso'] ?>" data-bs-whatevercanal="<?= $lead['channel'] ?>" data-bs-whatevercanalName="<?= $lead['channel'] ?>" data-bs-whatevercomments="<?= $lead['comment'] ?>">
                                            <i class="bi bi-pencil-square"></i></a>

                                        <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" data-bs-toggle="modal" data-bs-target="#editAsesorModal" data-bs-whateveridLead="<?= $lead['id'] ?>" data-bs-whateverAsesor="<?= $lead['name_user'] ?>">
                                            <i class="bi bi-person-plus-fill"></i></a>
                                            <?php if($loggedUser->level == 1):?>
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?= $base ?>/leads/delete/<?= $lead['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">
                                            <i class="bi bi-trash3-fill"></i></a>
                                            <?php endif;?>
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
<!-- Modal New Leads -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Agregar Lead</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <label class="form-label">
                            <span class="text-xs fw-400">Nombres y Apellidos del Lead:</span>
                            <div class="col">
                                <input type="text" id="getName" class="form-control" placeholder="Ingresar Nombre y Apellido del Lead" aria-label="Nombre" name="name">
                            </div>
                        </label>
                    </div>

                    <div class="row ">
                        <label class="form-label">
                            <div class="col">
                                <span class="text-xs fw-400">Email:</span>
                                <input type="email" id="getEmail" class="form-control" placeholder="Ingresar Email" aria-label="Email" name="email">
                            </div>
                        </label>
                    </div>
                    <div class="row">
                        <label class="form-label">
                            <div class="col">
                                <span class="text-xs fw-400">Teléfono/Celular</span>
                                <input type="text" id="getPhone" class="form-control" aria-label="Ingresar Telefono" name="phone" placeholder="Telefono/Celular">
                            </div>
                        </label>
                    </div>
                    <div class="row">
                        <label class="form-label">
                            <div class="col">
                                <span class="text-xs fw-400">Asignar Asesor(a):</span>
                                <select class="form-select" name="user_id">
                                    <option selected>Seleccionar Asesor</option>
                                    <?php foreach ($users as $user) : ?>
                                        <option value="<?= $user['id'] ?>"><?= $user['name_user'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </label>
                    </div>
                    <div class="row">
                        <label class="form-label">
                            <div class="col">
                                <span class="text-xs fw-400">Nombre de Curso(s):</span>
                                <input type="text" id="getCourse" class="form-control" placeholder="Ingresar Curso(s)" aria-label="Curso" name="curso">
                            </div>
                        </label>
                    </div>
                    <div class="row">

                        <label class="form-label">
                            <div class="col">
                                <span class="text-xs fw-400">Medios:</span>

                                <select class="form-select" name="channel">
                                    <option id="getCanal" selected>Seleccione un Medio</option>
                                    <option value="Facebook - Leads">Facebook - Leads</option>
                                    <option value="Whatsapp directo">Whatsapp directo</option>
                                    <option value="Convenio">Convenio</option>
                                    <option value="TikTok">TikTok</option>
                                    <option value="Pagina Web">Pagina Web</option>
                                    <option value="Llamada Directa">Llamada Directa</option>
                                    <option value="Talleres">Talleres</option>
                                    <option value="Referido">Referido</option>
                                    <option value="Mensajes">Mensajes</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                        </label>



                    </div>
                    <div class="row">
                        <label class="form-label">
                            <div class="col">
                                <span class="text-xs fw-400">Descripción:</span>
                                <textarea class="form-control getComments" rows="3" placeholder="Ingresar Descripción" name="comment"></textarea>
                            </div>
                        </label>

                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cerrar</button><button class="btn btn-primary" type="submit">Agregar Lead</button></div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Editar Lead</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= $base ?>/lead-update" method="post">

                    <input type="hidden" name="id" id="getId">
                    <div class="row">
                        <label class="form-label">
                            <span class="text-xs fw-400">Nombres y Apellidos del Lead:</span>
                            <div class="col">
                                <input type="text" id="getName" class="form-control" placeholder="Nombre" aria-label="Nombre" name="name">
                            </div>
                        </label>
                    </div>

                    <div class="row">
                        <label class="form-label">
                            <div class="col">
                                <span class="text-xs fw-400">Email:</span>
                                <input type="email" id="getEmail" class="form-control" placeholder="Email" aria-label="Email" name="email">
                            </div>
                        </label>


                    </div>
                    <div class="row">
                        <label class="form-label">
                            <div class="col">
                                <span class="text-xs fw-400">Teléfono/Celular</span>
                                <input type="text" id="getPhone" class="form-control" aria-label="Telefono" name="phone" placeholder="Telefono/Celular">
                            </div>
                        </label>
                    </div>



                    <div class="row ">
                        <label class="form-label">
                            <div class="col">
                                <span class="text-xs fw-400">Nombre de Curso(s):</span>
                                <input type="text" id="getCourse" class="form-control" placeholder="Curso" aria-label="Curso" name="curso">
                            </div>
                        </label>

                    </div>
                    <div class="row">


                        <label class="form-label">
                            <div class="col">
                                <span class="text-xs fw-400">Medios:</span>
                                <select class="form-select" name="channel">
                                    <option id="getCanal" selected>Seleccione un Medio</option>

                                    <option value="Facebook - Leads">Facebook - Leads</option>
                                    <option value="Whatsapp directo">Whatsapp directo</option>
                                    <option value="Convenio">Convenio</option>
                                    <option value="TikTok">TikTok</option>
                                    <option value="Pagina Web">Pagina Web</option>
                                    <option value="Llamada Directa">Llamada Directa</option>
                                    <option value="Talleres">Talleres</option>
                                    <option value="Referido">Referido</option>
                                    <option value="Mensajes">Mensajes</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                        </label>

                    </div>



                    <div class="row">
                        <label class="form-label">
                            <div class="col">
                                <span class="text-xs fw-400">Descripción:</span>
                                <textarea class="form-control getComments" rows="3" placeholder="Comentario" name="comment"></textarea>
                            </div>
                        </label>
                    </div>

            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Cerrar</button><button class="btn btn-primary" type="submit">Guardar
                    Cambios</button></div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Asesor -->
<div class="modal fade" id="editAsesorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Editar Lead</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= $base ?>/lead-update" method="post">
                    <input type="hidden" name="id" id="getId" value=''>
                    <div class="row">
                        <label class="form-label">
                            <span class="text-xs fw-400">Asignar Asesor:</span>
                            <div class="col">
                                <select class="form-select" name="user_id">
                                    <option selected>Seleccione un Asesor</option>
                                    <?php foreach ($users as $user) : ?>
                                        <option value="<?= $user['id'] ?>"><?= $user['name_user'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <hr>
                                <h5>Último Asesor(a)</h5>
                                <p id="asesorName"></p>
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


    <?php $render('footer') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= $base ?>/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?= $base ?>/js/datatables/datatables-simple-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js" crossorigin="anonymous"></script>

    <script>
        var editModalModal = document.getElementById('editModal')
        editModalModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var id = button.getAttribute('data-bs-whateverid')
            var name = button.getAttribute('data-bs-whatevername')
            var email = button.getAttribute('data-bs-whateveremail')
            var phone = button.getAttribute('data-bs-whateverphone')
            var course = button.getAttribute('data-bs-whatevercourse')
            var canal = button.getAttribute('data-bs-whatevercanal')
            var canalName = button.getAttribute('data-bs-whatevercanalName')
            var comments = button.getAttribute('data-bs-whatevercomments')
            var iduser = button.getAttribute('data-bs-whateveriduser')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = editModalModal.querySelector('.modal-title')
            var modalBodyInputId = editModalModal.querySelector('#getId')
            var modalBodyInputName = editModalModal.querySelector('#getName')
            var modalBodyInputEmail = editModalModal.querySelector('#getEmail')
            var modalBodyInputPhone = editModalModal.querySelector('#getPhone')
            var modalBodyInputCourse = editModalModal.querySelector('#getCourse')
            var modalBodyInputCanal = editModalModal.querySelector('#getCanal')
            var modalTextArea = editModalModal.querySelector('.getComments')

            modalTitle.textContent = 'Editar Lead'
            modalBodyInputId.value = id
            modalBodyInputName.value = name
            modalBodyInputEmail.value = email
            modalBodyInputPhone.value = phone
            modalBodyInputCourse.value = course
            modalBodyInputCanal.value = canal
            modalBodyInputCanal.textContent = canalName
            modalTextArea.textContent = comments




        })

        var editAsesor = document.getElementById('editAsesorModal')
        editAsesor.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var idLead = button.getAttribute('data-bs-whateveridLead')
            var nameAsesor = button.getAttribute('data-bs-whateverAsesor')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalBodyInput = editAsesor.querySelector('#getId')
            var modalBody = editAsesor.querySelector('#asesorName')

            modalBody.textContent = nameAsesor
            modalBodyInput.value = idLead

        })
    </script>

    </body>


    </html>