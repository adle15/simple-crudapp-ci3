<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crudController extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('crudModel');
    }

	public function index()
	{
        $data['result'] = $this->crudModel->getAllData();
		$this->load->view('crudView', $data);
    }

    public function edit($id){
        $data['row'] = $this->crudModel->getData($id);
        $this->load->view('crudViewEdit',$data);
    }

    public function update($id){
        $this->crudModel->updateData($id);
    }
}
