<?php 

class Bootstrap {
	function __construct() {

		if(!isset($_GET['url']) || $_GET['url'] == '') {
			$controllerName = "workers";
		} else {
			$url = $_GET['url'];
			$url = rtrim($url, '/');
			$url = explode('/', $url);
			$controllerName = $url[0];
		}
				
		require_once "controllers/errors.php";
		$file = "controllers/".$controllerName.".php";
		if (file_exists($file)) {
			require_once $file;
		} else {
			$error = new Errors();
			return false;
		}
		$controller = new $controllerName;

		if (isset($url[2]) && $url[2] != NULL) {
			$controller->{$url[1]}($url[2]); //edit
		} else {
			$params = $this->parseParams();
			if (isset($url[1]) && $url[1] != NULL) {
				if (!method_exists($controller,$url[1])) {
					$error = new Errors();
					return false;
				} else {
					if ($params)
						$controller->{$url[1]}($params); //
					else 
						$controller->{$url[1]}();
				}
			} else {
				$controller->all();
			}
			
		}
	}

	private function parseParams() {
		$params = array();
		foreach($_GET as $key => $val) {
			if ($key != 'url')
				$params[$key] = $val;
		}
		if (empty($params)) return null;
		return $params;

	}
}

?>