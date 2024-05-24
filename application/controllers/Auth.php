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
  }

  public function index()
  {
    //load view
    $data['title'] = 'Login';

    if ($this->session->userdata('email') == '') {
      $this->load->view('auth/header', $data);
      $this->load->view('auth/login');
      $this->load->view('auth/footer');
    } else {
      redirect('Admin');
    }
  }
  public function logout()
  {
    //buat logout
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('role');
    $this->session->unset_userdata('id_tempat');
    $this->session->unset_userdata('id_user');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
    redirect('auth');
  }

  public function login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    //ubah password menjadi sha256
    $password = hash('sha256', $password);
    $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
    if ($user) {
      //jika usernya aktif cek password
      if ($password == $user['password']) {
        $data = [
          //role id 1 adalah admin
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
        }else if ($data['role'] == 2) {
          redirect('gudang');
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