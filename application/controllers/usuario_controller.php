<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
    }


    public function registrarse()
    {
        $data['titulo'] = 'Registrarse';

        $this->load->view('partes/head_view', $data);
        $this->load->view('partes/navbar_view');
        $this->load->view('formulario_registrar.php');
        $this->load->view('partes/footer_view');
    }

    public function login()
    {
        $data['titulo'] = 'Login';
        
        $this->load->view('partes/head_view', $data);
        $this->load->view('partes/navbar_view');
        $this->load->view('formulario_login');
        $this->load->view('partes/footer_view');
    }

    public function perfil($id)
	{
        $usuario = $this->usuario_model->buscar_usuario_id($id);
        $data['titulo'] = 'Perfil de usuario';
        $data['mail'] = $usuario->mail;

		$this->load->view('partes/head_view.php', $data);
		$this->load->view('partes/navbar_view.php');
		$this->load->view('perfil_usuario', $data);
		$this->load->view('partes/footer_view.php');
	}

    public function iniciar_sesion()
    {
        //FALTA VERIFICAR SI EL USUARIO ESTA DADO DE BAJA
        $this->form_validation->set_rules('mail', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_verificar_password');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        if ($this->form_validation->run() == FALSE) {
            $this->login();
        } else {
            $this->usuario_logueado();
        }
    }

    function verificar_password($password)
    {
        // Verificar que el usuario exista
        $usuario = $this->input->post('mail');
        $pass = $this->input->post('password');
        $contrasenia = base64_encode($pass);
        $this->load->model('usuario_model');
        $usuario = $this->usuario_model->buscar_usuario($usuario, $contrasenia);
        if ($usuario && $usuario->estado != 0) {
            $datos_usuario = array(
                'id_usuario' => $usuario->id_usuario,
                'nombre' => $usuario->nombre,
                'apellido' => $usuario->apellido,
                'perfil' => $usuario->perfil_id,
                'login' => TRUE
            );
            $this->session->set_userdata($datos_usuario);
            return true;
        } else {

            $this->form_validation->set_message('verificar_password', 'Usuario y/o contraseña invalidos');
            return false;
        }
    }

    public function activar_usuario($id)
    {
        $data = array(
            'estado' => 1
        );
        $this->usuario_model->actualizar_usuario($data, $id);
        redirect('gestionar_usuarios');
    }

    public function eliminar_usuario($id)
    {
        $data = array(
            'estado' => 0
        );
        $this->usuario_model->actualizar_usuario($data, $id);
        redirect('gestionar_usuarios');
    }

    function editar_usuario($id)
    {
        $usuario = $this->usuario_model->buscar_usuario_id($id);
        $perfil = $this->usuario_model->select_perfiles();

        $data['id'] = $usuario->id_usuario;
        $data['nombre'] = $usuario->nombre;
        $data['apellido'] = $usuario->apellido;
        $data['mail'] = $usuario->mail;
        $data['password'] = base64_decode($usuario->password);
        $data['perfil_id'] = $usuario->perfil_id;
        $data['perfil'] = $perfil;

        $this->load->view('partes/head_view', array('titulo' => "Editar USUARIO"));
        $this->load->view('partes/navbar_admin_view');
        $this->load->view('back/editar_usuario_view', $data);
        $this->load->view('partes/footer_view');
    }

    public function actualizar_usuario($id)
    {
        //reglas de formularios
        $this->form_validation->set_rules('apellido', 'Apellido del usuario', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre del usuario', 'required');
        $this->form_validation->set_rules('mail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('perfil', 'Seleccionar un perfil', 'required|callback_select_validate');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        //mensajes
        $this->form_validation->set_message('valid_email', 'El campo %s debe ser un mail válido');
        $this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
        $this->form_validation->set_message('min_length', 'El campo %s debe contener como mínimo %d caracteres');
        
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        //comprueba si se ingreso correctamente los formularios
        if ($this->form_validation->run() == FALSE) {
            $this->editar_usuario($id);
        } else {
            $data = array(
                'nombre' => $this->input->post('nombre'),
                'apellido' => $this->input->post('apellido'),
                'mail' => $this->input->post('mail'),
                'password' => base64_encode($this->input->post('password')),
                'perfil_id' => $this->input->post('perfil')
            );

            $this->usuario_model->actualizar_usuario($data, $id);
            redirect('gestionar_usuarios');
        }

    }

    
    function select_validate($perfil)
    {
        if ($perfil == "0") {
            $this->form_validation->set_message('select_validate', 'Seleccione un perfil');
            return false;
        } else {
            return true;
        }
    }


    public function usuario_logueado()
    {

        if ($this->session->userdata('login')) {
            //SE VERIFICA EL PERFIL DEL USUARIO PARA REDIRECCIONAR A LA PAGINA CORRESPONDIENTE
            switch ($this->session->userdata('perfil')) {
                case '1':
                    redirect('admin');
                    break;
                case '2':
                    redirect('principal');
                    break;
            }
        }
    }

    public function registrar_usuario()
    {
        $this->form_validation->set_rules('apellido', 'Apellido del usuario', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre del usuario', 'required');
        $this->form_validation->set_rules('mail', 'Email', 'required|valid_email|is_unique[usuarios.mail]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Confirmar password', 'trim|required|matches[password]');
        $this->form_validation->set_message('is_unique', 'cliente se encuentra registrado');
        $this->form_validation->set_message('valid_email', 'El campo %s debe ser un mail válido');
        $this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('min_length', 'El campo %s debe contener como mínimo %d caracteres');
        $this->form_validation->set_message('matches', 'Las contraseñas no coinciden');
        if ($this->form_validation->run() == FALSE) {
            $this->registrarse();
        } else {
            $this->insertar_usuario();
        }

    }


    public function insertar_usuario()
    {
        $usuario = array(
            'apellido' => $this->input->post('apellido'),
            'nombre' => $this->input->post('nombre'),
            'mail' => $this->input->post('mail'),
            'password' => base64_encode($this->input->post('password')),
            'perfil_id' => 2,
            'estado' => 1
        );
        $this->usuario_model->guardar_usuario($usuario);
        redirect('login');
    }


    public function cerrar_sesion()
    {
        $this->session->sess_destroy();
        redirect('principal');
    }
}
