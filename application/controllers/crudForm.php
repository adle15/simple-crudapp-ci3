<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crudForm extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('crudModel');
    }

    public function create(){
        $this->crudModel->createData();
        redirect("crudForm");
    }

	public function index()
	{
		$this->load->view('crudViewForm');
	}
}
