<?php
class Tabel extends CI_Controller {
	public $model = null;
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('is_login')){
			redirect('login');
		}
		
		$this->load->model('Barang_model');
		$this->model = $this->Barang_model;
	}
	
	public function index(){	
		$this->model->get_rows();		
		
		$data = array('model' => $this->model);
		$this->load->view('tabel_view', $data);
			
		#$this->load->view('tabel_view');
	}
	
	public function tambah(){
		if(isset($_POST['btnSubmit'])){
			#var_dump($_POST); exit;
			$this->model->kode = $_POST['kode'];
			$this->model->nama = $_POST['nama'];
			$this->model->harga = $_POST['harga'];
			$this->model->stok = $_POST['stok'];
			
			$this->model->insert();
			
			$this->model->get_rows();
			$this->load->view('tabel_view', ['model' => $this->model]);
		}else{
			$this->load->view('barang_form', ['model' => $this->model]);
		}
	}
	
	public function edit(){
		$kode = $this->uri->segment(3);
		$this->model->get_row($kode);
	
		$this->load->view('barang_form', ['model' => $this->model]);
	}
	
	public function ubah(){
		if(isset($_POST['btnSubmit'])){
			#var_dump($_POST); exit;
			$this->model->kode = $this->input->post('h_kode');
			
			$this->model->nama = $this->input->post('nama'); 
			$this->model->harga = $this->input->post('harga'); 
			$this->model->stok = $this->input->post('stok'); 
			
			$this->model->update();
		}
		redirect('tabel');
	}
	
	public function hapus(){
		$kode = $this->uri->segment(3);
		$this->model->delete($kode);
		redirect('tabel');
	}
	
}
?>