<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

class Agenda_Model extends ZP_Model {
	
	public function __construct() {
		$this->Db = $this->db();
		
		$this->helpers();
	
		$this->table = "contacts";

		$this->Data = $this->core("Data");
	}

	public function add() {
		$validations = array(
			"name" => "required",
			"email" => "email?",
			"phone" => "required",
		);

		$this->Data->ignore("add");
		$data = $this->Data->proccess(NULL, $validations);

		if (isset($data["error"])) {
			return $data["error"];
		}

		$this->Db->insert($this->table, $data);
		return getAlert("Contact has been inserted correctly", "success");
	}

	public function getContact($id) {
		$data = $this->Db->find($id, $this->table);

		return $data;
	}
	
	public function getContacts() {
		$data = $this->Db->findAll($this->table);

		return $data;
	}
}