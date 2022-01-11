<?php 
 class Guru_model{

 	protected $db;
 	function __construct($db)
	 {
 		$this->db = $db;
 	}

 	function tampil_data()
 	{
 		$row = $this->db->prepare("SELECT * FROM tbl_guru");
 		$row->execute();
 		return $hasil = $row->fetchAll();
 	}
	 function getData($id){
		 $row = $this->db->prepare("SELECT * FROM tbl_guru where id = $id");
		 $row->execute();
		 return $hasil = $row->fetch();
	 }

	 function getJenisData()
	 {
		$row = $this->db->prepare("SELECT * FROM tbl_golongan");
		$row->execute();
		return $hasil = $row->fetchAll();

	 }

	 function simpanGolongan($data)
	 {
	 	//buat array untuk isi values insert sumber kode 
	 	//http://thisinterestsme.com/pdo-prepared-multi-inserts/
		$rowsSQL = array();
		//buat bind param prepared statement
		$toBind = array();
		//list nama kolom
		$columnNames = array_keys($data[0]);
		//looping untuk mengambil isi dari kolom /values
		foreach ($data as $arrayIndex => $row) {
			$param = array();
		
			foreach ($row as $columnName => $columnValue) {
				$param = ":". $columnName . $arrayIndex;
				$params[] = $param;
				$toBind[$param] = $columnValue;
				}
			$rowsSQL[] = "(". implode(", ", $params) . ")";
		}
		$sql = "INSERT INTO tbl_golongan (" . implode(", ", $columnNames) . ") VALUES " .implode(", ",$rowsSQL);
		$row = $this->db->prepare($sql);
		//Bind our values
		foreach($toBind as $param =>$val){
			$row->bindValue($param,$val);
		}
		return $row->execute();

	 }

	 function simpanData($data)
	 {
	 	//buat array untuk isi values insert sumber kode 
	 	//http://thisinterestsme.com/pdo-prepared-multi-inserts/
		$rowsSQL = array();
		//buat bind param prepared statement
		$toBind = array();
		//list nama kolom
		$columnNames = array_keys($data[0]);
		//looping untuk mengambil isi dari kolom /values
		foreach ($data as $arrayIndex => $row) {
			$param = array();
		
			foreach ($row as $columnName => $columnValue) {
				$param = ":". $columnName . $arrayIndex;
				$params[] = $param;
				$toBind[$param] = $columnValue;
				}
			$rowsSQL[] = "(". implode(", ", $params) . ")";
		}
		$sql = "INSERT INTO tbl_guru (" . implode(", ", $columnNames) . ") VALUES " .implode(", ",$rowsSQL);
		$row = $this->db->prepare($sql);
		//Bind our values
		foreach($toBind as $param =>$val){
			$row->bindValue($param,$val);
		}
		return $row->execute();

	 }

	 function updateData($data,$id)
	 {
	 	$setPart = array();
	 	foreach ($data as $key => $value)
	 	{
	 		$setPart[] = $key."=:".$key;
	 	}
	 	$sql = "UPDATE tbl_guru SET ".implode(',', $setPart)." WHERE id = :id";
	 	$row = $this->db->prepare($sql);
	 	//bind our values
	 	$row ->bindValue(':id',$id);//where
	 	foreach($data as $param => $val){
	 		$row->bindValue($param, $val);
	 	}
	 return $row->execute();
	}

	function hapusData($id)
	{
		$sql = "DELETE FROM tbl_guru WHERE id = ?";
		$row = $this->db->prepare($sql);
		return $row ->execute(array($id));
	}

 }

?>