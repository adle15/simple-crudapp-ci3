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
            $this->session->set_flashdata('msg','<div class="alert alert-success">Berhasil Menambah Data</div>');
            redirect("CrudController");
        }
    }

	public function index()
	{
        $this->load->view('CrudViewForm');
    }
    
    public function login(){
        $this->load->view('login');
    }

    function auth(){
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('login');
        }

        else{
            $email  =   $this->input->post('email');
            $password   =   $this->input->post('password');
            $auth   =   $this->db->get_where('user',['email'=> $email])->row_array();
            if($auth){
                if($password==$auth['password']){
                    $data=[
                        'email' => $auth['email'],
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Your Already Login</div>');
                    redirect('CrudController/data');
                }
                else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Invalid</div>');
                    redirect('CrudController/login');
                }
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Email not Registered</div>');
                redirect('CrudController/login');
            }

        }

    }

    function logout(){
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Successfully Logout</div>');
        redirect('CrudController/login');
    }

    public function register(){
        $this->load->view('register');
    }

    public function regist(){
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('nim','Nomor Induk Mahasiswa','required');
        $this->form_validation->set_rules('namalengkap','Nama Lengkap','required');
        $this->form_validation->set_rules('password','Password','required');

        if ($this->form_validation->run() == FALSE){

            $this->load->view('register');
        }

        else{
            
            $this->CrudModel->createDatauser();
            $this->session->set_flashdata('msg','<div class="alert alert-success">Berhasil Registrasi</div>');
            redirect("CrudController");
        }
    }
    
}
