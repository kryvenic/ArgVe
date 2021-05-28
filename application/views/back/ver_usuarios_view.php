<div class="jumbotron text-center">
    <h2>Lista de Usuarios</h2>

</div>

<div class="container p-5">
    <table id="mytable" class="table table-bordred table-striped table-hover">
        <thead>
            <th class="text-center" scope="col">ID</th>
            <th class="text-center" scope="col">Apellido</th>
            <th class="text-center" scope="col">Nombre</th>
            <th class="text-center" scope="col">Email</th>
            <th class="text-center" scope="col">Perfil</th>
            <th class="text-center" scope="col">Editar</th>
            <th class="text-center" scope="col">Acciones</th>
        </thead>
        <tbody>
            <?php
            foreach ($usuarios as $row) { ?>
                <tr>
                    <td class="text-center" scope="row"><?php echo $row->id_usuario; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->apellido; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->nombre; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->mail; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->perfil_descripcion; ?></td>

                    <?php
                    /** Verifica que no sea administrador */

                    if ($row->id_perfil != 1) {
                        /** Verifica el estado */
                        if ($row->estado == 1) { ?>
                            <td class="text-center">
                                <a class="btn btn-success" href="<?php echo base_url("usuario_controller/editar_usuario/$row->id_usuario"); ?>">EDITAR</a>
                            </td>

                            <td class="text-center">
                                <a class="btn btn-danger" href="<?php echo base_url("usuario_controller/eliminar_usuario/$row->id_usuario"); ?>">BAJA</a>
                            </td>
                        <?php } else { ?>
                            <td></td>
                            <td class="text-center">
                                <a class="btn btn-success" href="<?php echo base_url("usuario_controller/activar_usuario/$row->id_usuario"); ?>">ACTIVAR</a>
                            </td>
                        <?php } ?>
                        <!-- Fin IF -->
                    <?php } else { ?>
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo base_url("usuario_controller/editar_usuario/$row->id_usuario"); ?>">EDITAR</a>
                        </td>
                        <td></td>
                    <?php } ?>

                </tr>
                <!-- Fin FOREACH -->
            <?php } ?>
        </tbody>
    </table>

</div>