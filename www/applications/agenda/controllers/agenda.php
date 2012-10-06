<?php
/**
 * Access from index.php:
 */


class Agenda_Controller extends ZP_Controller {
	
	public function __construct() {
    $this->app("agenda");
		
		$this->Templates = $this->core("Templates");

		$this->Templates->theme();

		$this->CSS("contacts", "agenda");
		$this->js("jquery");
		$this->js("kendo.web.min", "agenda");
		$this->js("agenda", "agenda");
		$this->CSS("styles/kendo.common.min", "agenda");
		$this->CSS("styles/kendo.black.min", "agenda");
    
    $this->Agenda_Model = $this->model("Agenda_Model");
	}
	
	public function index() {	
		$data = $this->Agenda_Model->getContacts();
		$vars["view"][0] = $this->view("menu_contacts", TRUE);
		if ($data) {
			$vars["contacts"] = $data;
			$vars["view"][1]	 = $this->view("contacts", TRUE);
		}
		
		$this->render("content", $vars);
	}

	public function add() {
		if (POST('add')) {
			$vars["alert"] = $this->Agenda_Model->add();
		}

		$vars["view"][0] = $this->view("menu_contacts", TRUE);
		$vars["view"][1] = $this->view("add", TRUE);

		$this->render("content", $vars);
	}

	public function contacts() {
		$data = $this->Agenda_Model->getContacts();
		$vars["view"][0] = $this->view("menu_contacts", TRUE);
		if ($data) {
			$vars["contacts"] = $data;
			$vars["view"][1] = $this->view("contacts", TRUE);

			$this->render("content", $vars);
		} else {
			$this->render("error404");
		}
	}

	public function contact($contactID) {
		$this->title("Prueba de contactos");

		$data = $this->Agenda_Model->getContact($contactID);
		$vars["view"][0] = $this->view("menu_contacts", TRUE);

		if ($data) {
			$vars["contact"] = $data[0];
			$vars["view"][1] = $this->view("contact", TRUE);
			$this->render("content", $vars);
		} else {
			$this->render("error404");
		}
	}

	public function test($param1 = "Hola", $param2 = "Adios") {
		print "Prueba en agenda: $param1, $param2 " . __("welcome");
	}
}
