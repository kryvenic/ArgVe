<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Consulta_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('consulta_model');
    }

    public function infocontactos()
	{
		$data['titulo'] = 'Contacto';

		$this->load->view('partes/head_view.php', $data);
		$this->load->view('partes/navbar_view.php');
		$this->load->view('info_contactos.php');
		$this->load->view('partes/footer_view.php');
	}

    public function insertar_consulta()
    {
        
        $consulta = array(
            'nombre' => $this->input->post('nombre'),
            'mail' => $this->input->post('mail'),
            'asunto' => $this->input->post('asunto'),
            'consulta' => $this->input->post('mensaje'),
            'estado' => 1

        );
        
        
        $this->consulta_model->guardar_mensaje($consulta);
        redirect('principal');
    }

    public function registrar_consulta()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('mail', 'Email', 'required');
        $this->form_validation->set_rules('asunto', 'Asunto del usuario', 'required');
        $this->form_validation->set_rules('mensaje', 'Mensaje del usuario', 'required');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        if ($this->form_validation->run() == FALSE) {
            $this->infocontactos();
        } else {
            $this->insertar_consulta();
        }
    }

    public function eliminar_consulta($id)
    {
        $data = array(
            'estado' => 0
        );
        $this->consulta_model->actualizar_consulta($data, $id);
        redirect('ver_consultas');
    }


}
