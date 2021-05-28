<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Curso_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function guardar_curso($data){
        $this->db->insert('curso',$data);
    }

    public function actualizar_curso($data,$id){
        $this->db->where('curso_id',$id);
        $this->db->update('curso',$data);
    }
    
    public function select_categorias(){
        $query = $this->db->get('categoria');
        return $query->result();
    }
    public function select_curso_id($id){
        $this->db->select('*');
        $this->db->from('curso');
        $this->db->where('curso_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_curso_id($id){
        $this->db->select('*');
        $this->db->from('curso');
        $this->db->where('curso_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function select_cursos(){
        $this->db->select('*');
        $this->db->from('curso');
        $this->db->join('categoria','categoria.categoria_id = curso.curso_categoria');
        $query = $this->db->get();
        return $query->result();
    }
}
