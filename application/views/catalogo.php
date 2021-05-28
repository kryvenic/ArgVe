<div class="jumbotron text-center">
    <h3><i class="fa fa-shopping-cart"></i> Catalogo de Cursos ArgVE</h3>
    <p>Nuestros primeros cursos ya estan disponibles en la comunidad. ¿Qué estas esperando para aprender?</p>
</div>

<div class="container">
    <?php if ($this->session->flashdata('msg')) { ?>
        <h6 class="alert alert-success" role="alert"><?php echo $this->session->flashdata('msg'); ?></h6>
    <?php } ?>
    <table id="mytable" class="table table-bordred table-striped table-hover" >
        <thead>
            <th class="text-center" scope="col">Titulo</th>
            <th class="text-center" scope="col">Categoria</th>
            <th class="text-center" scope="col">Descripcion</th>
            <th class="text-center" scope="col">Precio</th>
            <th class="text-center" scope="col"></th>
        </thead>
        <tbody>

            <?php
            foreach ($cursos as $row) { 
                if ($row->curso_estado == 1) { ?>
                <tr>
                    <td class="text-center" scope="row"><?php echo $row->curso_nombre; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->categoria_descripcion; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->curso_descripcion; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->curso_precio; ?></td>
                    <td class="text-center" scope="row">
                        <img src="<?php echo base_url('/uploads/') . $row->curso_imagen ?>" alt="Imagen producto" height="100" width="100">
                    </td>

                    <td scope="row">
                        <?php
                        if ($this->session->userdata('login')) {
                            echo form_open('comprar');
                            echo form_hidden('id', $row->curso_id);
                            echo form_hidden('nombre', $row->curso_nombre);
                            echo form_hidden('precio', $row->curso_precio);
                            echo form_submit('comprar', 'Agregar al carrito', "class='btn btn-success'");
                            echo form_close();
                        } ?>
                    </td>
                </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>

</div>