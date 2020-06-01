<?php
class Logout extends Controller{
	private $check = 'succes';

		public function signout(){
			$feedback = $this->model('Logout_model')->logout();
			if ($feedback == $this->check) {
				header('Location: '. BASEURL .'/');
				exit;
			}
			else{
				header('Location: '. BASEURL .'/user');
			}
		} 

}

?>