<div class="header">
    <nav class="navbar navbar-expand-md navbar-dark p-0 fix-top">
        <!-- Colapse Button -->
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse " id="navbarSupportedContent">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('admin') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('gestionar_usuarios') ?>">Gestionar Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('ver_ventas') ?>">Ventas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('ver_consultas') ?>">Consultas</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('agregar') ?>">Agregar Curso</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('gestionar') ?>">Gestionar cursos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href=""><?php echo $this->session->userdata('nombre'); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('salir') ?>">Salir</a>
                </li>

            </ul>
        </div>
    </nav>
</div>