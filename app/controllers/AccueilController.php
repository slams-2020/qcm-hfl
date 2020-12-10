<?php
namespace controllers;
 /**
  * Controller AccueilController
  * @property \Ajax\php\ubiquity\JsUtils $jquery
  */
class AccueilController extends ControllerBase{

	public function index(){
	    $this->jquery->exec('$(".dropdown").dropdown();',true);
		$this->jquery->renderView("AccueilController/index.html");
	}
}
