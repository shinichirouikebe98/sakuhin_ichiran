<?php

class Home extends Controller{
	private $normal = 'normal_user';
	private $super = 'super_user';
	private $fail = 'failed';

	public function index()
	{	
		$data['title'] = 'Home';
		$data['sakuhin_data']=$this->model('Sakuhin_model')->getAllDataSakuhin();
		$this->view('templates/home_header',$data);
		$this->view('home/index',$data);
		$this->view('templates/footer');
	}
	public function search(){
		$data['title'] = 'Home';
		$data['sakuhin_data']=$this->model('Sakuhin_model')->searchSakuhinIndex($_POST);
		$this->view('templates/home_header',$data);
		$this->view('home/index',$data);
		$this->view('templates/footer');
		
	}
	public function details($id)
	{
		$data['title'] = '詳細情報';
		$data['detail_sakuhin']=$this->model('Sakuhin_model')->getSakuhinById($id);
		$this->view('templates/home_header',$data);
		$this->view('home/sakuhin_details',$data);
		$this->view('templates/footer');
	}
	//ユーザ登録のページ
	public function register()
	{	
		$data['title'] = 'Register';
		$this->view('templates/home_header',$data);
		$this->view('home/register',$data);
		$this->view('templates/footer');
	}
	//ログインする
	public function signin()
	{	
		$data['title'] = 'Login';
		$this->view('templates/home_header',$data);
		$this->view('home/signin',$data);
		$this->view('templates/footer');
	}

	public function check(){
		$result=$this->model('User_model')->login_check($_POST);
		echo $result;
		if($result==$this->normal){
			header('Location: '. BASEURL .'/user');
			exit;
		}
		else if($result==$this->super){
			header('Location: '. BASEURL .'/dashboard');
			exit;
		}
		if($result==$this->fail){
			header('Location: '. BASEURL .'/home/signin');
			exit;
		}

		else{
			echo"<script>
				alert('ログイン失敗です。パスワードやユーザネームをもう一度確認してください！');
				location.href('".BASEURL."/home/signin.php'); 
				</script>";
		}
	}
	//ユーザ登録
	public function addData(){
		if($this->model('User_model')->addDataUser($_POST)>0)
		{
			header('Location: '. BASEURL .'/');
			exit;
		}
		else{
			Notification::setNotif('ユーザ','完了','追加','danger');
			header('Location: '. BASEURL .'/home/register');
			exit;
		}
		
	}
	public function loadDataPicture(){
		echo json_encode($this->model('Sakuhin_model')->getAllDataSakuhin());
	}



}