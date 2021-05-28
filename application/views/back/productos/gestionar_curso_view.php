<div class="jumbotron text-center">
    <h3>Listado de Cursos</h3>
</div>

<div class="container table-responsive">
    <table id="mytable" class="table table-bordred table-striped table-hover">
        <thead>
            <th>Titulo</th>
            <th>Categoria</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Editar</th>
            <th>Activar/Eliminar</th>
        </thead>
        <tbody>

            <?php
            foreach ($cursos as $row) { ?>
                <tr>
                    <td class="text-center"><?php echo $row->curso_nombre; ?></td>
                    <td class="text-center"><?php echo $row->categoria_descripcion; ?></td>
                    <td class="text-center"><?php echo $row->curso_descripcion; ?></td>
                    <td class="text-center"><?php echo $row->curso_precio; ?></td>
                    <td class="text-center">
                        <a class="btn btn-success" href="<?php echo base_url("curso_controller/editar_curso/$row->curso_id"); ?>">Editar</a>
                    </td>

                    <?php
                    if ($row->curso_estado == 1) { ?>
                        <td class="text-center">
                            <a class="btn btn-danger" href="<?php echo base_url("curso_controller/eliminar_curso/$row->curso_id"); ?>">Eliminar</a>
                        </td>
                    <?php } else { ?>
                        <td class="text-center">
                            <a class="btn btn-danger" href="<?php echo base_url("curso_controller/activar_curso/$row->curso_id"); ?>"> Activar</a>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>