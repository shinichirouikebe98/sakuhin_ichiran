<?php
Class User_model{
	private $table = 'user';
	private $table_sakuhin = 'upload';
	private $db;
	private $normal = 'normal_user';
	private $super = 'super_user';
	private $fail = 'failed';


	public function __construct()
	{
		$this->db = new Database;

	}

	function selectPictFileNameById($id){
			 	$select='SELECT file_name FROM '.$this->table_sakuhin.' where seishakusha = :username';
			 	$this->db->query($select);
				$this->db->bind('username',htmlspecialchars($id));
				return $this->db->resultSet();
	}
	function deleteAllSakuhinDataById($id){
			 	$query=' DELETE FROM '.$this->table_sakuhin.' WHERE seishakusha = :username';
			 	$this->db->query($query);
				$this->db->bind('username',htmlspecialchars($id));
				$this->db->execute();

				return true;
	}


	public function loadUserData($id){
		$query='SELECT * FROM '.$this->table.' where username = :username ';
		$this->db->query($query);
		$this->db->bind('username',htmlspecialchars($id));
		return $this->db->single();
		
	}

	public function loadAllUserData(){
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
		
	}
	public function editUserData($data){
		$query='update '.$this->table.' set email = :email where username = :username ';
		$this->db->query($query);
		$this->db->bind('username',$data['username']);
		$this->db->bind('email',$data['email']);
		$this->db->execute();
		return $this->db->rowCount();
		
	}
	public function editPassword($data){
		if($data['old_pwd']==$data['old_pwd_conf'])
		{
			if($data['new_pwd']==$data['new_pwd_conf']){
				$query='update '.$this->table.' set password = :new_pwd where username = :username ';
				$this->db->query($query);
				$this->db->bind('username',$data['username']);
				$this->db->bind('new_pwd',$data['new_pwd']);
				$this->db->execute();
				return $this->db->rowCount();
			}
			
		}
		else{

			return false;
		}

	}
	public function deleteDataUser($id){
		//ファイルをまず削除すること
		if($picture_datas=$this->selectPictFileNameById($id)>0){
			for($i=0;$i<count($picture_datas);$i++){
			$file="/opt/lampp/htdocs/ichiran/public/img/".$picture_datas[$i];
			unlink($file);
			}
			//作品データの削除を確認してユーザを削除する
			if($this->deleteAllSakuhinDataById($id)){

				$query=' DELETE FROM ' .$this->table . ' WHERE username = :username';
				$this->db->query($query);
				$this->db->bind('username',htmlspecialchars($id));
				$this->db->execute();
				return $this->db->rowCount();
			}
			else{
				return false;
				
			}
		}
		elseif($picture_datas=$this->selectPictFileNameById($id)<0){
			$query=' DELETE FROM ' .$this->table . ' WHERE username = :username';
			$this->db->query($query);
			$this->db->bind('username',htmlspecialchars($id));
			$this->db->execute();
			return $this->db->rowCount();
		}
		else{
			return false;
		}

		
		

	}
	public function addDataUser($data)
	{
		
		$query='INSERT INTO '.$this->table.'(username,email,level,password) values(:username,:email,:level,:password)';
		$this->db->query($query);
		$this->db->bind('username', htmlspecialchars($data['username'])); 
		$this->db->bind('password', htmlspecialchars($data['password'])); 
		$this->db->bind('email', htmlspecialchars($data['email']));

		$this->db->bind('level', $this->normal);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function addDataUserDashboard($data)
	{
		
		$query='INSERT INTO '.$this->table.'(username,email,level,password) values(:username,:email,:level,:password)';
		$this->db->query($query);
		//bind data
		$this->db->bind('username', htmlspecialchars($data['username'])); //hubungkan dengan name dari input
		$this->db->bind('password', htmlspecialchars($data['password'])); //hubungkan dengan name dari input
		$this->db->bind('email', htmlspecialchars($data['email']));
		$this->db->bind('level', htmlspecialchars($data['level']));

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function searchUser()
	{
		$keyword = htmlspecialchars($_POST['search']);
		$query = "SELECT * FROM ". $this->table ." where  username LIKE :keyword or level LIKE :keyword or email LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword',"%$keyword%");

		return $this->db->resultSet();


	}


	public function login_check($check)
	{
		$query='SELECT level FROM '.$this->table.' where username =:username and password = :password';
		$this->db->query($query);
		$this->db->bind('username', $check['username']);
		$this->db->bind('password', $check['password']);

		$data_l['levels']=$this->db->single();

		//array to string
		if(empty($data_l['levels'])){
			return $this->fail;
		}
		else{
			$str_l=implode("@", $data_l['levels']);
			$pieces=explode("@", $str_l);
		}
		
		if($this->db->rowCount()>0){
			$session=$check['username'];
			if($pieces[0] === $this->normal){
				$_SESSION['username']=$session;
				return $this->normal;
			}
			else if($pieces[0] === $this->super){
				$_SESSION['super']=$session;
				return $this->super;
			}
			else{
				return $this->fail;
			}
		}
		else{
			return $this->fail;
		}
		

	}

}
?>