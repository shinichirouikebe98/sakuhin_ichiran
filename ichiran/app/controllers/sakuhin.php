<?php
class Sakuhin extends Controller{
	public function index($user)
	{
		$data['title'] = '作品アップ';
		$data['link']="user";
		$data['sakuhin_data']=$this->model('Sakuhin_model')->getDataSakuhin($user);
		$this->view('templates/dashboard_header',$data);
		$this->view('upload/index',$data);
		$this->view('templates/footer');
	}
	public function details($id)
	{
		$data['title'] = '詳細情報';
		$data['link']="user";
		$data['detail_sakuhin']=$this->model('Sakuhin_model')->getSakuhinById($id);
		$this->view('templates/dashboard_header',$data);
		$this->view('upload/details',$data);
		$this->view('templates/footer');
	}
	//追加
	public function addData($username)
	{
		if($this->model('Sakuhin_model')->addDataSakuhin($_POST)>0)
		{	
			Notification::setNotif('作品','成功','追加','success');
			header('Location: '. BASEURL .'/sakuhin/index/'.$username.'');
			exit;
		}
		else{
			Notification::setNotif('作品','失敗','追加','danger');
			header('Location: '. BASEURL .'/sakuhin/index/'.$username.'');
			exit;
		}

	}
	//delete
	public function deleteData($id_delete,$file_delete,$username)
	{	
		if($this->model('Sakuhin_model')->deleteSakuhinById($id_delete,$file_delete)>0)
		{	
			Notification::setNotif('作品','成功','削除','success');
			header('Location: '. BASEURL .'/sakuhin/index/'.$username.'');
			exit;
		}
		else{
			Notification::setNotif('作品','失敗','削除','danger');
			header('Location: '. BASEURL .'/sakuhin/index/'.$username.'');
			exit;
		}
	}
	//memerintah model untuk mengambil data yang akan di update
	public function getUpdate()
    {
    	echo json_encode($this->model('Sakuhin_model')->getSakuhinById($_POST['id']));

    }
    //memerintah model untuk mengupdate data
    public function updateData($username)
    {
    	if($this->model('Sakuhin_model')->updateSakuhinData($_POST)>0)
		{	
			Notification::setNotif('作品','成功','編集','success');
			header('Location: '. BASEURL .'/sakuhin/index/'.$username.'');
			exit;
		}
		else{
			Notification::setNotif('作品','成功','編集','danger');
			header('Location: '. BASEURL .'/sakuhin/index/'.$username.'');
			exit;
		}

    }	   

    public function search()
	{
		$data['title'] = 'データ検索';
		$data['link']="user";
		$data['sakuhin_data'] = $this->model('Sakuhin_model')->searchSakuhin();
		$this->view('templates/dashboard_header',$data);
		$this->view('upload/index',$data);
		$this->view('templates/footer');
			
	}

}