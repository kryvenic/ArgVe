<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Usuario_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function guardar_usuario($data){
        $this->db->insert('usuarios', $data);
    }

    //actualiza con datos nuevos
    public function actualizar_usuario($data,$id){
        $this->db->where('id_usuario',$id);
        $this->db->update('usuarios',$data);
    }


    /** Buscar un usuario por email y contraseña */
    public function buscar_usuario($usuario, $contrasenia)
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('mail', $usuario);
        $this->db->where('password', $contrasenia);
        $query = $this->db->get();
        $resultado = $query->row();
        return $resultado;
    }
    /** Buscar un usuario por id */
    public function buscar_usuario_id($id)
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('id_usuario', $id);
        $query = $this->db->get();
        $resultado = $query->row();
        return $resultado;
    }
    /** Hace un Select de todos los usuarios*/
    public function select_usuarios(){
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->join('perfil','perfil.id_perfil = usuarios.perfil_id');
        $query = $this->db->get();
        return $query->result();
    }

        /** Select de tipo de perfiles */
    public function select_perfiles()
    {
        $this->db->select('*');
        $this->db->from('perfil');
        $query = $this->db->get();
        return $query->result();;
    }

}
