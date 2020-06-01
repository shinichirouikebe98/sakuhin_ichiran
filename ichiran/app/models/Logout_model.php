<?php
class Logout_model{
	private $feedback = 'succes';
	private $fail = 'failed';
	
	public function logout(){
		if(session_unset() && session_destroy()){
			return $this->feedback;
		}
		else{
			return $this->fail;
		}
	
	
	}
	
}


?>