<?php
class Barang_model extends CI_Model {
	public $kode;
	public $nama;
	public $harga;
	public $stok;
	public $rows;
	public $row;
	
	public $labels = [];
	
	public function __construct(){
		parent::__construct();
		$this->labels = $this->_attributeLabels();
		
		//panggil lib database
		$this->load->database();
	}
	
	public function get_row($kode){
		$sql = sprintf("SELECT * FROM barang WHERE kode='%s'", $kode);
		
		$query = $this->db->query($sql);
		$this->row = $query->row();		
	}
	
	public function get_rows(){
		$sql = "SELECT * FROM barang ORDER BY kode";
		
		$query = $this->db->query($sql);
		$rows = array();
		foreach($query->result() as $row){
			$rows[] = $row;
		}
		
		$this->rows = $rows;
	}
	
	public function insert(){
		$sql = sprintf("INSERT INTO barang VALUES('%s', '%s', '%f', '%d')", 
				$this->kode,
				$this->nama,
				$this->harga,
				$this->stok
				);
		
		$this->db->query($sql);
	}
	
	public function update(){
		$sql = sprintf("UPDATE barang SET nama='%s', harga='%f', stok='%d' WHERE kode='%s' ", 				
				$this->nama,
				$this->harga,
				$this->stok,
				$this->kode
				);
		#echo $sql; exit;
		
		$this->db->query($sql);
	}
	
	public function delete($kode){
		$sql = sprintf("DELETE FROM barang WHERE kode='%s'", $kode);		
		$this->db->query($sql);
	}
	
	public function _attributeLabels(){
		return [
			'kode' => 'Kode: ',
			'nama' => 'Nama Produk: ',
			'harga' => 'Harga Produk: ',
			'stok' => 'Stok: '
		 ];
	}
}