<?php
class User_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		
		//panggil lib database
		$this->load->database();
	}
	
	public function cek_user($txt_user, $txt_pswd){
		$txt_pswd = md5($txt_pswd);		
		$sql = sprintf("SELECT * FROM tbl_user WHERE username='%s' AND pswd='%s' LIMIT 1 ", $txt_user, $txt_pswd);
		
		$query = $this->db->query($sql);
		return $query->row();		
	}
	
	public function get_rows(){
		$sql = "SELECT * FROM tugas ORDER BY video_id";
		
		$query = $this->db->query($sql);
		$rows = array();
		foreach($query->result() as $row){
			$rows[] = $row;
		}
		
		$this->rows = $rows;
	}
	
	public function insert(){
		$sql = sprintf("INSERT INTO tugas (video_id, judul, channel) VALUES('%s', '%s', '%s')", 
				$this->video_id,
				$this->judul,
				$this->channel
				);
		
		$this->db->query($sql);
	}
	
	public function update(){
		$sql = sprintf("UPDATE tugas SET judul='%s', channel='%s' WHERE video_id='%s' ", 				
				$this->judul,
				$this->channel,
				$this->video_id
				);
		#echo $sql; exit;
		
		$this->db->query($sql);
	}
	
	public function delete($video_id){
		$sql = sprintf("DELETE FROM tugas WHERE video_id='%s'", $video_id);		
		$this->db->query($sql);
	}
	
	public function _attributeLabels(){
		return [
			'video_id' => 'ID Video : ',
			'judul' => 'Keterangan Judul : ',
			'channel' => 'Youtube Channel : '
		 ];
	}
}