<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library("form_validation");
    }
    public function index()
    {
        $this->load->view('admin/user/login');
    }
    public function login()
    {
        
        $this->form_validation->set_rules('lgn_username',"Username","trim|required",['required'=>'Username Tidak Boleh Kosong !!']);
        $this->form_validation->set_rules('lgn_password',"Password","trim|required",['required'=>'Password Tidak Boleh Kosong !!']);
        $this->form_validation->set_error_delimiters('<small class="form-text text-danger ml-3">','</small>');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/user/login');
        }
        else{
            $post = ['username' =>$this->input->post('lgn_username',true),'password' =>$this->input->post('lgn_password',true)];
            $getData = $this->user_model->checkLogin($post);
            if ($getData == null) {
                $this->session->set_flashdata('login','<div class="alert alert-danger my-2" style="margin-bottom:0px" role="alert">Login Gagal !! Kombinasi Username dan Password salah');
                redirect('user');
            }   
            else{
                $session=[
                    'user_id'=> $getData->id_user,
                    'username'=> $getData->username,
                    'login' => true
                ];
                $this->session->set_userdata($session);
                
                if ($getData->level == 'admin') {
                    $this->session->set_flashdata('login_success','<div class="alert alert-success" style="margin-bottom:0px" role="alert">Selamat Datang Admin '.$this->session->userdata('username').' :)</div>');
                    redirect('admin');
                }else{
                    $this->session->set_flashdata('login_success','<div class="alert alert-success" style="margin-bottom:0px" role="alert">Selamat Datang Karyawan  '.$this->session->userdata('username').' :)</div>');
                }
            }
        }
    }
    public function logout()
    {
        if ($this->session->userdata('login') == false) {
            redirect('user');
        }
        else{
            $this->session->sess_destroy();
            redirect('user');
        }
    }
}
