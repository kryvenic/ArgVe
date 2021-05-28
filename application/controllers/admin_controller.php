<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('login')){
            redirect('ingresar');
        }else{
            $this->load->model('consulta_model');
            $this->load->model('ventas_model');
            $this->load->model('usuario_model');
        }
    }

    public function usuario_admin(){
        $data['titulo'] = 'Administrador';
        $this->load->view('partes/head_view', $data);
		$this->load->view('partes/navbar_admin_view');
		$this->load->view('back/principal_admin');
		$this->load->view('partes/footer_view');
    }

    public function ver_consultas(){
        
        $data['consultas'] = $this->consulta_model->select_consultas();

        $data['titulo'] = 'Ver consultas';
        $this->load->view('partes/head_view', $data);
		$this->load->view('partes/navbar_admin_view');
		$this->load->view('back/ver_consultas_view');
		$this->load->view('partes/footer_view');
    }

    public function consultasleidas(){
        
        $data['consultas'] = $this->consulta_model->select_consultas();

        $data['titulo'] = 'Ver consultas';
        $this->load->view('partes/head_view', $data);
		$this->load->view('partes/navbar_admin_view');
		$this->load->view('back/consultas_leidas');
		$this->load->view('partes/footer_view');
    }

    public function ver_ventas(){
        
        $data['ventas'] = $this->ventas_model->select_ventas();

        $data['titulo'] = 'Ver ventas';
        $this->load->view('partes/head_view', $data);
		$this->load->view('partes/navbar_admin_view');
		$this->load->view('back/ver_ventas_view',$data);
		$this->load->view('partes/footer_view');
    }

    public function ver_detalle_venta($id){
        
        $data['detalle_ventas'] = $this->ventas_model->select_detalle_ventas($id);
        $data['id'] = $id;

        $this->load->view('partes/head_view', array('titulo' => "Detalle venta"));
		$this->load->view('partes/navbar_admin_view');
		$this->load->view('back/detalle_ventas_view', $data);
		$this->load->view('partes/footer_view');
    }

    public function ver_usuarios(){
        
        $data['usuarios'] = $this->usuario_model->select_usuarios();
        
        $this->load->view('partes/head_view', array('titulo' => "Ver usuarios"));
		$this->load->view('partes/navbar_admin_view');
		$this->load->view('back/ver_usuarios_view', $data);
		$this->load->view('partes/footer_view');
    }

    public function editar_usuario(){
        
        $data['usuarios'] = $this->usuario_model->select_perfiles();
        
        $this->load->view('partes/head_view', array('titulo' => "Editar usuario"));
		$this->load->view('partes/navbar_admin_view');
		$this->load->view('back/editar_usuario_view', $data);
		$this->load->view('partes/footer_view');
    }



}
