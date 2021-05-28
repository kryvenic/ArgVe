<div class="jumbotron text-center">
    <h3>Contacta a ArgVE</h3>
    <p>Estamos para atender cualquier inquietud que tengas las 24hs!</p>
</div>


<div class="row">
    <div class="column">
        <img src="./assets/img/email.jpg" style="width:100%">
    </div>

    <div class="form-wrapper" id="formulario">
        <h3 class="text-center">Envianos un correo</h3>
        <div class="form ">
            <?php echo form_open('consulta'); ?>
            <div class="form-group">
                <label for="nombre">Ingrese su nombre</label>
                <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Nombre', 'autofocus' => 'autofocus', 'value' => set_value('nombre')]); ?>
            </div><span class="text-danger"><?php echo form_error('nombre'); ?> </span>
            <div class="form-group">
                <label for="mail">Ingrese su correo electrónico</label>
                <?php echo form_input(['name' => 'mail', 'id' => 'mail', 'type' => 'email', 'class' => 'form-control', 'placeholder' => 'Email', 'autofocus' => 'autofocus', 'value' => set_value('mail')]); ?>
            </div><span class="text-danger"><?php echo form_error('mail'); ?> </span>
            <div class="form-group">
                <label for="asunto">Ingrese un asunto</label>
                <?php echo form_input(['name' => 'asunto', 'id' => 'asunto', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Asunto', 'autofocus' => 'autofocus', 'value' => set_value('asunto')]); ?>
            </div><span class="text-danger"><?php echo form_error('asunto'); ?> </span>

            <div class="form-group">
                <label for="mensaje">Ingrese un mensaje</label>
                <textarea  type="text" name="mensaje" id="mensaje" class="form-control" placeholder="Me comunico para..." autofocus="autofocus" rows="4" cols="50" ></textarea>
            </div><span class="text-danger"><?php echo form_error('mensaje'); ?> </span>

            <div class="form-group">
                <?php echo form_submit('Consulta', 'Enviar', "class='btn btn-success'"); ?>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>

</div>