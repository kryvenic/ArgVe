<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Carrito_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function ver_carrito(){
        if(!$this->cart->contents()){
            $data['message'] = 'El carrito esta vacio';
        }else{
            $data['message'] = '';
        }

        $this->load->view('partes/head_view', array('titulo' => 'Carrito de compras'));
        $this->load->view('partes/navbar_view');
        $this->load->view('carrito_view',$data);
    }

    public function agregar_carrito(){
            $data = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('nombre'),
                'price' => $this->input->post('precio'),
                'qty' => 1
            );
            $this->cart->insert($data);
            $this->ver_carrito();
    }
    
    public function borrar($id){
        if($id=="all"){
            $this->cart->destroy();
        }else{
            $data = array(
                'rowid' => $id,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        $this->ver_carrito();
    }
}
