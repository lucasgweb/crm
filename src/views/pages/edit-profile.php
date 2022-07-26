<?php $render('header', ['title' => 'Usuarios - LCGTI']) ?>
<?php $render('navbar', ['loggedUser' => $loggedUser]) ?>
<?php $render('sidenav', ['loggedUser' => $loggedUser]) ?>

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Perfil
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-fluid px-4 mt-4">

        <!-- Profile picture card-->
        <div class="card" style="height: 700px;">
            <div class="card-header">Cambiar foto de Perfil</div>
               <div class="card-body text-center">
                <!-- Profile picture image-->
                <img class="img-account-profile rounded-circle mb-2" src="<?= $base ?>/media/uploads/<?= $loggedUser->photo ?>" alt="<?= $loggedUser->name ?>" />
                <!-- Profile picture help block-->
                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                <!-- Profile picture upload button-->
                <form action="<?= $base ?>/profile" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3 justify-content-center">
                        <input type="file" class="form-control" placeholder="Recipient's username" aria-describedby="button-addon2" name="photo">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php $render('footer') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= $base ?>/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?= $base ?>/js/datatables/datatables-simple-demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js" crossorigin="anonymous"></script>

</body>


</html>