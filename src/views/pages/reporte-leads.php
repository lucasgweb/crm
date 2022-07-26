<?php $render('header', ['title' => 'Reporte Leads - LCGTI']) ?>
<?php $render('navbar', ['loggedUser' => $loggedUser]) ?>
<?php $render('sidenav', ['loggedUser' => $loggedUser]) ?>

<main>
    <header class="page-header page-header-dark bg-primary pb-10">
        <div class="container-fluid px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="pie-chart"></i></div>
                            Reporte de Leads
                        </h1>
                        <div class="page-header-subtitle text-sm">Reporte Leads</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid px-4 mt-n10">
        <div class="card mb-4 pt-4">
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
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col-sm-6">
                            <h2 class="text-primary">Estados de Leads:</h2>
                            <table id="datatablesSimple" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ESTADO</th>
                                        <th>CANTIDAD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Pendiente</td>
                                        <td><?=$count['pendiente']?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>No Contesta</td>
                                        <td><?=$count['noContesta']?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Confirmara</td>
                                        <td><?=$count['confirmara']?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>No Interesado/a</td>
                                        <td><?=$count['noInteresado']?></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Pagará</td>
                                        <td><?=$count['pagara']?></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Competencia</td>
                                        <td><?=$count['competencia']?></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Pagado</td>
                                        <td><?=$count['pagado']?></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Volver a Llamar</td>
                                        <td><?=$count['volverLLamar']?></td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Mas adelante / Economia</td>
                                        <td><?=$count['masAdelante']?></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Otra Institución</td>
                                        <td><?=$count['otraIntitucion']?></td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Apagado/Ocupado</td>
                                        <td><?=$count['apagado']?></td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Suspendida</td>
                                        <td><?=$count['suspendida']?></td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Contacto con Tercero</td>
                                        <td><?=$count['contactoTercero']?></td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Sin Contacto</td>
                                        <td><?=$count['sinContacto']?></td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>Numero equivocado / No Aplica</td>
                                        <td><?=$count['numeroEquivocado']?></td>
                                    </tr>
                                    <tr>
                                        <td>16</td>
                                        <td>WhatsApp / Correo</td>
                                        <td><?=$count['whatsappCorreo']?></td>
                                    </tr>
                                    <tr>
                                        <td>17</td>
                                        <td>Desiste</td>
                                        <td><?=$count['desiste']?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="text-secundary text-sm">Cantidad <b>Total:</b> <?=$count['total']?><p>
                        </div>
                        <div class="col-sm-6">
                        <h2 class="text-primary">Canales de Leads:</h2>
                            <table id="datatableReporteChannel" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>DESCRIPCION</th>
                                        <th>CANTIDAD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Facebook - Leads</td>
                                        <td><?=$count['facebookLeads']?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Whatsapp directo</td>
                                        <td><?=$count['whatsapp']?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Convenio</td>
                                        <td><?=$count['convenio']?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>TikTok</td>
                                        <td><?=$count['tiktok']?></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Pagina Web</td>
                                        <td><?=$count['paginaWeb']?></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Llamada Directa</td>
                                        <td><?=$count['llamada']?></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Talleres</td>
                                        <td><?=$count['talleres']?></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Referido</td>
                                        <td><?=$count['referido']?></td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Mensajes</td>
                                        <td><?=$count['mensajes']?></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Outros</td>
                                        <td><?=$count['otros']?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="text-secundary text-sm mt-2">Cantidad <b>Total:</b> <?=$count['total']?><p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

<?php $render('footer') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= $base ?>/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?= $base ?>/js/datatables/datatables-simple-demo.js"></script>
<script src="<?= $base ?>/js/datatables/datatable-reportes.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js" crossorigin="anonymous"></script>

</body>


</html>