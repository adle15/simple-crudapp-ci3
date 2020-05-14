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

    function login($email,$password){
        $periksa=$this->db->get_where('user',array('email'=>$email,'password'=>sha1($password)));

        if($periksa->num_row>0){
            return 1;
        }else{
            return 0;
        }
    }

}
