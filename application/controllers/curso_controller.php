<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Curso_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect('ingresar');
        }else{
            $this->load->model('curso_model');
        }
        
    }

    public function form_agregar_curso()
    {
        $this->load->model('curso_model');
        $data['titulo'] = 'Agregar curso';
        $data['categorias'] = $this->curso_model->select_categorias();

        $this->load->view('partes/head_view',$data);
        $this->load->view('partes/navbar_admin_view');
        $this->load->view('back/productos/agregar_curso_view',$data);
        $this->load->view('partes/footer_view');
    }

    public function gestionar_cursos()
    {
        
        $data['cursos'] = $this->curso_model->select_cursos();
        $data['titulo'] = 'Gestionar cursos';
        $this->load->view('partes/head_view', $data);
        $this->load->view('partes/navbar_admin_view');
        $this->load->view('back/productos/gestionar_curso_view', $data);
        $this->load->view('partes/footer_view');
    }



    public function registrar_curso()
    {
        // Generar las reglas de acuerdo a los controles del formulario creado
        $this->form_validation->set_rules('nombre', 'Nombre del curso', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion del curso', 'required');
        $this->form_validation->set_rules('precio', 'Precio del curso', 'required|numeric');
        $this->form_validation->set_rules(
            'categoria',
            'Seleccionar una categoria',
            'required|callback_select_validate'
        );
        $this->form_validation->set_rules(
            'imagen',
            'Seleccionar una imagen',
            'callback_validar_imagen'
        );

        $this->form_validation->set_message('numeric', 'Debe ingresar valores numéricos');
        $this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        if ($this->form_validation->run() == FALSE) {
            $this->form_agregar_curso();
        } else {
            $this->guardar_curso();
        }
    }

    function editar_curso($id)
    {
        
        $data['categorias'] = $this->curso_model->select_categorias();
        $curso = $this->curso_model->select_curso_id($id);

        foreach ($curso as $row) {
            $data['curso_id'] = $row->curso_id;
            $data['curso_nombre'] = $row->curso_nombre;
            $data['categoria'] = $row->curso_categoria;
            $data['descripcion'] = $row->curso_descripcion;
            $data['imagen'] = $row->curso_imagen;
            $data['precio'] = $row->curso_precio;
            $data['estado'] = $row->curso_estado;
        }  
        
        $this->load->view('partes/head_view', array('titulo' => "Editar curso"));
        $this->load->view('partes/navbar_admin_view');
        $this->load->view('back/productos/gestionar_curso_edicion_view', $data);
        $this->load->view('partes/footer_view');
    }

    public function activar_curso($id = !NULL)
    {
        $data = array(
            'curso_estado' => 1
        );
        $this->curso_model->actualizar_curso($data, $id);
        $this->gestionar_cursos();
    }

    public function eliminar_curso($id = !NULL)
    {
        $data = array(
            'curso_estado' => 0
        );
        $this->curso_model->actualizar_curso($data, $id);
        $this->gestionar_cursos();
    }


    public function actualizar_curso($id)
    {
        //validaciones de formulario
        $this->form_validation->set_rules('curso_nombre', 'Nombre del curso', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion del curso', 'required');
        $this->form_validation->set_rules('precio', 'Precio del curso', 'required|numeric');

        $this->form_validation->set_rules(
            'categoria',
            'Seleccionar una categoria',
            'required|callback_select_validate'
        );
        $this->form_validation->set_message('numeric', 'Debe ingresar valores numéricos');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        
        //comprueba si se ingreso correctamente los formularios
        if ($this->form_validation->run() == FALSE) {
            $this->editar_curso($id);
        } else {
            //sube o actualiza la imagen
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '1024';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('imagen')) {
                $data = array(
                    'curso_nombre' => $this->input->post('curso_nombre'),
                    'curso_categoria' => $this->input->post('categoria'),
                    'curso_descripcion' => $this->input->post('descripcion'),
                    'curso_precio' => $this->input->post('precio'),
                    'curso_estado' => 1
                );
                
            } else {
                $data = array(
                    'curso_nombre' => $this->input->post('curso_nombre'),
                    'curso_categoria' => $this->input->post('categoria'),
                    'curso_descripcion' => $this->input->post('descripcion'),
                    'curso_precio' => $this->input->post('precio'),
                    'curso_imagen' => $_FILES['imagen']['name'],
                    'curso_estado' => 1
                );
                
            }
            $this->curso_model->actualizar_curso($data, $id);
            $this->gestionar_cursos();
        }
    }



    public function guardar_curso()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
        $config['remove_spaces'] = TRUE;
        $config['max_size'] = '1024';
        $this->load->library('upload', $config);
        //verifica si el archivo ya existe
        if (!is_file(realpath('./uploads/' . $_FILES['imagen']['name']))) {
            //sube la imagen
            if (!$this->upload->do_upload('imagen')) {
                //mensaje de error por si falla
                echo "<script type=\"text/javascript\">alert('No se pudo cargar el archivo');</script>";
                $this->form_agregar_curso();
            } else {
                //agrega los detalles del producto a un array
                $data = array(
                    'curso_nombre' => $this->input->post('nombre'),
                    'curso_categoria' => $this->input->post('categoria'),
                    'curso_descripcion' => $this->input->post('descripcion'),
                    'curso_precio' => $this->input->post('precio'),
                    'curso_imagen' => $_FILES['imagen']['name'],
                    'curso_estado' => 1
                );
                //guarda curso
                $this->curso_model->guardar_curso($data);
                redirect('agregar');
            }
        } else {
            //guardar el curso
            $data = array(
                'curso_nombre' => $this->input->post('nombre'),
                'curso_categoria' => $this->input->post('categoria'),
                'curso_descripcion' => $this->input->post('descripcion'),
                'curso_precio' => $this->input->post('precio'),
                'curso_imagen' => $_FILES['imagen']['name'],
                'curso_estado' => 1
            );
            $this->curso_model->guardar_curso($data);
            redirect('agregar');
        }
    }

    function validar_imagen($imagen)
    {
        //Verifica que se ingreso una imagen
        $nombre_imagen = $_FILES['imagen']['name']; //Obtiene el nombre de la imagen
        if (empty($nombre_imagen)) {
            $this->form_validation->set_message('validar_imagen', 'Seleccione una imagen');
            return false;
        } else {
            return true;
        }
    }

    function select_validate($marca)
    {
        if ($marca == "0") {
            $this->form_validation->set_message('select_validate', 'Seleccione una categoria');
            return false;
        } else {
            return true;
        }
    }
}
