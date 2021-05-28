<h1 class="text-center p-3">Detalle de venta: ID: <?php echo $id ?></h1>
<div class="container p-5">
    <table id="mytable" class="table table-bordred table-striped table-hover" >
        <thead>
            <th class="text-center" scope="col">Titulo curso</th>
            <th class="text-center" scope="col">Descripcion</th>
            <th class="text-center" scope="col">Cantidad</th>
            <th class="text-center" scope="col">Precio</th>
            <th class="text-center" scope="col">Subtotal</th>
        </thead>
        <tbody>
            <?php
            foreach ($detalle_ventas as $row) { ?>
                <tr>
                    <td class="text-center" scope="row"><?php echo $row->curso_nombre; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->curso_descripcion; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->detalle_cantidad; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->detalle_precio; ?></td>
                    <td class="text-center" scope="row"><?php echo $row->detalle_precio * $row->detalle_cantidad; ?></td>
                    
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>