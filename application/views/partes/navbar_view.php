<!-- Header-->
<div class="header">
  <nav class="navbar navbar-expand-sm navbar-dark p-0 fix-top">

    <!-- Colapse Button -->
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- 
        Navbar
    -->
    <div class="navbar-collapse collapse " id="navbarSupportedContent">
      <ul class="nav nav-pills">
        <!-- Verifica si el titulo de la pagina actual es el indicado y marca el item correspondiente-->
        <li class="nav-item   ">
          <a class="nav-link" href="<?php echo base_url('') ?>"><i class="fa fa-home fa-fw"></i> Inicio</i></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="<?php echo base_url('productos'); ?>"><i class="fa fa-book fa-fw"></i> Catalogo</a>
        </li>
        <!-- Si el usuario inicio Sesion -->
        <?php if ($this->session->userdata('login')) { ?>

          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('carrito') ?>"><i class="fa fa-shopping-cart"></i> Ver carrito</a>
          </li>

          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">             
          <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('nombre'); ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo base_url('salir') ?>"><i class="fa fa-sign-out"></i> Salir</a>
          </div>
        </li>
            </a>
          <!-- Usuario no inicio Sesion -->
        <?php } else { ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('registrarse'); ?>"><i class="fa fa-user-plus"></i> Registrarse</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('login'); ?>"><i class="fa fa-sign-in"></i> Ingresar</a>
          </li>

        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('quienessomos'); ?> "><i class="fa fa-university"></i> Quienes somos</a>
        </li>
        <!-- Dropdown de Mas paginas -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Otros
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo base_url('suscripciones'); ?>"><i class="fa fa-subscript"></i> Suscripciones</a>
            <a class="dropdown-item" href="<?php echo base_url('infocontactos'); ?>"><i class="fa fa-comments"></i> Contacto</a>
            <a class="dropdown-item" href="<?php echo base_url('terminosdeuso'); ?>"><i class="fa fa-balance-scale"></i> Terminos y Condiciones</a>
          </div>
        </li>

      </ul>
    </div>


  </nav>
</div>