<?php $render('header', ['title' => 'Home - LCGTI']) ?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<main>
    <header class="page-header page-header-dark bg-primary pb-10">
        <div class="container px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon">
                                <i data-feather="message-circle"></i>
                            </div>
                            Chat
                        </h1>
                        <div class="page-header-subtitle text-sm">
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4"></div>
                </div>
            </div>
        </div>
    </header>
    <div class="container px-4 mt-n15">
        <div class="card">
            <div class="card-body">
                <section class="bg-secundary" style="background-color: #fff;">
                    <a href="<?= $base ?>/" class="font-weight-bold mb-5 text-center btn btn-primary text-lg-start"><i
                                data-feather="corner-down-left" class="me-2"></i>Volver al Sistema</a>
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
                                <h5 class="font-weight-bold mb-3 text-center text-sm-start">Usuarios</h5>
                                <div class="card">
                                    <div class="card-body" style="overflow-y: scroll;height: 500px;">
                                        <ul class="list-unstyled mb-0">
                                            <?php foreach ($users as $user) : ?>
                                                <li class="p-2 border-bottom" style="background-color: #fff;">
                                                    <a href="<?= $base ?>/chat/<?= $user['id'] ?>"
                                                       class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row">
                                                            <img src="<?= $base ?>/media/uploads/<?= $user['photo'] ?>"
                                                                 alt="avatar"
                                                                 class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                                                 width="40">
                                                            <div class="pt-1">
                                                                <p class="fw-bold mb-0"><?= $user['name'] ?></p>
                                                                <?php if ($user['level'] == 1) : ?>
                                                                    <p class="small text-muted">Master Admin</p>
                                                                <?php elseif ($user['level'] == 2) : ?>
                                                                    <p class="small text-muted">Administrador</p>
                                                                <?php else : ?>
                                                                    <div class="status">
                                                                        <p class="small text-muted">Asesor</p>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-7 col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="chat" style="overflow-y: scroll;height: 500px;">
                                            <ul class="list-unstyled">
                                                <?php foreach ($mensages as $mensage) : ?>
                                                    <?php if ($mensage['user_from'] == $loggedUser->id) : ?>
                                                        <li class="d-flex justify-content-between mb-4">
                                                            <div class="card w-100   bg-primary text-white">
                                                                <div class="card-header d-flex justify-content-between p-2 text-white">
                                                                    <p class="fw-bold mb-0 text-white"><?= $loggedUser->name ?></p>
                                                                    <p class="text-white small mb-0"><i
                                                                                class="far fa-clock"></i> <?= $mensage['created_at'] ?>
                                                                    </p>
                                                                </div>
                                                                <div class="card-body">
                                                                    <p class="mb-0">
                                                                        <?= $mensage['mensagem'] ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <img src="<?= $base ?>/media/uploads/<?= $loggedUser->photo ?>"
                                                                 alt="avatar"
                                                                 class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong"
                                                                 width="40">
                                                        </li>
                                                    <?php else : ?>
                                                        <li class="d-flex justify-content-between mb-4">

                                                            <img src="<?= $base ?>/media/uploads/<?= $toUser['photo'] ?>"
                                                                 alt="avatar"
                                                                 class="rounded-circle d-flex align-self-start me-3 shadow-1-strong"
                                                                 width="40">
                                                            <div class="card w-100">
                                                                <div class="card-header d-flex justify-content-between p-3">
                                                                    <p class="fw-bold mb-0"><?= $toUser['name'] ?></p>
                                                                    <p class="text-muted small mb-0"><i
                                                                                class="far fa-clock"></i><?= $mensage['created_at'] ?>
                                                                    </p>
                                                                </div>
                                                                <div class="card-body">
                                                                    <p class="mb-0">
                                                                        <?= $mensage['mensagem'] ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php endif ?>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?= $toUser['id'] ?>">
                                            <li class="bg-white mb-3">
                                                <div class="form-outline ">
                                                    <textarea name="mensaje" class="form-control" id="textAreaExample2"
                                                              rows="4"></textarea>
                                                    <label class="form-label" for="textAreaExample2">Message</label>
                                                </div>
                                            </li>
                                            <input type="submit" class="btn btn-primary btn-rounded float-end"
                                                   value="Send">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php $render('footer') ?>
</main>
<script type="text/javascript">

</script>
<script>
    var objDiv = document.getElementById("chat");
    objDiv.scrollTop = objDiv.scrollHeight;
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="<?= $base ?>/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?= $base ?>/js/datatables/datatables-simple-demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js"
        crossorigin="anonymous"></script>
</body>

</html>