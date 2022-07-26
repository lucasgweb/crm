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
                            Reporte de Leads por Vendedor
                        </h1>
                        <div class="page-header-subtitle text-sm">Reporte de leads por vendedor</div>
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
                    <br>
                    <button type="submit" class="btn btn-light bg-primary text-white" value="pesquisar" name="PesquisarEntreDatas">+
                        Consultar</button>
                </div>
            </form>
            <div class="card-body">
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col">
                            <h2 class="text-primary">Reporte de venta directa por vendedor:</h2>
                            <table id="datatablesSimple" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>USUARIO</th>
                                        <th>CANTIDAD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($count as $value):?>
                                    <tr>
                                        <td><?=$value['id']?></td>
                                        <td><?=$value['name']?></td>
                                        <td><?=$value['totalSales']?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            
                            <p class="text-black font-monospace"><strong>Cantidad Total: </strong> <?=$total;?><p>
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