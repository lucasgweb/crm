<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <a class="nav-link d-sm-none" href="<?= $base ?>/chat">
                        <div class="nav-link-icon"><i data-feather="message-circle"></i></div>
                        Chat
                    </a>
                    <!-- Sidenav Menu Heading (Core)-->
                    <div class="sidenav-menu-heading">Menu</div>
                    <!-- Sidenav Accordion (Dashboard)-->
                    <a class="nav-link collapsed" href="<?= $base ?>/usuarios">
                        <div class="nav-link-icon"><i class="bi bi-person-badge-fill"></i></div>
                        Usuarios
                    </a>
                    <a class="nav-link collapsed" href="<?= $base ?>/alumnos">
                        <div class="nav-link-icon"><i class="bi bi-people"></i></div>
                        Alumnos
                    </a>
                    <a class="nav-link collapsed" href="<?= $base ?>/profesores">
                        <div class="nav-link-icon"><i class="bi bi-people"></i></div>
                        Profesores
                    </a>
                    <!--CATEGORIZACION-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseCategorizacion" aria-expanded="false" aria-controls="collapsePages">
                        <div class="nav-link-icon"><i class="bi bi-stack"></i></div>
                        Categorización
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="collapseCategorizacion" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                            <a class="nav-link" href="<?= $base ?>/categorias">Categorias</a>
                        </nav>
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                            <a class="nav-link" href="<?= $base ?>/tipos">Tipos</a>
                        </nav>
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                            <a class="nav-link" href="<?= $base ?>/modalidades">Modalidades</a>
                        </nav>
                    </div>
                    <!-- Sidenav Heading (Custom)-->
                    <div class="sidenav-menu-heading">Clasificación</div>

                    <a class="nav-link collapsed" href="<?= $base ?>/usuarios">
                        <div class="nav-link-icon"><i class="bi bi-grid-1x2-fill"></i></i></div>
                        Promociones
                    </a>
                    <!-- Sidenav Accordion (Ventas)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseVentas" aria-expanded="false" aria-controls="collapsePages">
                        <div class="nav-link-icon"><i class="bi bi-arrow-up-right-circle-fill"></i></div>
                        Ventas
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="collapseVentas" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                            <a class="nav-link" href="#">Ventas</a>
                        </nav>
                    </div>
                    <!-- Sidenav Accordion (Matriculas)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseMatriculas" aria-expanded="false" aria-controls="collapsePages">
                        <div class="nav-link-icon"><i class="bi bi-arrow-up-right-circle-fill"></i></div>
                        Matrícula
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="collapseMatriculas" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                            <a class="nav-link" href="<?= $base ?>/cursos">Curso</a>
                        </nav>
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                            <a class="nav-link" href="#">Semestre</a>
                        </nav>
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                            <a class="nav-link" href="#">Grupo</a>
                        </nav>
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                            <a class="nav-link" href="#">Matrícula</a>
                        </nav>
                    </div>
                      <!-- Sidenav Accordion (Tesoreria)-->
                      <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseTesoreria" aria-expanded="false" aria-controls="collapsePages">
                        <div class="nav-link-icon"><i class="bi bi-arrow-up-right-circle-fill"></i></div>
                        Tesorería
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="collapseTesoreria" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                            <a class="nav-link" href="#">Pagos</a>
                        </nav>
                    </div>
                    <!-- Sidenav Accordion (CRM)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="nav-link-icon"><i class="bi bi-arrow-up-right-circle-fill"></i></div>
                        CRM
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" data-bs-parent="#accordionSidenav">
                        <?php if ($loggedUser->level < 3) : ?>
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                <a class="nav-link" href="<?= $base ?>/leads">Leads</a>
                            </nav>
                        <?php else : ?>
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                <a class="nav-link" href="<?= $base ?>/misleads">Mis Leads</a>
                            </nav>
                        <?php endif; ?>
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                            <a class="nav-link" href="<?= $base ?>/importarleads">Importar Leads</a>
                        </nav>
                    </div>
                    <!-- Sidenav Accordion (reportes)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseReportes" aria-expanded="false" aria-controls="collapsePages">
                        <div class="nav-link-icon"><i class="bi bi-arrow-up-right-circle-fill"></i></i></div>
                        Reportes
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseReportes" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavReportesMenu">
                            <a class="nav-link" href="<?= $base ?>/reporteleads">Reporte de Leads</a>
                        </nav>
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavReportesMenu">
                            <a class="nav-link" href="<?= $base ?>/reporteleadsvendedor">Reporte de Leads por vendedor</a>
                        </nav>
                    </div>

                </div>
            </div>
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="text-muted">Creado con ❤️ by LucasGWeb</div>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">