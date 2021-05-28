<div class="jumbotron text-center">
    <h3>Ventas realizadas en ArgVE</h3>
</div>

<div class="container p-5">
    <table id="mytable" class="table table-bordred table-striped table-hover" >
        <thead>
            <th class="text-center" scope="col">Nr de venta</th>
            <th class="text-center" scope="col">Cliente</th>
            <th class="text-center" scope="col">Fecha</th>
            <th class="text-center" scope="col">Ver</th>
        </thead>
        <tbody>
            <?php
            foreach ($ventas as $row) { ?>
                <tr>
                    <td class="text-center" scope="row"><?php echo $row->venta_id; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->nombre; ?> <?php echo $row->apellido; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->venta_fecha; ?></td>
                    <td class="text-center" scope="row">
                    <a class="btn btn-success" href="<?php echo base_url("admin_controller/ver_detalle_venta/$row->venta_id"); ?>" role="button">Ver detalle</a>
                    </td>
                    
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>