<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudController extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('CrudModel');
    }

	public function data()
	{
        $data['result'] = $this->CrudModel->getAllData();
		$this->load->view('CrudView', $data);
    }

    public function edit($id){
        $data['row'] = $this->CrudModel->getData($id);
        $this->load->view('CrudViewEdit',$data);
    }

    public function update($id){
        $this->CrudModel->updateData($id);
        redirect('CrudController/data');
    }

    public function delete($id){
        $this->CrudModel->deleteData($id);
        redirect('CrudController/data');
    }

    public function create(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('namalengkap','Nama Lengkap','required');
        $this->form_validation->set_rules('NIM','Nomor Induk Mahasiswa','required');
        $this->form_validation->set_rules('no_telp','No Handphone','required');

        if ($this->form_validation->run() == FALSE){

            $this->load->view('CrudViewForm');
        }

        else{
            
            $this->CrudModel->createData();
            $this->session->set_flashdata('msg','<div class="alert alert-sucess">Berhasil Menambah Data</div>');
            redirect("CrudController");
        }
    }

	public function index()
	{
        $this->load->view('CrudViewForm');
	}
    
}
