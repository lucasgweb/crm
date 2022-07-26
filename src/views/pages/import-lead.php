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
                            Importar Leads
                        </h1>
                        <div class="page-header-subtitle text-sm">Importar Leads</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid pxs-4 mt-n10">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-sm-4">
                        <span>Importador de Leads</span>
                        <form action="<?= $base ?>/profile" method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-3 justify-content-center">
                                <input type="file" class="form-control" placeholder="Recipient's username" aria-describedby="button-addon2" name="photo">

                            </div>
                        </form>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-3 text-center">
                        <img src="<?= $base ?>/assets/img/cdnlogo.com_microsoft-excel.png" width="70%" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Enviar Archivo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $render('footer') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="<?= $base ?>/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js"
        crossorigin="anonymous"></script>

</body>

</html>