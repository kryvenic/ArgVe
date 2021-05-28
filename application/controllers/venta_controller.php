<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Venta_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ventas_model');
        $this->load->model('curso_model');
    }


    public function guardar_venta()
    {
        
        //encabezado de venta
        $encabezado_venta = array(
            'id_cliente' => $this->session->userdata('id_usuario'),
            'venta_fecha' => date('Y-m-d')
        );

        $this->ventas_model->guardar_venta($encabezado_venta);
    
        //obtiene ultimo id_venta
        $venta_id = $this->db->insert_id();

        //obtiene todos los productos del carrito
        $cart = $this->cart->contents();
        foreach ($cart as $item) {
            //encabezado de Detalle de venta. (contiene los detalles del producto)
            $detalle_venta = array(
                'id_venta' => $venta_id,
                'id_producto' => $item['id'],
                'detalle_cantidad' => $item['qty'],
                'detalle_precio' => $item['price']
            );

            $this->ventas_model->guardar_detalle_venta($detalle_venta);
        }
        echo 'hi';
        $this->cart->destroy();
        //mensaje de agradecimiento por la compra
        $this->session->set_flashdata('msg', 'Gracias por su compra!');
        //redirecciona al catalogo
        redirect('productos');
    }
}
