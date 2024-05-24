<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Admin
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

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('role') == "1") {
      $this->load->library('Cetak_pdf');
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
      $data['title'] = "Dashboard";
      $data['tanggal'] = date('Y-m-d');
      //Mendapatkan jumlah akun gudang
      $this->db->where('role', 2);
      $data['gudang'] = $this->db->count_all_results('tb_user');
      //Mendapatkan jumlah akun kantor
      $this->db->where('role', 3);
      $data['kantor'] = $this->db->count_all_results('tb_user');
      $query = $this->db->query("SELECT DATE(tanggal) as date, COUNT(*) as count FROM tb_penjualan  GROUP BY DATE(tanggal)");
      $data['penjualan'] = $query->result_array();
      $this->load->view('admin/header', $data);
      $this->load->view('admin/sidebar');
      $this->load->view('admin/dashboard');
      $this->load->view('admin/footer');
  }
  public function kepindahan_barang(){
    $data['title'] = "Mencatat Pindah Barang";
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar');
    $this->load->view('admin/kepindahan_barang');
    $this->load->view('admin/footer');
  
  }
  public function barang(){
    $data['title'] = "Data Barang";
    $data['barang'] = $this->db->get('tb_barang')->result_array();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar');
    $this->load->view('admin/barang');
    $this->load->view('admin/footer');
  
  }
  public function tambah_barang(){
    $id_barang = $this->input->post('id_barang');
    $nama = $this->input->post('nama');
    $data = array(
      'id_barang' => $id_barang,
      'nama' => $nama
    );
    $this->db->insert('tb_barang', $data);
    $this->session->set_flashdata('category_success', 'Data berhasil ditambahkan');
    redirect('admin/barang');
   
  }
  public function delete_barang($id_barang){
    $this->db->where('id_barang', $id_barang);
    $this->db->delete('tb_barang');
    $this->session->set_flashdata('category_success', 'Data berhasil dihapus');
    redirect('admin/barang');
  
  }
  public function edit_barang($id_barang){
    $data['title'] = "Edit Barang";
    $data['barang'] = $this->db->get_where('tb_barang', ['id_barang' => $id_barang])->row_array();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar');
    $this->load->view('admin/edit_barang');
    $this->load->view('admin/footer');
  
  
  }
  public function run_edit_barang(){
    $id_barang = $this->input->post('id_barang');
    $nama = $this->input->post('nama');
    $data = array(
      'nama' => $nama
    );
    $this->db->where('id_barang', $id_barang);
    $this->db->update('tb_barang', $data);
    $this->session->set_flashdata('category_success', 'Data berhasil diubah');
    redirect('admin/barang');
  }
  public function akun(){
    $data['title'] = "Data Akun";
    $data['akun'] = $this->db->get('tb_user')->result_array();
    $data['tempat'] = $this->db->get('tb_tempat')->result_array();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar');
    $this->load->view('admin/akun');
    $this->load->view('admin/footer');
  }
  
  public function tambah_akun(){
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $role = $this->input->post('role');
    $id_tempat = $this->input->post('id_tempat');
    $password = hash('sha256', $password);
    $data = array(
      'nama' => $nama,
      'email' => $email,
      'password' => $password,
      'role' => $role,
      'id_tempat' => $id_tempat
    );
    $this->db->insert('tb_user', $data);
    $this->session->set_flashdata('category_success', 'Data berhasil ditambahkan');
    redirect('admin/akun');
  }
  public function edit_akun($id_user){
    $data['title'] = "Edit Akun";
    $data['akun'] = $this->db->get_where('tb_user', ['id_user' => $id_user])->row_array();
    $data['tempat'] = $this->db->get('tb_tempat')->result_array();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar');
    $this->load->view('admin/edit_akun');
    $this->load->view('admin/footer');
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
    redirect('admin/akun');
  

  }
  public function delete_akun($id_user){
    $this->db->where('id_user', $id_user);
    $this->db->delete('tb_user');
    $this->session->set_flashdata('category_success', 'Data berhasil dihapus');
    redirect('admin/akun');
  
  }
  public function tempat(){
    $data['title'] = "Data Tempat";
    $data['tempat'] = $this->db->get('tb_tempat')->result_array();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar');
    $this->load->view('admin/tempat');
    $this->load->view('admin/footer');
  
  }
  public function tambah_tempat(){
    $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    //tambahkan ke basis data tb_tempat
    $data = array(
      'nama' => $nama,
      'alamat' => $alamat
    );
    $this->db->insert('tb_tempat', $data);
    $this->session->set_flashdata('category_success', 'Data berhasil ditambahkan');
    redirect('admin/tempat');
  }
  public function delete_tempat($id_tempat){
    $this->db->where('id_tempat', $id_tempat);
    $this->db->delete('tb_tempat');
    $this->session->set_flashdata('category_success', 'Data berhasil dihapus');
    redirect('admin/tempat');
  }
  public function edit_tempat($id_tempat){
    $data['title'] = "Edit Tempat";
    $data['tempat'] = $this->db->get_where('tb_tempat', ['id_tempat' => $id_tempat])->row_array();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar');
    $this->load->view('admin/edit_tempat');
    $this->load->view('admin/footer');
  
  }
  public function run_edit_tempat(){
    $id_tempat = $this->input->post('id_tempat');
    $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    $data = array(
      'nama' => $nama,
      'alamat' => $alamat
    );
    $this->db->where('id_tempat', $id_tempat);
    $this->db->update('tb_tempat', $data);
    $this->session->set_flashdata('category_success', 'Data berhasil diubah');
    redirect('admin/tempat');
  
  }
  public function pindah(){
    $data['title'] = "Pindah Barang";
    $data['pindahbarang'] = $this->db->get('tb_pindahbarang')->result_array();
    $data['tempat'] = $this->db->get('tb_tempat')->result_array();
    $data['barang'] = $this->db->get('tb_barang')->result_array();
    $data['user'] = $this->db->get('tb_user')->result_array();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar');
    $this->load->view('admin/pindah_barang');
    $this->load->view('admin/footer');
  }

  public function tambah_pindah(){
    $id_barang = $this->input->post('id_barang');
    $jumlah = $this->input->post('jumlah');
    $id_tempat_asal = $this->input->post('id_tempat_asal');
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
    redirect('admin/pindah');
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
      redirect('admin/pindah');
  

    
  }

  public function jumlah_barang(){
    $data['title'] = "Data Jumlah Barang";
    $data['barang'] = $this->db->get('tb_barang')->result_array();
    $data['jumlahbarang'] = $this->db->get('tb_jumlah_barang')->result_array();
    $data['tempat'] = $this->db->get('tb_tempat')->result_array();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar');
    $this->load->view('admin/jumlah_barang');
    $this->load->view('admin/footer');
  
  }
  public function detail_jumlah_barang($id_jumlah_barang){
    $data['title'] = "Detail Jumlah Barang";
    //select semua data dari tb_jumlah_barang berdasarkan id_jumlah_barang
    $data['jumlahbarang'] = $this->db->get_where('tb_jumlah_barang', ['id_jumlahbarang' => $id_jumlah_barang])->row_array();
    $data['id_barang'] = $data['jumlahbarang']['id_barang'];
    $data['id_tempat'] = $data['jumlahbarang']['id_tempat'];
    //Pindah
    $data['pindah_dari'] = $this->db->get_where('tb_pindahbarang', ['id_barang' => $data['id_barang'], 'id_tempat_asal' => $data['id_tempat']])->result_array();
    $data['pindah_ke'] = $this->db->get_where('tb_pindahbarang', ['id_barang' => $data['id_barang'], 'id_tempat_tujuan' => $data['id_tempat']])->result_array();
    //Penjualan
    $data['penjualan'] = $this->db->get_where('tb_penjualan', ['id_barang' => $data['id_barang'], 'id_tempat_asal' => $data['id_tempat']])->result_array();
    $data['user'] = $this->db->get('tb_user')->result_array();
    $data['tempat'] = $this->db->get('tb_tempat')->result_array();
    $data['barang'] = $this->db->get('tb_barang')->result_array();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar');
    $this->load->view('admin/detail_jumlah_barang');
    $this->load->view('admin/footer');
  }

  public function tambah_jumlah_barang(){
    $id_barang = $this->input->post('id_barang');
    $id_tempat = $this->input->post('id_tempat');
    $jumlah = $this->input->post('jumlah');
    $data = array(
      'id_barang' => $id_barang,
      'id_tempat' => $id_tempat,
      'jumlah' => $jumlah
    );
    $this->db->insert('tb_jumlah_barang', $data);
    $this->session->set_flashdata('category_success', 'Data berhasil ditambahkan');
    redirect('admin/jumlah_barang');
   
  }
  public function delete_jumlah_barang($id_jumlah_barang){
    $this->db->where('id_jumlahbarang', $id_jumlah_barang);
    $this->db->delete('tb_jumlah_barang');
    $this->session->set_flashdata('category_success', 'Data berhasil dihapus');
    redirect('admin/jumlah_barang');
  
  }
  public function edit_jumlah_barang($id_jumlah_barang){
    $data['title'] = "Edit Barang";
    $data['barang'] = $this->db->get('tb_barang')->result_array();
    $data['jumlahbarang'] = $this->db->get('tb_jumlah_barang')->result_array();
    $data['tempat'] = $this->db->get('tb_tempat')->result_array();    
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar');
    $this->load->view('admin/edit_jumlah_barang');
    $this->load->view('admin/footer');
  
  
  }
  public function penjualan(){
    $data['title'] = "Data Penjualan Barang";
    $data['penjualan'] = $this->db->get('tb_penjualan')->result_array();
    $data['tempat'] = $this->db->where('id_tempat !=', 6)->get('tb_tempat')->result_array();
    $data['user'] = $this->db->get('tb_user')->result_array();
    $data['barang'] = $this->db->get('tb_barang')->result_array();
    $this->load->view('admin/header', $data);
    $this->load->view('admin/sidebar');
    $this->load->view('admin/penjualan');
    $this->load->view('admin/footer');
  
  }
  public function tambah_penjualan(){
    $penjualan = $this->db->get('tb_penjualan')->result_array();
    $id_barang = $this->input->post('id_barang');
    $jumlah = $this->input->post('jumlah');
    $id_tempat_asal = $this->input->post('id_tempat_asal');
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
    redirect('admin/penjualan');
  

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
    redirect('admin/penjualan');

  }

}

 
 


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */