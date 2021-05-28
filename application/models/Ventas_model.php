<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ventas_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function guardar_venta($data){
        $this->db->insert('venta',$data);
    }

    public function guardar_detalle_venta($data){
        $this->db->insert('detalle_venta',$data);
    }

    public function select_ventas(){
        $this->db->select('*');
        $this->db->from('venta');
        $this->db->join('usuarios','usuarios.id_usuario = venta.id_cliente');
        $query = $this->db->get();
        return $query->result();
    }
    public function select_detalle_ventas($id){
        $this->db->select('*');
        $this->db->from('detalle_venta');
        $this->db->where('id_venta',$id);

        $this->db->join('venta','venta.venta_id = detalle_venta.id_venta');
        $this->db->join('curso','curso.curso_id = detalle_venta.id_producto');
        $query = $this->db->get();
        return $query->result();
    }
}
