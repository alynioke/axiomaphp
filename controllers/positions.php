<?php 
class Positions extends Controller{
	function __construct() {
		parent::__construct();
		require_once "models/positionsModel.php";
		$this->model = new PositionsModel();
	}

	public function all() {
		$this->view->positions = $this->model->getAll();
		$this->view->render("positions/all");
	}

	public function add() {
		$this->view->position = null;
		$this->view->type = "add";
		$this->view->render("positions/add");
	}
	public function create($params) {
		if ($this->set($params['title']))
			$this->model->insert($params);
	}

	public function edit($id) {
		if (is_numeric($id)) {
			$this->view->type = "edit";
			$this->view->position = $this->model->get($id);
		}
		$this->view->render("positions/add");
	}
	public function update($params) {
		if ($this->set($params['title']))
			$this->model->update($params);
	}

	public function delete($id) {
		if (is_numeric($id)) {
			$this->model->delete($id);
			$this->view->positions = $this->model->getAll();
		}
	}

	public function set($value) {
		if ($value != "" && $value != " " && $value != null) return true;
		return false;
	}

}

?>