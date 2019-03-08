<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct(){
    parent::__construct();
  }

  function list(){
    $total = $this->db->count_all('mahasiswa');

    $this->load->library('pagination');

    $config['total_rows'] = $total;
    $config['base_url'] = 'http://localhost/PWL/praktikum-4-rafatabahar/index.php/Home/list/';
    $config['per_page'] = 2;
    $config['num_links'] = $total /2 ;
    $config['next_link'] = '&nbspNext';
    $config['prev_link'] = 'previous&nbsp';
    $config['use_page_numbers'] = TRUE;

    $this->pagination->initialize($config);

    echo $this->pagination->create_links();

    if($this->uri->segment(3)){
      $page = ($this->uri->segment(3)) ;
    }
    else{
      $page = 1;
    }

    $data['mahasiswa'] = $this->db->limit(2,$page)->get('mahasiswa')->result();

    $this->load->view('list', $data);

  }

  public function tambah()
  {
    $this->load->view('add');
  }

  public function postTambah()
  {
    $data['nim'] = $this->input->post('nim');
    $data['nama'] = $this->input->post('nama');
    $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
    $data['prodi'] = $this->input->post('prodi');
    $data['fakultas'] = $this->input->post('fakultas');

    $this->db->insert('mahasiswa', $data);
    redirect(base_url('Home/list'));
  }

  public function edit($id)
  {
    $data['mahasiswa'] = $this->db->where('id',$id)->get('mahasiswa')->row();
    $this->load->view('edit',$data);
  }

  public function postEdit()
  {
    $id = $this->input->post('id');
    $data['nim'] = $this->input->post('nim');
    $data['nama'] = $this->input->post('nama');
    $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
    $data['prodi'] = $this->input->post('prodi');
    $data['fakultas'] = $this->input->post('fakultas');

    $this->db->where('id',$id)->update('mahasiswa', $data);
    redirect(base_url('Home/list'));
  }

  public function hapus($id)
  {
    $this->db->where('id',$id)->delete('mahasiswa');
    redirect(base_url('Home/list'));
  }

  public function cari(){
    $cari = $this->input->post('cari');

    $query = $this->db->like('nim',$cari)->or_like('nama',$cari)->or_like('prodi',$cari)->or_like('jenis_kelamin',$cari)->or_like('fakultas',$cari)->get('mahasiswa')->result();


    $data['mahasiswa'] = ($query)?$query:'Tidak ada data';

    $this->load->view('list', $data);

  }
}
