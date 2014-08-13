<?php 
class Workers extends Controller{
	function __construct() {
		parent::__construct();
		require_once "models/workersModel.php";
		require_once "models/positionsModel.php";
		$this->model = new WorkersModel();
		$this->pModel = new PositionsModel();
	}

	public function all() {
		$this->view->workers = $this->model->getAll();
		$this->view->render("workers/all");
	}

	public function add() {
		$this->view->worker = null;
		$this->view->type = "add";
		$this->view->positions = $this->pModel->getAll();
		$this->view->render("workers/add");
	}
	public function create($params) {
		if ($this->set($params['name']) && $this->set($params['lastname']) && $this->set($params['position_id']) && is_numeric($params['position_id']))
			$this->model->insert($params);
	}

	public function edit($id) {
		if (is_numeric($id)) {
			$this->view->type = "edit";
			$this->view->positions = $this->pModel->getAll();
			$this->view->worker = $this->model->get($id);
		}
		$this->view->render("workers/add");
	}
	
	public function update($params) {
		if ($this->set($params['name']) && $this->set($params['lastname']) && $this->set($params['position_id']) && is_numeric($params['position_id']))
			$this->model->update($params);
	}

	public function delete($id) {
		if (is_numeric($id))
			$this->model->delete($id);
	}

	public function set($value) {
		if ($value != "" && $value != " " && $value != null) return true;
		return false;
	}
}
?>