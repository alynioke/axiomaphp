<?php 


class View {
	function __construct() {
	}

	public function render($name) {
		require_once "views/header.php";
		require_once "views/".$name.".php";
		require_once "views/footer.php";
	}

}

?>