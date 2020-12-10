<?php
namespace controllers;
 /**
  * Controller AccueilController
  */
class AccueilController extends ControllerBase{

	public function index(){
		$this->loadView("AccueilController/index.html");
	}
}
