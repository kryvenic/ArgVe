<div class="formulario-wrapper container p-5">
   <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Ingresa a <strong>ArgVE</strong></h4>
          </div>

    <div class="form formulario-login col-md">
        <span class="text-danger"><?php echo validation_errors(); ?></span>
        <?php echo form_open('ingresar'); ?>
        <div class="form-group">
            <label for="mail">Ingrese su correo electronico</label>
            <?php echo form_input(['name' => 'mail', 'id' => 'mail', 'type' => 'mail', 'class' => 'form-control', 'placeholder' => 'Email', 'value' => set_value('mail')]); ?>
        </div>
        <div class="form-group">
            <label for="password">Ingrese contraseña</label>
            <?php echo form_input(['name' => 'password', 'id' => 'password', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'value' => set_value('password')]); ?>
        </div>
        <div class="form-group">
            <?php echo form_submit('Ingresar', 'Ingresar', "class='btn  btn-success'"); ?>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="col-xs-6">
                      <p class="lead"><br>No tienes cuenta? <span class="text-success">REGISTRATE AHORA</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> Accede a los cursos gratuitos.</li>
                          <li><span class="fa fa-check text-success"></span> Obten el 5% de Descuento en nuestros cursos pagos.</li>
                          <li><span class="fa fa-check text-success"></span> Actualizate diariamente!</li>
                      </ul>
                      <p><a href="<?php echo base_url('registrar '); ?>" class="btn btn-info btn-block">Registrarme ahora!</a></p>
                  </div>


</div>