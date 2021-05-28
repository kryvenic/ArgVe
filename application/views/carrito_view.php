<div class="container">
    <!-- Titulo y Boton de seguir comprando -->

        <div class="jumbotron text-center">
    <h3>Mi Carrito de <strong>ArgVE <i class="fa fa-shopping-cart"></i></strong></h3>
    <p>Puedes realizar la compra de los cursos ordenados, o seguir ordenando más. ¡Tu eliges!</p>
</div>
<div class="row ">
        <div class="col-md-3 col-order-1 mr-auto p-5">
            <a class="btn btn-success align-left" href="<?php echo base_url('productos'); ?>" role="button">Continuar comprando</a>
        </div>
    </div>
    <!-- Tabla de productos -->
    <table id="mytable" class="table table-bordred table-striped">
        <?php if ($cart = $this->cart->contents()) { ?>
            <thead>
                <th>Nº Item</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Accion</th>
            </thead>
            <tbody>

                <?php
                //inicializa variable i en 1 para contar los productos que se van agregando
                $i = 1;
                
                foreach ($cart as $item) : ?>
                    <tr>
                        <!-- tabla de productos con precio y subtotal -->
                        <td class="text-center"><?php echo $i++ ?></td>
                        <td class="text-center"><?php echo $item['name']; ?></td>
                        <td class="text-center"><?php echo $this->cart->format_number($item['price'], 2); ?></td>
                        <td class="text-center"><?php echo $item['qty'] ?></td>
                        <td class="text-center"><?php echo $this->cart->format_number($item['subtotal'], 2); ?></td>
                        <td class="text-center"><?php echo anchor('carrito_controller/borrar/' . $item['rowid'], 'Eliminar') ?></td>


                    </tr>
                <?php endforeach; ?>
                <tr>
                    <!-- Total de compra y boton para ordenar compra -->
                    <td>Total de compra <?php echo number_format($this->cart->total(), 2);  ?></td>
                    <td><button type="button" class="btn btn-success" onclick="limpiar_carrito()">Vaciar carrito</button></td>
                    <td>
                        <a class="btn btn-success" href="<?php echo base_url('venta_controller/guardar_venta'); ?>" role="button">Ordenar compra</a>
                    </td>
                </tr>
            </tbody>

        <?php } else { ?>
            <div class="text-center">
                <img src="<?php echo base_url('assets/img/cart.jpg'); ?>" class="img-fluid" height="400" width="400" alt="Imagen carrito">
                <h2 class="text-center m-5"><?php echo $message ?></h2>
            </div>
        <?php } ?>

    </table>
    <script>
        function limpiar_carrito() {
            var result = confirm('¿Desea vaciar el carrito?');
            if (result) {
                window.location = "<?php echo base_url(); ?>carrito_controller/borrar/all";
            } else {
                return false;
            }
        }
    </script>

</div>