<?php
Class User extends Controller{
	public function index(){
		$data['title']="ユーザ";
		$data['link']="user";
		$this->view('templates/dashboard_header',$data);
		$this->view('user/index');
		$this->view('templates/footer');
	}
	public function userDetail($id){
		$data['title']="ユーザ情報";
		$data['link']="user";
		$data['user']=$this->model('User_model')->loadUserData($id);
		$this->view('templates/dashboard_header',$data);
		$this->view('user/user_details',$data);
		$this->view('templates/footer');
	}
	public function editData(){
		if($this->model('User_model')->editUserData($_POST)>0)
		{
			Notification::setNotif('ユーザ','成功','編集','succes');
			header('Location: '. BASEURL .'/user/userDetail/'.$id.'');
			exit;
		}
		else{
			Notification::setNotif('ユーザ','失敗','編集','danger');
			header('Location: '. BASEURL .'/user/userDetail/'.$id.'');
			exit;
		}
	}
	public function deleteAccount($id_delete){
		$check='succes';
		if($this->model('User_model')->deleteDataUser($id_delete)>0)
		{
			$feedback = $this->model('Logout_model')->logout();
			if ($feedback == $check) {
				header('Location: '. BASEURL .'/');
				exit;
			}
			else{
				header('Location: '. BASEURL .'user/userDetail/'.$id_delete.'');
			}
		}
		else{
			Notification::setNotif('ユーザ','失敗','削除','danger');
			header('Location: '. BASEURL .'/user/userDetail/'.$id_delete.'');
			exit;
		}
	}
	public function loadOldPwd(){
		echo json_encode($this->model('User_model')->loadUserData($_POST['id']));
	}
	public function editPwd($id){
		if($this->model('User_model')->editPassword($_POST)>0)
		{
			Notification::setNotif('パスワード','成功','編集','success');
			header('Location: '. BASEURL .'/user/userDetail/'.$id.'');
			exit;
		}
		else{
			Notification::setNotif('パスワード','失敗','編集','danger');
			header('Location: '. BASEURL .'/user/userDetail/'.$id.'');
			exit;
		}
	}
}
?>