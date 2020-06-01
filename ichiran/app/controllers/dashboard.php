<?php 
Class Dashboard extends Controller{
	public function index(){
		$data['title']="ダッシュボード";
		$data['link']="dashboard";
		$this->view('templates/dashboard_header',$data);
		$this->view('dashboard/index');
		$this->view('templates/footer');
	}

	//USER CONTROL↓↓↓↓↓↓↓↓
	//これからしたユーザのコントローラ
	public function user_control(){
		$data['title']="ユーザ情報";
		$data['link']="dashboard";
		$data['user_data']=$this->model('User_model')->loadAllUserData();
		$this->view('templates/dashboard_header',$data);
		$this->view('dashboard/user_control',$data);
		$this->view('templates/footer');
	}
	//削除
	public function deleteUserDashboard($id_delete){
		if($this->model('User_model')->deleteDataUser($id_delete)>0)
		{	
			Notification::setNotif('作品','成功','削除','success');
			header('Location: '. BASEURL .'/dashboard/user_control/');
			exit;
		}
		else{
			Notification::setNotif('作品','失敗','削除','danger');
			header('Location: '. BASEURL .'/dashboard/user_control/');
			exit;
		}
	}
	//Updateデータのロード
	public function getUpdateUserDashboard()
    {
    	echo json_encode($this->model('User_model')->loadUserData($_POST['id']));

    }
	//編集
	public function updateDataUsersDashboard(){
		if($this->model('User_model')->editUserData($_POST)>0)
		{
			Notification::setNotif('ユーザ','成功','編集','succes');
			header('Location: '. BASEURL .'/dashboard/user_control');
			exit;
		}
		else{
			Notification::setNotif('ユーザ','失敗','編集','danger');
			header('Location: '. BASEURL .'/dashboard/user_control');
			exit;
		}
	}
	//データ詳細ロード
	public function userDetailDashboard($id){
		$data['title']="ユーザ情報";
		$data['link']="dashboard";
		$data['user']=$this->model('User_model')->loadUserData($id);
		$this->view('templates/dashboard_header',$data);
		$this->view('dashboard/detail_user',$data);
		$this->view('templates/footer');
	}
	//データ追加
	public function addDataUsersDashboard(){
		if($this->model('User_model')->addDataUserDashboard($_POST)>0)
		{
			Notification::setNotif('ユーザ','成功','追加','success');
			header('Location: '. BASEURL .'/dashboard/user_control');
			exit;
		}
		else{
			Notification::setNotif('ユーザ','失敗','追加','danger');
			header('Location: '. BASEURL .'/dashboard/user_control');
			exit;
		}
		
	}

	public function searchUserDashboard()
	{
		$data['title'] = 'データ検索';
		$data['link']="dashboard";
		$data['user_data'] = $this->model('User_model')->searchUser();
		$this->view('templates/header',$data);
		$this->view('dashboard/user_control',$data);
		$this->view('templates/footer');
			
	}

	//SAKUHIN↓↓↓↓↓↓↓↓
	//これからした作品のコントローラ

	public function sakuhin_control(){
		$data['title']="ユーザ情報";
		$data['link']="dashboard";
		$data['sakuhin_data']=$this->model('Sakuhin_model')->getAllDataSakuhin();
		$this->view('templates/dashboard_header',$data);
		$this->view('dashboard/sakuhin_control',$data);
		$this->view('templates/footer');
	}

	public function addDataSakuhinDashboard()
	{
		if($this->model('Sakuhin_model')->addDataSakuhin($_POST)>0)
		{	
			Notification::setNotif('作品','成功','追加','success');
			header('Location: '. BASEURL .'/dashboard/sakuhin_control/');
			exit;
		}
		else{
			Notification::setNotif('作品','失敗','追加','danger');
			header('Location: '. BASEURL .'/dashboard/sakuhin_control/');
			exit;
		}

	}

	public function updateDataSakuhinDashboard()
    {
    	if($this->model('Sakuhin_model')->updateSakuhinData($_POST)>0)
		{	
			Notification::setNotif('作品','成功','編集','success');
			header('Location: '. BASEURL .'/dashboard/sakuhin_control/');
			exit;
		}
		else{
			Notification::setNotif('作品','失敗','編集','danger');
			header('Location: '. BASEURL .'/dashboard/sakuhin_control/');
			exit;
		}

    }	

	public function getUpdateDashboard()
    {
    	echo json_encode($this->model('Sakuhin_model')->getSakuhinById($_POST['id']));

    }

    public function deleteDataSakuhinDasboard($id_delete,$file_delete)
	{	
		if($this->model('Sakuhin_model')->deleteSakuhinById($id_delete,$file_delete)>0)
		{	
			Notification::setNotif('作品','成功','削除','success');
			header('Location: '. BASEURL .'/dashboard/sakuhin_control/');
			exit;
		}
		else{
			Notification::setNotif('作品','失敗','削除','danger');
			header('Location: '. BASEURL .'/dashboard/sakuhin_control/');
			exit;
		}
	}

	public function searchSakuhinDashboard()
	{
		$data['title'] = 'データ検索';
		$data['link']="dashboard";
		$data['sakuhin_data'] = $this->model('Sakuhin_model')->searchSakuhin();
		$this->view('templates/header',$data);
		$this->view('dashboard/sakuhin_control',$data);
		$this->view('templates/footer');
			
	}

	public function detailsSakuhinDashboard($id)
	{
		$data['title'] = '詳細情報';
		$data['link']="dashboard";
		$data['detail_sakuhin']=$this->model('Sakuhin_model')->getDetailSakuhin($id);
		$this->view('templates/header',$data);
		$this->view('dashboard/detail_sakuhin',$data);
		$this->view('templates/footer');
	}
	


}
?>