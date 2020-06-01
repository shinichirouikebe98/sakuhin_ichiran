<?php

/**
 * 
 */
class App
{	
	//default
	protected $controller = 'Home';
	protected $method ='index';
	protected $params = [];

	public function __construct()
	{	
		$url = $this->parseURL();
		
		//controller
		if(file_exists('../app/controllers/' . $url[0] . '.php'))//mengecheck file yang di ketik di url
		{
			$this->controller = $url[0];
			unset($url[0]);
		}

		require_once '../app/controllers/'. $this->controller.'.php';
		$this->controller = new $this->controller;
		
		//method
		if(isset($url[1]))
		{
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		//parameter
		if(!empty($url))
		{
			$this->params = array_values($url);		
		}

		//menjalankan controller & method, serta jirimkan parameter juka ada 

		call_user_func_array([$this->controller,$this->method],$this->params);


	}

	public function parseURL()
	{

		if(isset($_GET['url']))
		{
			$url = rtrim($_GET['url'],'/');// menghilangkan slash pada akhir agar tidak mengganggu
			$url = filter_var($url,FILTER_SANITIZE_URL); //memfilter url
			$url = explode('/',$url);//memecah url di setiap /
			return $url;
		}


	}



}