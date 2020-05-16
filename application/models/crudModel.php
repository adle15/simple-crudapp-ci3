<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudModel extends CI_Model {
    public function __construct(){
        $this->load->database();
    }
    
    function createData(){
        $data = array (
            'namalengkap' => $this->input->post('namalengkap'),
            'NIM' => $this->input->post('NIM'),
            'no_telp' => $this->input->post('no_telp')
        );
        $this->db->insert('biodata', $data);
    }

    function getAllData(){
        $query = $this->db->query('SELECT * FROM biodata');
        return $query->result();
    }
    
    function getData($id){
        $query = $this->db->query('SELECT * FROM biodata WHERE id =' .$id);
        return $query->row();
    }

    function updateData($id){
        $data = array (
            'namalengkap' => $this->input->post('namalengkap'),
            'NIM' => $this->input->post('NIM'),
            'no_telp' => $this->input->post('no_telp')
        );
        $this->db->where('id', $id);
        $this->db->update('biodata',$data);
    }

    function deleteData($id){
        $this->db->where('id', $id);
        $this->db->delete('biodata');
    }

    function createDatauser(){
        $data = array (
            'email' => $this->input->post('email'),
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'password' => ($this->input->post('password'))
        );
        $this->db->insert('user', $data);
    }

    public function validateuser(){
        $this->db->select('email');
        $query  =   $this->db->get('user');

        if($query->num_rows()==1){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function validateusernim(){
        $this->db->select('nim');
        $query  =   $this->db->get('user');

        if($query->num_rows()==1){
            return TRUE;
        }else{
            return FALSE;
        }
    }

}
