<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Auth
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Johannes Alexander Putra <johannesap@upi.edu>
 * @link      https://github.com/Itsjohanes
 * @param     ...
 * @return    ...
 *
 */

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('role') == "1") {
      redirect('admin');
    }else if ($this->session->userdata('role') == "2") {
      redirect('gudang');
    }else if ($this->session->userdata('role') == "3") {
      redirect('kantor');
    }else{
      redirect('auth');
    }
      
  }

  public function index()
  {
    $data['title'] = 'Login';
    $this->load->view('auth/header', $data);
    $this->load->view('auth/login');
    $this->load->view('auth/footer');
    
  }
  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role');
    $this->session->unset_userdata('id_user');
    $this->session->unset_userdata('id_tempat');
    $this->session->unset_userdata('nama');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
    redirect('auth');
  }

  public function login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $password = hash('sha256', $password);
    $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
    if ($user) {
      if ($password == $user['password']) {
        $data = [
          'id_user' => $user['id_user'],
          'email' => $user['email'],
          'nama' => $user['nama'],
          'role' => $user['role'],
          'id_tempat' => $user['id_tempat']
        ];
        $this->session->set_userdata($data);
        //redirect('Admin');
        if ($data['role'] == 1) {
          redirect('admin');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong password!</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered!</div>');
      redirect('auth');
    }
  }
}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */