<div class="jumbotron text-center">
    <h3>Consultas a <strong>ArgVE</strong></h3>
</div>
<div class="container p-5">
    <table id="mytable" class="table table-bordred table-striped table-hover" >
        <thead>
            <th class="text-center" scope="col">Nro</th>
            <th class="text-center" scope="col">Nombre</th>
            <th class="text-center" scope="col">Email</th>
            <th class="text-center" scope="col">Asunto</th>
            <th class="text-center" scope="col">Mensaje</th>
            <th class="text-center" scope="col">Eliminar</th>
        </thead>
        <tbody>
            <?php
            foreach ($consultas as $row) { 
                if ($row->estado == 1) { ?>
                <tr>
                    <td class="text-center" scope="row"><?php echo $row->id_mensaje; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->nombre; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->mail; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->asunto; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->consulta; ?></td>

                    <td class="text-center">
                                <a class="btn btn-danger" href="<?php echo base_url("consulta_controller/eliminar_consulta/$row->id_mensaje"); ?>">Marcar Como Leido</a>
                    </td>
                </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <a href="<?php echo base_url('ver_consultasleidas'); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Ver Consultas Leídas</a>


</div>