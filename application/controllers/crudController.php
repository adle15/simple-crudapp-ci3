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
        $this->CrudModel->createData();
        redirect("CrudController/form");
    }

	public function index()
	{
		$this->load->view('CrudViewForm');
	}
    
}
