<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

    public function __construct(){
        parent:: __construct();
        $this->load->model('CrudModel');
    }

    public function index()
	{
        $this->load->view('login/login');
    }

    function login(){
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('login/login');
        }

        else{
            $email  =   $this->input->post('email');
            $password   =   $this->input->post('password');
            $auth   =   $this->db->get_where('user',['email'=> $email])->row_array();
            if($auth){
                if($password==$auth['password']){
                    $data=[
                        'email' => $auth['email'],
                        'logged_in' => TRUE
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Your Already Login</div>');
                    redirect('CrudController/data');
                }
                else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Invalid</div>');
                    redirect('Auth/login');
                }
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email not Registered</div>');
                redirect('Auth/login');
            }

        }

    }

    function logout(){
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Successfully Logout</div>');
        redirect('Auth/login');
    }

    public function register(){
        $this->load->view('login/register');
    }

    public function regist(){
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]',array('is_unique' => 'Email %s Telah Terdaftar'));
        $this->form_validation->set_rules('nim','Nomor Induk Mahasiswa','required|is_unique[user.nim]|max_length[10]',array('is_unique' => 'NIM %s Telah Terdaftar'));
        $this->form_validation->set_rules('nama','Nama Lengkap','required');
        $this->form_validation->set_rules('password','Password','required|min_length[6]');

        if ($this->form_validation->run() == FALSE){

            $this->load->view('login/register');
        }

        else{
            
            $this->CrudModel->createDatauser();
            $this->session->set_flashdata('msg','<div class="alert alert-success">Berhasil Registrasi</div>');
            redirect("Auth/register");
        }
    }

}