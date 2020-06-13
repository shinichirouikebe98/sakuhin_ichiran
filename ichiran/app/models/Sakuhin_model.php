<?php
class Sakuhin_model
{
	private $table = 'upload';
	private $db;

	public function __construct()
	{
		$this->db = new Database;

	}

		function check_data(){
				$name = $_FILES['files']['name'];
				$size = $_FILES['files']['size'];
				$error = $_FILES['files']['error'];
				$tmpName = $_FILES['files']['tmp_name'];
				//check
				if($error === 4){
								echo"<script> alert('ファイルを選んでください！');</script>";
					return false;
				}
				//check ekstensi
				$validExtention = ['jpg','jpeg','png','gif'];
				$extention = explode(".", $name);
				$extention = strtolower(end($extention));
				if(!in_array($extention, $validExtention)){
					echo"<script> alert('ファイルタイプが違います。jpg,png,gifのみ。');</script>";
					
					return false;
				}
				//size
				if($size > 12000000){
					echo"<script> alert('サイズが大きすぎます制限が８メガバイトです。');</script>";
					return false;
				}

				$newFileName = uniqid();
				$newFileName .= '.';
				$newFileName .= $extention;


				move_uploaded_file($tmpName, "opt/lampp/htdocs/ichiran/public/img/".$newFileName);

				return $newFileName;
		}

	public function addDataSakuhin($data)
	{

		$picture = $this->check_data();
		if(!$picture){
			return false;
		}

		$query='INSERT INTO ' .$this->table. '(username,sakuhinmei,concept,file_name,genre) values(:seisakusha,:sakuhinmei,:concept,:filename,:genre)';
		$this->db->query($query);
		//bind data
		$this->db->bind('seisakusha', htmlspecialchars($data['seishakushaText'])); //hubungkan dengan name dari input
		$this->db->bind('sakuhinmei', htmlspecialchars($data['sakuhinmei'])); //hubungkan dengan name dari input
		$this->db->bind('concept', htmlspecialchars($data['conceptText']));
		$this->db->bind('filename', htmlspecialchars($picture));
		$this->db->bind('genre', htmlspecialchars($data['genre']));
		$this->db->execute();

		return $this->db->rowCount();

	}

	
	public function getDataSakuhin($seishakusha)
	{
		$this->db->query('SELECT * FROM ' . $this->table .' where username = :seishakusha'); 
		$this->db->bind('seishakusha', htmlspecialchars($seishakusha));
		return $this->db->resultSet();
	}

	public function deleteSakuhinById($id_delete,$file_delete)
	{
		$file="/opt/lampp/htdocs/ichiran/public/img/".$file_delete;
		if(unlink($file)){
			$query=' DELETE FROM ' .$this->table . ' WHERE code = :id_delete';
			$this->db->query($query);
			$this->db->bind('id_delete',$id_delete);
			$this->db->execute();
			return $this->db->rowCount();
		}
		else{
			return false;
		}
	}

	public function getSakuhinById($id)
	{
		$this->db->query('SELECT * FROM ' .$this->table. ' WHERE code=:id');
		$this->db->bind('id',htmlspecialchars($id));
		return $this->db->single();
	}



	public function updateSakuhinData($data)
	{
		

		if($_FILES['files']['error']==4){
			$picture=htmlspecialchars($data['old_name']);
		}
		else{
			$picture = $this->check_data();
			if(!$picture){
			return false;
			}
		}
		$query="UPDATE " .$this->table. " set  username= :seisakusha,sakuhinmei= :sakuhinmei,concept= :concept,file_name= :filename,genre= :genre where code =:code";
		$this->db->query($query);
		//bind data
		$this->db->bind('code',$data['code']);
		$this->db->bind('seisakusha', htmlspecialchars($data['seishakushaText'])); //hubungkan dengan name dari input
		$this->db->bind('sakuhinmei', htmlspecialchars($data['sakuhinmei'])); //hubungkan dengan name dari input
		$this->db->bind('concept', htmlspecialchars($data['conceptText']));
		$this->db->bind('filename', htmlspecialchars($picture));
		$this->db->bind('genre', htmlspecialchars($data['genre']));

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function searchSakuhinIndex()
	{
		$keyword = htmlspecialchars($_POST['search']);
		$genre = htmlspecialchars($_POST['genre']);
		if(empty($keyword) && !empty($genre)){
			if (empty($keyword) && $genre == '全部') {
			$query = "SELECT * FROM ". $this->table ;
			$this->db->query($query);
			return $this->db->resultSet();
			}

			$query = "SELECT * FROM ". $this->table ." where genre LIKE :genre ";
			$this->db->query($query);
			$this->db->bind('genre',"%$genre%");
			return $this->db->resultSet();
		}
		else{
			$query = "SELECT * FROM ". $this->table ." where  genre LIKE :keyword or sakuhinmei LIKE :keyword or username LIKE :keyword";
			$this->db->query($query);
			$this->db->bind('keyword',"%$keyword%");
			return $this->db->resultSet();
		}

	}

	public function searchSakuhin()
	{
		$keyword = htmlspecialchars($_POST['search']);
		$query = "SELECT * FROM ". $this->table ." where  genre LIKE :keyword or sakuhinmei LIKE :keyword or username LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword',"%$keyword%");

		return $this->db->resultSet();


	}
	//admin
	public function getAllDataSakuhin()
	{
		$this->db->query('SELECT * FROM ' . $this->table); //ingat space setelah from
		return $this->db->resultSet();
	}


	

}