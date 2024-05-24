<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller kantor
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

class Kantor extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('role') == "1") {
      redirect('admin');
    }else if ($this->session->userdata('role') == "2") {
      redirect('gudang');
    }else if ($this->session->userdata('role') == "3") {
      $this->load->library('Cetak_pdf');
    }else{
      redirect('auth');
    }
    
  }
  public function index()
  {
      $data['title'] = "Dashboard";
      $data['tanggal'] = date('Y-m-d');
      $this->db->where('role', 3);
      $data['kantor'] = $this->db->count_all_results('tb_user');
      $query = $this->db->query("SELECT DATE(tanggal) as date, COUNT(*) as count FROM tb_penjualan WHERE id_tempat_asal = ".$this->session->userdata('id_tempat')." GROUP BY DATE(tanggal)");
      $data['penjualan'] = $query->result_array();
      
      $this->load->view('kantor/header', $data);
      $this->load->view('kantor/sidebar');
      $this->load->view('kantor/dashboard');
      $this->load->view('kantor/footer');
  }
  public function kepindahan_barang(){
    $data['title'] = "Mencatat Pindah Barang";
    $this->load->view('kantor/header', $data);
    $this->load->view('kantor/sidebar');
    $this->load->view('kantor/kepindahan_barang');
    $this->load->view('kantor/footer');
  
  }

  public function edit_akun(){
    $data['title'] = "Edit Akun";
    $id_user = $this->session->userdata('id_user');
    $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $id_user])->row_array();
    $data['tempat'] = $this->db->get('tb_tempat')->result_array();
    $this->load->view('kantor/header', $data);
    $this->load->view('kantor/sidebar');
    $this->load->view('kantor/edit_akun');
    $this->load->view('kantor/footer');
  }
  public function run_edit_akun(){
    $id_user = $this->input->post('id_user');
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $role = $this->input->post('role');
    $password = $this->input->post('password');
    $password = hash('sha256', $password);
    $id_tempat = $this->input->post('id_tempat');
    $data = array(
      'nama' => $nama,
      'email' => $email,
      'role' => $role,
      'id_tempat' => $id_tempat,
      'password' => $password
    );
    $this->db->where('id_user', $id_user);
    $this->db->update('tb_user', $data);
    $this->session->set_flashdata('category_success', 'Data berhasil diubah');
    redirect('kantor');
  

  }


  public function pindah(){
    $data['title'] = "Pindah Barang";
    $this->db->where('id_tempat_asal', $this->session->userdata('id_tempat'));
    $this->db->or_where('id_tempat_tujuan', $this->session->userdata('id_tempat'));
    $data['pindahbarang'] = $this->db->get('tb_pindahbarang')->result_array();
    $data['tempat'] = $this->db->get('tb_tempat')->result_array();
    $data['barang'] = $this->db->get('tb_barang')->result_array();
    $data['user'] = $this->db->get('tb_user')->result_array();

    $this->load->view('kantor/header', $data);
    $this->load->view('kantor/sidebar');
    $this->load->view('kantor/pindah_barang');
    $this->load->view('kantor/footer');
  }

  public function tambah_pindah(){
    $id_barang = $this->input->post('id_barang');
    $jumlah = $this->input->post('jumlah');
    $id_tempat_asal = $this->session->userdata('id_tempat');
    $id_tempat_tujuan = $this->input->post('id_tempat_tujuan');
    $keterangan = $this->input->post('keterangan');
    $timestampSaatIni = time();

    // Format time stamp ke dalam format datetime SQL
    $tanggalSQL = date("Y-m-d H:i:s", $timestampSaatIni);

    $data = array(
      'id_barang' => $id_barang,
      'jumlah' => $jumlah,
      'id_tempat_asal' => $id_tempat_asal,
      'id_tempat_tujuan' => $id_tempat_tujuan,
      'keterangan' => $keterangan,
      'tanggal' => $tanggalSQL,
      'id_user' => $this->session->userdata('id_user')
    );
    $this->db->insert('tb_pindahbarang', $data);
    //Edit Kecuali data AFC Jepang

    if($id_tempat_asal != "6"){
      $jumlah_barang = $this->db->get_where('tb_jumlah_barang', ['id_barang' => $id_barang, 'id_tempat' => $id_tempat_asal])->row_array();
      $jumlah_sekarang = $jumlah_barang['jumlah'];
      $jumlah_sekarang = $jumlah_sekarang - $jumlah;
      $data = array(
        'jumlah' => $jumlah_sekarang
      );
      $this->db->where('id_barang', $id_barang);
      $this->db->where('id_tempat', $id_tempat_asal);
      $this->db->update('tb_jumlah_barang', $data);
    }
    if($id_tempat_tujuan != "6"){
      $jumlah_barang = $this->db->get_where('tb_jumlah_barang', ['id_barang' => $id_barang, 'id_tempat' => $id_tempat_tujuan])->row_array();
      $jumlah_sekarang = $jumlah_barang['jumlah'];
      $jumlah_sekarang = $jumlah_sekarang + $jumlah;
      $data = array(
        'jumlah' => $jumlah_sekarang
      );
      $this->db->where('id_barang', $id_barang);
      $this->db->where('id_tempat', $id_tempat_tujuan);
      $this->db->update('tb_jumlah_barang', $data);

    }


    $this->session->set_flashdata('category_success', 'Data berhasil ditambahkan');
    redirect('kantor/pindah');
  }
  public function batal_pindah($id_pindahbarang){
      //ambil jumlah, id_asal, id_tujuan
      $pindahbarang = $this->db->get_where('tb_pindahbarang', ['id_pindah' => $id_pindahbarang])->row_array();
      $id_barang = $pindahbarang['id_barang'];
      $jumlah = $pindahbarang['jumlah'];
      $id_asal = $pindahbarang['id_tempat_asal'];
      $id_tujuan = $pindahbarang['id_tempat_tujuan'];

      if($id_tujuan != "6"){
        $jumlah_barang = $this->db->get_where('tb_jumlah_barang', ['id_barang' => $id_barang, 'id_tempat' => $id_tujuan])->row_array();
        $jumlah_sekarang = $jumlah_barang['jumlah'];
        $jumlah_sekarang = $jumlah_sekarang - $jumlah;
        $data = array(
          'jumlah' => $jumlah_sekarang
        );
        $this->db->where('id_barang', $id_barang);
        $this->db->where('id_tempat', $id_tujuan);
        echo $this->db->update('tb_jumlah_barang', $data);
        
      }

      if($id_asal != "6"){
        $jumlah_barang = $this->db->get_where('tb_jumlah_barang', ['id_barang' => $id_barang, 'id_tempat' => $id_asal])->row_array();
        $jumlah_sekarang = $jumlah_barang['jumlah'];
        $jumlah_sekarang = $jumlah_sekarang + $jumlah;
        $data = array(
          'jumlah' => $jumlah_sekarang
        );
        $this->db->where('id_barang', $id_barang);
        $this->db->where('id_tempat', $id_asal);
        $this->db->update('tb_jumlah_barang', $data);

      }
     

      $this->db->where('id_pindah', $id_pindahbarang);
      
      $this->db->delete('tb_pindahbarang');
      $this->session->set_flashdata('category_success', 'Data berhasil dihapus');
      redirect('kantor/pindah');
  

    
  }

  public function jumlah_barang(){
    $data['title'] = "Data Jumlah Barang";
    $data['barang'] = $this->db->get('tb_barang')->result_array();
    $data['jumlahbarang'] = $this->db->get('tb_jumlah_barang')->result_array();
    $data['tempat'] = $this->db->get('tb_tempat')->result_array();
    $this->load->view('kantor/header', $data);
    $this->load->view('kantor/sidebar');
    $this->load->view('kantor/jumlah_barang');
    $this->load->view('kantor/footer');
  
  }
  
  public function penjualan(){
    $data['title'] = "Data Penjualan Barang";
    $data['penjualan'] = $this->db->get_where('tb_penjualan',['id_tempat_asal' => $this->session->userdata('id_tempat')])->result_array();
    $data['tempat'] = $this->db->where('id_tempat !=', 6)->get('tb_tempat')->result_array();
    $data['user'] = $this->db->get('tb_user')->result_array();
    $data['barang'] = $this->db->get('tb_barang')->result_array();
    $this->load->view('kantor/header', $data);
    $this->load->view('kantor/sidebar');
    $this->load->view('kantor/penjualan');
    $this->load->view('kantor/footer');
  
  }
  public function tambah_penjualan(){
    $penjualan = $this->db->get('tb_penjualan')->result_array();
    $id_barang = $this->input->post('id_barang');
    $jumlah = $this->input->post('jumlah');
    $id_tempat_asal = $this->session->userdata('id_tempat');
    $pembeli = $this->input->post('pembeli');
    $keterangan = $this->input->post('keterangan');
    $melalui = $this->input->post('melalui');
    $timestampSaatIni = time();

    // Format time stamp ke dalam format datetime SQL
    $tanggalSQL = date("Y-m-d H:i:s", $timestampSaatIni);

    $data = array(
      'id_barang' => $id_barang,
      'jumlah' => $jumlah,
      'id_tempat_asal' => $id_tempat_asal,
      'pembeli' => $pembeli,
      'keterangan' => $keterangan,
      'melalui' => $melalui,
      'tanggal' => $tanggalSQL,
      'id_user' => $this->session->userdata('id_user')
    );
    $this->db->insert('tb_penjualan', $data);

      $jumlah_barang = $this->db->get_where('tb_jumlah_barang', ['id_barang' => $id_barang, 'id_tempat' => $id_tempat_asal])->row_array();
      $jumlah_sekarang = $jumlah_barang['jumlah'];
      $jumlah_sekarang = $jumlah_sekarang - $jumlah;
      $data = array(
        'jumlah' => $jumlah_sekarang
      );
      $this->db->where('id_barang', $id_barang);
      $this->db->where('id_tempat', $id_tempat_asal);
      $this->db->update('tb_jumlah_barang', $data);
    
    $this->session->set_flashdata('category_success', 'Data berhasil ditambahkan');
    redirect('kantor/penjualan');
  

  }
  public function batal_jual($id_penjualan){
    $penjualan = $this->db->get_where('tb_penjualan', ['id_penjualan' => $id_penjualan])->row_array();
    $id_barang = $penjualan['id_barang'];
    $jumlah = $penjualan['jumlah'];
    $id_asal = $penjualan['id_tempat_asal'];
    
    $jumlah_barang = $this->db->get_where('tb_jumlah_barang', ['id_barang' => $id_barang, 'id_tempat' => $id_asal])->row_array();
    $jumlah_sekarang = $jumlah_barang['jumlah'];
    $jumlah_sekarang = $jumlah_sekarang + $jumlah;
    $data = array(
      'jumlah' => $jumlah_sekarang
    );
    $this->db->where('id_barang', $id_barang);
    $this->db->where('id_tempat', $id_asal);
    $this->db->update('tb_jumlah_barang', $data);

    $this->db->where('id_penjualan', $id_penjualan);
    $this->db->delete('tb_penjualan');
    $this->session->set_flashdata('category_success', 'Data berhasil dihapus');
    redirect('kantor/penjualan');

  }
  
}

 
 


/* End of file kantor.php */
/* Location: ./application/controllers/kantor.php */