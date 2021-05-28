<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyect_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['titulo'] = 'Pagina Principal';
		

		$this->load->view('partes/head_view', $data);
		$this->load->view('partes/navbar_view');
		$this->load->view('principal');
		$this->load->view('partes/footer_view');
	}

	public function test(){
		$this->load->model("my_model");
		$name = $this->my_model->firstName();
		echo "My name is => ", $name; 
	}

	public function quienessomos()
	{
		$data['titulo'] = '¿Quienes Somos?';
		

		$this->load->view('partes/head_view', $data);
		$this->load->view('partes/navbar_view');
		$this->load->view('quienes_somos');
		$this->load->view('partes/footer_view');
	}
	public function suscripciones()
	{
		$data['titulo'] = 'suscripciones';
		

		$this->load->view('partes/head_view.php', $data);
		$this->load->view('partes/navbar_view.php');
		$this->load->view('suscripciones.php');
		$this->load->view('partes/footer_view.php');
	}
	
	public function terminosdeuso()
	{
		
		$data['titulo'] = 'Terminos de uso';

		$this->load->view('partes/head_view.php', $data);
		$this->load->view('partes/navbar_view.php');
		$this->load->view('terminos_de_uso.php');
		$this->load->view('partes/footer_view.php');
	}
	public function productos()
	{
		$this->load->model('curso_model');
		$data['cursos'] = $this->curso_model->select_cursos();
		$data['titulo'] = 'Catalogo de productos';

		$this->load->view('partes/head_view.php', $data);
		$this->load->view('partes/navbar_view.php');
		$this->load->view('catalogo.php',$data);
		$this->load->view('partes/footer_view.php');
	}

	
	


}
